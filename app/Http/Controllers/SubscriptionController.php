<?php

namespace App\Http\Controllers;

use App\Helpers\ApiRoutes;
use App\Helpers\FlasherHelper;
use Exception;
use Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    public function index()
    {

        $methods = [];
        $apiRoutes = new ApiRoutes();
        $url = $apiRoutes->paymentMethods();
        $subUrl = $apiRoutes->subscriptionList();
        $levelsUrl = $apiRoutes->levelSubjects();

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

        $levelResponse = Http::withToken($token)->get($levelsUrl);
        if ($levelResponse->successful()) {
            $levels = $levelResponse->json()['data'];
        } else {
            $levels = [];
        }



        return view('dashboard.subscription', compact('methods', 'subscriptions', 'levels'));
    }


    public function store(Request $request)
    {


        $flasher = new FlasherHelper();
        $validator = Validator::make($request->all(), [
            'mobile' => ['required', 'regex:/^[6-7][0-9]{8,}$/'],
        ], [
            'mobile.regex' => 'Mobile number must start with 6 or 7 and be at least 9 digits long.',
        ]);

        $validator->sometimes('level', 'required', function ($input) {
            return $input->subscription == '1';
        });


        if ($validator->fails()) {
            $errors = $validator->errors();

            foreach ($errors->all() as $error) {
                $flasher->error($error);  // Display each error
            }

            return redirect()->back()->withInput(); // Optionally keep old input
        }


        $data = [
            'mobile' => '255' . $request->mobile,
            'subscription_id' => (int) $request->subscription,
        ];
        if ($request->subscription == '3') {
            $data['exam_count'] = (int) $request->count;
        } else {
            $data['months'] = (int) $request->count;
        }

        if ($request->subscription == '1') {
            $data['level_id'] = (int) $request->level;
        }

        $url = ApiRoutes::pay();
        $token = (string) session(env('API_TOKEN_KEY'));

        try {

            $response = Http::withToken($token)->post($url, $data);
            if ($response->successful()) {
                $payLoad = $response->json();
                if ($payLoad['status'] == true) {
                    $ref = $payLoad['data']['payment']['reference_id'];
                    $flasher->success("Successful Initiated.");
                    return redirect()->route('dashboard.subscription.wait', ['ref' => $ref]);

                } else {
                    $flasher->error("Transaction has failed.");
                    return redirect()->back();
                }

            } else {
                $flasher->error("Failure to make payment. Please try again later.");
                return redirect()->back();
            }

        } catch (Exception $e) {
            $flasher->error("Failure to make payment " . $e);
            return redirect()->back();
        }
    }

    public function wait($ref)
    {
        $apiRoutes = new ApiRoutes();
        $url = $apiRoutes->paymentStatus();
        $data = [
            "ref_id" => $ref
        ];
        $token = (string) session(env('API_TOKEN_KEY'));
        $response = Http::withToken($token)->post($url, $data);

        // If it's an AJAX request, return JSON
        if (request()->ajax()) {
            return response()->json([
                'status' => $response['status'] ? $response['data'] : 'pending'
            ]);
        }

        return view('dashboard.payment-wait', compact('ref'));
    }

}
