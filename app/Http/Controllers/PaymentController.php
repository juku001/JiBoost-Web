<?php

namespace App\Http\Controllers;

use App\Helpers\ApiRoutes;
use App\Helpers\CustomFunctions;
use Http;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $apiRoutes = new ApiRoutes();
        $url = $apiRoutes->payments(); // API endpoint for fetching payments

        $token = (string) session(env('API_TOKEN_KEY'));
        $response = Http::withToken($token)->get($url);

        $payments = []; // Default empty array in case of failure

        if ($response->successful()) {
            $payments = $response->json()['data'] ?? []; // Extract data if available
        } else {
            // Log error for debugging
            \Log::error('Failed to fetch payments', ['response' => $response->body()]);
        }



        return view('dashboard.payments', compact('payments'));
    }





    public function show($id)
    {
        $id = CustomFunctions::decrypt($id);

        $apiRoutes = new ApiRoutes();
        $url = $apiRoutes->singlePayment($id); // API endpoint for fetching specific payment

        $token = (string) session(env('API_TOKEN_KEY'));
        $response = Http::withToken($token)->get($url);

        $payment = null;

        if ($response->successful()) {
            $payment = $response->json()['data'] ?? []; // Extract data if available
        } else {
            // Log error for debugging
            \Log::error('Failed to fetch payments', ['response' => $response->body()]);
        }

        $showLeft = null;
        if ($payment['status'] == 'success') {
            if ($payment['subscription'] != null) {
                $showLeft = 'subscription';
            }

            if ($payment['exam_history'] != null) {
                $showLeft = 'payperexam';
            }
        }

        return view('dashboard.payments-details', compact('payment', 'showLeft'));
    }







    public function admin()
    {
        $apiRoutes = new ApiRoutes();
        $url = $apiRoutes->allPayments(); // API endpoint for fetching payments

        $token = (string) session(env('API_TOKEN_KEY'));
        $response = Http::withToken($token)->get($url);

        $payments = []; // Default empty array in case of failure


        if ($response->successful()) {
            $payments = $response->json()['data'] ?? []; // Extract data if available
        } else {
            // Log error for debugging
            \Log::error('Failed to fetch payments', ['response' => $response->body()]);
        }

        // return response()->json($response->json());

        return view('admin.payments', compact('payments'));
    }

    public function subscription()
    {
        return view('dashboard.subscription');
    }
}
