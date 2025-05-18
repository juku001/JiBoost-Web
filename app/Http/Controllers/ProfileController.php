<?php

namespace App\Http\Controllers;

use App\Helpers\ApiRoutes;
use App\Helpers\FlasherHelper;
use Exception;
use Http;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index()
    {
        $url = ApiRoutes::user();
        $urlLevels = ApiRoutes::educationLevels();

        $token = (string) session(env('API_TOKEN_KEY'));

        $response = Http::withToken($token)->get($url);
        $responseLevels = Http::withToken($token)->get($urlLevels);

        $user = null;
        $levels = null;
        if ($response->successful()) {
            $user = $response->json()['data'];
        }

        if ($responseLevels->successful()) {
            $levels = $responseLevels->json();
        }

        return view('auth.profile', compact('user', 'levels'));
    }


    public function update(Request $request)
    {
        $flasher = new FlasherHelper();
        $validated = $request->validate([
            'name' => 'required',
            'mobile' => 'required|regex:/^255\d{9}$/',
            'level' => 'required|numeric',
        ]);

        $url = ApiRoutes::user();
        $token = (string) session(env('API_TOKEN_KEY'));
        try {
            $response = Http::withToken($token)->post($url, $validated);
            $responseData = $response->json();
            if ($response->successful()) {
                $this->setStateName($request->name);
                $flasher->success("Profile updated successful.");
            } else {
                $flasher->error($responseData['message']);
            }
        } catch (Exception $e) {
            $flasher->error("Something Wrong Happened : " . $e);
        }
        return redirect()->back();
    }



    public function updatePassword(Request $request)
    {
        $flasher = new FlasherHelper();
        $validated = $request->validate([
            'old_password' => 'required',
            'current_password' => 'required|min:8|confirmed'
        ]);

        $url = ApiRoutes::updatePassword();
        $token = (string) session(env('API_TOKEN_KEY'));

        $validated['current_password_confirmation'] = $request->current_password;


        try {
            $response = Http::withToken($token)->post($url, $validated);
            $responseData = $response->json();
            if ($response->successful()) {
                $flasher->success("Password updated successful.");
            } else {
                $flasher->error($responseData['message']);
            }
        } catch (Exception $e) {
            $flasher->error("Something Wrong Happened : " . $e);
        }
        return redirect()->back();

    }

    public function display()
    {
        $url = ApiRoutes::displayPhoto();
        $token = (string) session(env('API_TOKEN_KEY'));

        $response = Http::withToken($token)->get($url);
        $photo = null;
        $responseData = $response->json();
        if ($response->successful() && $responseData['status'] == true) {
            $photo = $responseData['data'];
            $this->setStateProfilePhoto($photo);
        } else {
            $this->setStateProfilePhoto(null);
        }
        return view('dashboard.display-photo', compact('photo'));
    }


    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $token = (string) session(env('API_TOKEN_KEY'));

        $response = Http::attach(
            'photo',
            file_get_contents($request->file('photo')),
            $request->file('photo')->getClientOriginalName()
        )->withToken($token)->post(ApiRoutes::displayPhoto());

        $result = $response->json();
        if ($response->successful() && $result['status'] == true) {
            $photo = $result['data'];
            $this->setStateProfilePhoto($photo);
            return redirect()->route('profile.display.photo');
        }

        return redirect()->back()->with('error', $result['message'] ?? 'Upload failed.');
    }

    public function destroy()
    {
        $token = (string) session(env('API_TOKEN_KEY'));
        $response = Http::withToken($token)->delete(ApiRoutes::displayPhoto());

        $result = $response->json();
        if ($response->successful() && $result['status'] == true) {
            $this->setStateProfilePhoto(null);
            return redirect()->route('profile.display.photo');
        }

        return redirect()->back()->with('error', $result['message'] ?? 'Delete failed.');
    }




    private function setStateProfilePhoto($photo)
    {
        if ($photo != null) {
            $photo = ApiRoutes::displayUrl() . $photo;
        }
        $userInfo = Session::get(env('USER_INFO_KEY'), []);
        $userInfo['profile_pic'] = $photo;
        Session::put(env('USER_INFO_KEY'), $userInfo);
    }

    private function setStateName($name)
    {
        $userInfo = Session::get(env('USER_INFO_KEY'), []);
        $userInfo['name'] = $name;
        Session::put(env('USER_INFO_KEY'), $userInfo);
    }

}
