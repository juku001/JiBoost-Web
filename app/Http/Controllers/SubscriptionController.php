<?php

namespace App\Http\Controllers;

use App\Helpers\ApiRoutes;
use App\Helpers\FlasherHelper;
use Http;
use Illuminate\Http\Request;
use Validator;

class SubscriptionController extends Controller
{
    public function index()
    {

        $methods = [];
        $apiRoutes = new ApiRoutes();
        $url = $apiRoutes->paymentMethods();
        $subUrl = $apiRoutes->subscriptionList();

        $token = (string) session(env('API_TOKEN_KEY'));
        $data = [
            'method' => 'mobile_money'
        ];
        $methodResponse = Http::withToken($token)->post($url, $data);
        if ($methodResponse->successful()) {
            $methods = $methodResponse->json()['data'];
        } else {
            $methods = [];
        }
        $subResponse = Http::withToken($token)->post($subUrl, ['user_type' => 'student']);
        if ($subResponse->successful()) {
            $subscriptions = $subResponse->json()['data'];
        } else {
            $subscriptions = [];
        }


        return view('dashboard.subscription', compact('methods', 'subscriptions'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'count' => 'required',
            'subscription' => 'required',
            'mobile' => 'required'
        ]);

        $flasher = new FlasherHelper();

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $key => $error) {
                $flasher->error($error);
            }

            return redirect()->back();
        }
        $data = [
            "subscription_id" => (int) $request->subscription,
            "mobile" => "255" . $request->mobile,
            ($request->subscription == 3 ? "exam_count" : "months") => (int) $request->count
        ];




        return redirect()->route('dashboard.subscription.wait');
    }

    public function wait()
    {
        $apiRoutes = new ApiRoutes();
        $url = $apiRoutes->paymentStatus();
        $data = [
            "ref_id" => "JIB1226179734553"
        ];
        $token = (string) session(env('API_TOKEN_KEY'));
        $response = Http::withToken($token)->post($url, $data);
    
        // If it's an AJAX request, return JSON
        if (request()->ajax()) {
            return response()->json([
                'status' => $response['status'] ? $response['data'] : 'pending'
            ]);
        }
    
        return view('dashboard.payment-wait');
    }
    
}
