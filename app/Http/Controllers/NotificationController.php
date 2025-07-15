<?php

namespace App\Http\Controllers;

use App\Helpers\ApiRoutes;
use App\Helpers\FlasherHelper;
use Http;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    public function index()
    {
        $flasher = new FlasherHelper();
        $flasher->error('Notification is not available for now.');
        return redirect()->back();
    }


    public function admin()
    {

        $token = (string) session(env('API_TOKEN_KEY'));
        $url = ApiRoutes::users();
        $response = Http::withToken($token)->get($url);
        $users = $response->json()['data'];


        return view('admin.notifications', compact('users'));
    }

    public function sendAdmin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'message' => 'required|string'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // Send errors to session
                ->withInput(); // Keep the old input values
        }

        $data = [];
        $token = (string) session(env('API_TOKEN_KEY'));
        $url = ApiRoutes::sendSMS();
        $flasher = new FlasherHelper();

        $data['message'] = $request->message;
        $data['target'] = $request->target;
        if ($request->target === 'single') {
            $data['user'] = (int) $request->single_user;
        }
        if ($request->target == 'selected') {
            $data['users'] = $request->users;
        }

        $response = Http::withToken($token)->post($url, $data);


        if ($response->successful()) {
            $flasher->success('Messages send successful.');
        } else {
            $flasher->error('Failed to send message.');
        }

        return redirect()->back();

    }
}
