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

        session()->remove('email_submitted');
        session()->remove('email_verified');
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



    public function forgot()
    {

        return view('auth.forgot_password');
    }


    public function email(Request $request)
    {

        $flasher = new FlasherHelper();
        $email = $request->username;
        $url = ApiRoutes::forgotPassword();
        $data = [
            'email' => $email
        ];
        try {
            $response = Http::post($url, $data);

            $responseData = $response->json();

            if ($responseData['status'] === true) {
                session(['email_submitted' => $email]);
                return redirect()->route('password.send');
            } else {
                // If there are validation errors
                if (isset($responseData['errors'])) {
                    foreach ($responseData['errors'] as $field => $messages) {
                        foreach ($messages as $message) {
                            $flasher->error($message); // Show each validation message
                        }
                    }
                } else {
                    // Optionally show the general message if available
                    if (isset($responseData['message'])) {
                        $flasher->error($responseData['message']);
                    }
                }
                return redirect()->back()->withInput(); // Optional: repopulate form fields
            }
        } catch (Exception $e) {
            $flasher->error("Something happened. Error : " . $e);
            return redirect()->back();
        }
    }



    public function send_code()
    {

        // Check if the session key exists
        if (!session()->has('email_submitted')) {
            return redirect()->route('password.forgot')->with('error', 'You must enter your email first.');
        }

        $email = session('email_submitted');

        return view('auth.verify_code', compact('email'));
    }


    public function verify(Request $request)
    {
        $flasher = new FlasherHelper();
        $validator = Validator::make($request->all(), [
            'otp' => 'required',
            'email' => 'required'
        ]);
        if ($validator->fails()) {
            $errorMessage = $validator->errors()->first();
            $flasher->error($errorMessage);
            return redirect()->back()->withInput();
        }

        $otpArray = $request->otp;
        $otp = (int) implode('', $otpArray);
        $email = $request->email;
        $url = ApiRoutes::verifyOTP();
        $data = [
            'code' => $otp,
            'email' => $email
        ];
        try {
            $response = Http::post($url, $data);

            $responseData = $response->json();

            if ($responseData['status'] === true) {
                session(['email_verified' => true]);
                return redirect()->route('password.reset');
            } else {
                // If there are validation errors
                if (isset($responseData['errors'])) {
                    foreach ($responseData['errors'] as $field => $messages) {
                        foreach ($messages as $message) {
                            $flasher->error($message); // Show each validation message
                        }
                    }
                } else {
                    // Optionally show the general message if available
                    if (isset($responseData['message'])) {
                        $flasher->error($responseData['message']);
                    }
                }
                return redirect()->back()->withInput(); // Optional: repopulate form fields
            }
        } catch (Exception $e) {
            $flasher->error("Something happened. Error : " . $e);
            return redirect()->back();
        }

    }


    public function reset()
    {
        if (!session()->has('email_verified')) {
            return redirect()->route('password.forgot')->with('error', 'You must verify your email first.');
        }

         $email = session('email_submitted');
        return view('auth.reset_password');
    }


    public function resetPassword(Request $request)
    {

        $flasher = new FlasherHelper();
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            $errorMessage = $validator->errors()->first();
            $flasher->error($errorMessage);
            return redirect()->back()->withInput();
        }

        $email = session('email_submitted');
        $password = $request->password;
        $re_password = $request->password_confirmation;
        $url = ApiRoutes::resetPassword();
        $data = [
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $re_password
        ];

        try {
            $response = Http::post($url, $data);

            $responseData = $response->json();

            if ($responseData['status'] === true) {
                $flasher->success($responseData['message']);
                return redirect()->route('auth.login');
            } else {
                // If there are validation errors
                if (isset($responseData['errors'])) {
                    foreach ($responseData['errors'] as $field => $messages) {
                        foreach ($messages as $message) {
                            $flasher->error($message); // Show each validation message
                        }
                    }
                } else {
                    // Optionally show the general message if available
                    if (isset($responseData['message'])) {
                        $flasher->error($responseData['message']);
                    }
                }
                return redirect()->back()->withInput(); // Optional: repopulate form fields
            }
        } catch (Exception $e) {
            $flasher->error("Something happened. Error : " . $e);
            return redirect()->back();
        }




    }


}
