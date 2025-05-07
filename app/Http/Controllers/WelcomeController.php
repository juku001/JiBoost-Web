<?php

namespace App\Http\Controllers;

use App\Helpers\ApiRoutes;
use Http;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {

        if (auth()->check()) {
            $infoKey = (array) session(env('USER_INFO_KEY'));
            if ($infoKey['user_type'] == 'superadmin') {
                return redirect()->route('dashboard.admin.home'); // Redirect to dashboard if logged in
            } else {
                return redirect()->route('dashboard.home'); // Redirect to dashboard if logged in
            }
        }


        //get data from the api here.
        $apiRoutes = new ApiRoutes();
        $url = $apiRoutes::welcome();

        $response = Http::get($url);
        $welcomeData = [];
        if($response->successful()){
            $welcomeData = $response->json();
        }
        return view('welcome',compact('welcomeData'));

    }
}
