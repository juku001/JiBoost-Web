<?php

namespace App\Http\Controllers;

use App\Helpers\ApiRoutes;
use Http;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {


        $apiRoutes = new ApiRoutes();
        $urlSubscription = $apiRoutes->subscription();
        $urlQuote = $apiRoutes->getQuote();
        $urlPayPerExam = $apiRoutes->subscriptionPPE();

        $token = (string) session(env('API_TOKEN_KEY'));
        $subscriptionResponse = Http::withToken($token)->get($urlSubscription);
        $quoteResponse = Http::withToken($token)->get($urlQuote);
        $ppeResponse = Http::withToken($token)->get($urlPayPerExam);

        $subBody = $subscriptionResponse->json();
        $quoBody = $quoteResponse->json();
        $ppeBody = $ppeResponse->json();

        if ($subBody['status'] == false) {
            $subscription = null;
        } else {
            if ($subBody['data']['isActive'] == true) {
                $subscription = $subBody['data'];
            } else {
                $subscription = null;
            }
        }

        if ($quoBody['status'] == false) {
            $quote = null;
        } else {
            $quote = $quoBody['data'];
        }

        if ($ppeBody['status'] == false) {
            $ppe = null;
        } else {
            $ppe = $ppeBody['data'];
        }

        return view('dashboard.index', compact('subscription', 'quote','ppe'));
    }



    public function admin()
    {
        return view('admin.index');
    }
}
