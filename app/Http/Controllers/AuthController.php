<?php

namespace App\Http\Controllers;

use App\Helpers\ApiRoutes;
use App\Helpers\FlasherHelper;
use Exception;
use Illuminate\Support\Facades\Http;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {

        return view('auth.login');
    }





    public function register()
    {
        return view('auth.register');
    }


    public function type(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user-type' => 'required|in:student,teacher,parent'
        ]);


        $flasher = new FlasherHelper();
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $key => $error) {
                $flasher->error($error);
            }
        }


        $url = ApiRoutes::educationLevels(); // Get the API URL
        // Make the API request
        $response = Http::get($url);

        // Check if the request was successful
        if ($response->successful()) {
            $levels = $response->json(); // Extract data
        } else {
            $levels = []; // Default to an empty array if the request fails
        }

        $userType = $request->input('user-type');

        if ($userType != 'student') {
            $flasher->error("Only students can register for now.");
            return redirect()->back();
        }

        return view('auth.signup', compact('userType', 'levels'));
    }


    // public function create(Request $request)
    // {
    //     $flasher = new FlasherHelper();

    //     // Validate input
    //     $validator = Validator::make($request->all(), [
    //         'username' => 'required|email',
    //         'password' => 'required|string'
    //     ]);

    //     if ($validator->fails()) {
    //         foreach ($validator->errors()->all() as $error) {
    //             $flasher->error($error);
    //         }
    //         return redirect()->back()->withInput();
    //     }

    //     // Prepare API request
    //     $url = ApiRoutes::login(); // Get login API endpoint
    //     $data = [
    //         'email' => $request->username,
    //         'password' => $request->password
    //     ];

    //     try {
    //         $client = new \GuzzleHttp\Client();
    //         $response = $client->post($url, [
    //             'json' => $data,
    //             'headers' => ['Accept' => 'application/json']
    //         ]);

    //         $body = json_decode($response->getBody(), true);

    //         if (isset($body['token'])) {
    //             session(['api_token' => $body['token']]);
    //             return redirect()->route('dashboard.home');
    //         } else {
    //             $flasher->error($body['message'] ?? 'Login failed. Please try again.');
    //         }
    //     } catch (\GuzzleHttp\Exception\RequestException $e) {
    //         if ($e->hasResponse()) {
    //             $errorResponse = json_decode($e->getResponse()->getBody()->getContents(), true);
    //             $errorMessage = $errorResponse['message'] ?? 'Server error.';
    //         } else {
    //             $errorMessage = 'Server error.';
    //         }

    //         $flasher->error($errorMessage);
    //     }

    //     return redirect()->back()->withInput();

    // }

    public function create(Request $request)
    {
        $flasher = new FlasherHelper();

        // Validate input and return errors to the session
        $validator = Validator::make($request->all(), [
            'username' => 'required|email',
            'password' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // Send errors to session
                ->withInput(); // Keep the old input values
        }

        // Prepare API request
        $url = ApiRoutes::login(); // Get login API endpoint
        $data = [
            'email' => $request->username,
            'password' => $request->password
        ];

        try {
            $response = Http::post($url, $data);
            $statusCode = $response->getStatusCode();
            $body = $response->json();
            // return response()->json($body);
            $token = isset($body['data']) ? $body['data']['token'] : null;


            if ($response->successful() && isset($token)) {
                // Save the token in the session

                $userType = $body['data']['type'];
                session([
                    env('USER_INFO_KEY') => [
                        'profile_pic' => isset($body['data']['profile_pic']) ? ApiRoutes::displayUrl() . $body['data']['profile_pic'] : null,
                        'name' => $body['data']['name'],
                        'user_type' => $userType
                    ]
                ]);
                if ($userType == 'superadmin') {
                    session([env('API_TOKEN_KEY') => $token]);
                    return redirect()->route('dashboard.admin.home'); // Redirect to dashboard
                } else if ($userType == 'student') {
                    session([env('API_TOKEN_KEY') => $token]);
                    return redirect()->route('dashboard.home'); // Redirect to dashboard
                } else {
                    $flasher->error("Only students are allowed for now");
                    return redirect()->back();
                }

            } elseif ($statusCode == 422) {
                // Handle validation errors from API
                if (isset($body['data']) && is_array($body['data'])) {
                    foreach ($body['data'] as $field => $errors) {
                        foreach ($errors as $error) {
                            $flasher->error($error); // Show each error separately
                        }
                    }
                }
                return redirect()->back()->withInput();
            } else {
                $message = $body['message'] ?? 'Login failed. Please try again.';
                $flasher->error($message);
                return redirect()->back();
            }
        } catch (Exception $e) {
            $flasher->error("Something went wrong: " . $e->getMessage());
            return redirect()->back();
        }
    }





    public function store(Request $request)
    {
        $flasher = new FlasherHelper();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required|regex:/^255\d{9}$/',
            'email' => 'required|email',
            'sex' => 'required|in:male,female',
            'region' => 'required',
            'password' => 'required|confirmed',
            'address' => 'required'
        ]);



        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $key => $value) {
                $flasher->error($value);
            }
            return redirect()->back();
        }



        // Prepare API request
        $url = ApiRoutes::register(); // Get register API endpoint
        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "user_type" => $request->input('user-type'),
            "password" => $request->password,
            "mobile" => $request->mobile,
            "sex" => $request->sex,
            "date_of_birth" => $request->dob,
            "country" => "Tanzania",
            "region" => $request->region,
            "address" => $request->address,
            "school_name" => $request->school_name,
            "school_location" => $request->school_location,
            "level_of_education" => (int) $request->level_of_education,
        ];

        // return response()->json($data);

        try {
            // Send the request to the API
            $response = Http::post($url, $data);

            // Decode response
            $result = $response->json();

            // return response()->json($result);oo 
            if ($response->successful() && isset($result['status']) && $result['status']) {
                // Registration successful
                $flasher->success('Registration successful! Please login to continue.');
                // Redirect to login page or dashboard
                return redirect()->route('login');
            } else {
                // Registration failed
                $errorMessage = $result['message'] ?? 'Registration failed. Please try again.';
                if (filled($result['data'])) {
                    foreach ($result['data'] as $key => $value) {
                        $flasher->error($value);
                    }
                } else {
                    $flasher->error($errorMessage);
                }
                return back()->withInput();
            }
        } catch (\Exception $e) {
            // Handle API errors
            $flasher->error('Something went wrong. Please try again later.');
            return back()->withInput();
        }
    }



    public function logout()
    {
        session()->forget('api_token');
        $flasher = new FlasherHelper();
        $flasher->success('Logged out successfully.');
        return redirect()->route('auth.login');
    }


    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required'
        ]);
    
        $flasher = new FlasherHelper();
    
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $value) {
                $flasher->error($value);
            }
            return redirect()->back();
        }
    
        $token = (string) session(env('API_TOKEN_KEY'));
        $url = ApiRoutes::user(); // Assuming this returns the API endpoint for deleting user
    
        try {
            $response = Http::withToken($token)->delete($url, [
                'password' => $request->password
            ]);
    
            if ($response->successful()) {
                session()->forget('api_token');
    
                $flasher->success('Your account has been deleted.');
                return redirect()->route('auth.login');
            } else {
                // Handle failure from API (e.g., wrong password or server error)
                $message = $response->json('message') ?? 'Failed to delete account. Please try again.';
                $flasher->error($message);
                return redirect()->back();
            }
        } catch (\Exception $e) {
            $flasher->error('Something went wrong. Please try again later.');
            return redirect()->back();
        }
    }
    

}
