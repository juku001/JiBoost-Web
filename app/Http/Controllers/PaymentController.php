<?php

namespace App\Http\Controllers;

use App\Helpers\ApiRoutes;
use Http;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $apiRoutes = new ApiRoutes();
        $url = $apiRoutes->payments(); // API endpoint for fetching payments
    
        $token = (string) session(env('API_TOKEN_KEY'));
        $response = Http::withToken($token)->post($url);
    
        $payments = []; // Default empty array in case of failure
    
        if ($response->successful()) {
            $payments = $response->json()['data'] ?? []; // Extract data if available
        } else {
            // Log error for debugging
            \Log::error('Failed to fetch payments', ['response' => $response->body()]);
        }
    
        return view('dashboard.payments', compact('payments'));
    }
    

    public function admin(){
        return view('admin.payments');
    }

    public function subscription(){
        return view('dashboard.subscription');
    }
}
