<?php

namespace App\Http\Controllers;

use App\Helpers\ApiRoutes;
use Http;
use Illuminate\Http\Request;

class ExamResultController extends Controller
{
    public function index()
    {
        $apiRoutes = new ApiRoutes();
        $url = $apiRoutes->examResults(); // API endpoint for fetching payments

        $token = (string) session(env('API_TOKEN_KEY'));
        $response = Http::withToken($token)->get($url);

        $results = []; // Default empty array in case of failure

        if ($response->successful()) {
            $results = $response->json()['data'] ?? []; // Extract data if available
        } else {
            // Log error for debugging
            \Log::error('Failed to fetch results', ['response' => $response->body()]);
        }
        return view('dashboard.results', compact('results'));
    }
}
