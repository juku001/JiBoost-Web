<?php

namespace App\Http\Controllers;

use App\Helpers\ApiRoutes;
use Http;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function help()
    {

        $url = ApiRoutes::getFaqs();
        $token = (string) session(env('API_TOKEN_KEY'));

        $faqs = [];
        $response = Http::withToken($token)->get($url);
        if ($response->successful()) {
            $faqs = $response->json()['data'];
        }
        return view('dashboard.helpcenter', compact('faqs'));
    }
}
