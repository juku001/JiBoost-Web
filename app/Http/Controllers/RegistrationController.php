<?php

namespace App\Http\Controllers;

use App\Helpers\ApiRoutes;
use App\Helpers\FlasherHelper;
use App\Models\User;
use Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class RegistrationController extends Controller
{
    // Validate Email
    public function validateEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $exists = User::where('email', $request->email)->exists();

        if ($exists) {
            return response()->json(['valid' => false, 'message' => 'Email already taken.']);
        }

        return response()->json(['valid' => true]);
    }

    // Validate Mobile
    public function validateMobile(Request $request)
    {
        $request->validate([
            'phone' => 'required',
        ]);

        $exists = User::where('phone', $request->phone)->exists();

        if ($exists) {
            return response()->json(['valid' => false, 'message' => 'Phone number already in use.']);
        }

        return response()->json(['valid' => true]);
    }





    public function store(Request $request)
    {
        $flasher = new FlasherHelper();
        $sessionKey = env('USER_REGISTRATION_INFO');
        $sessionData = Session::get($sessionKey);

        if (!$sessionData) {
            // Step 1: Basic Info
            $validator = Validator::make($request->all(), [
                'fullname' => 'required',
                'email' => 'required|email',
                'sex' => 'required',
                'phone' => 'required',
                'password' => 'required|min:6'
            ]);

            if ($validator->fails()) {
                $flasher->error($validator->errors()->first());
                return redirect()->back()->withInput();
            }

            Session::put($sessionKey, [
                'step' => 1,
                'data' => $request->only(['fullname', 'email', 'sex', 'phone', 'password']),
            ]);

            // return redirect()->route('signup');
            $step = 1;
            return view('auth.signup', compact('step'));
        }

        if ($sessionData['step'] === 1) {
            // Step 2: Personal Info
            $validator = Validator::make($request->all(), [
                'dob' => 'required|date',
                'country' => 'required|string',
                'region' => 'required|string',
            ]);

            if ($validator->fails()) {
                $flasher->error($validator->errors()->first());
                return redirect()->back()->withInput();
            }

            $sessionData['step'] = 2;
            $sessionData['data'] = array_merge($sessionData['data'], $request->only(['dob', 'country', 'region']));
            Session::put($sessionKey, $sessionData);

            $step = 2;
            return view('auth.signup', compact('step'));
        }

        if ($sessionData['step'] === 2) {
            // Step 3: Education Info
            $validator = Validator::make($request->all(), [
                'school_name' => 'required',
                'school_location' => 'required',
                'education_level' => 'required',
            ]);

            if ($validator->fails()) {
                $flasher->error($validator->errors()->first());
                return redirect()->back()->withInput();
            }

            $finalData = array_merge(
                $sessionData['data'],
                $request->only(['school_name', 'school_location', 'education_level']),
                ['user_type' => $request->input('user-type')]
            );

            try {
                $response = Http::post(ApiRoutes::register(), $finalData);
                $result = $response->json();

                if ($response->successful() && ($result['status'] ?? false)) {
                    Session::forget($sessionKey);
                    $flasher->success('Registration successful! Please login.');
                    return redirect()->route('login');
                } else {
                    foreach ($result['data'] ?? [] as $message) {
                        $flasher->error($message);
                    }
                    return redirect()->back()->withInput();
                }
            } catch (\Exception $e) {
                $flasher->error('Server error. Please try again.');
                return redirect()->back()->withInput();
            }
        }

        return redirect()->route('signup');
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

        //for now we only take students
        //no point to pass through user type
        $userType = $request->input('user-type');
        if ($userType != 'student') {
            $flasher->error("Only students can register for now.");
            return redirect()->back();
        }


        $step = 0;
        return view('auth.signup', compact('step'));
    }

}
