<?php

namespace App\Http\Controllers;

use App\Helpers\ApiRoutes;
use Http;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function admin(){

        $apiRoutes = new ApiRoutes();
        $url = $apiRoutes->subjects();

        $token = (string)session(env('API_TOKEN_KEY'));
        
        $response = Http::withToken($token)->get($url);
        $subjects = $response->json();

        return view('admin.subjects',[
            'subjects' => $subjects,
            'ApiRoutes' => $apiRoutes, // Pass the instance to the view
        ]);
    }
}
