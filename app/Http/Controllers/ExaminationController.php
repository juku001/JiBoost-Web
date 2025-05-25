<?php

namespace App\Http\Controllers;
use App\Helpers\CustomFunctions;
use App\Helpers\FlasherHelper;
use Carbon\Carbon;
use Exception;
use Http;
use App\Helpers\ApiRoutes;
use Illuminate\Http\Request;

class ExaminationController extends Controller
{
    public function series($id)
    {

        $id = CustomFunctions::decrypt($id);
        $apiRoutes = new ApiRoutes();
        $url = $apiRoutes->getSeriesBySubject($id);
        $subscriptionUrl = $apiRoutes->subscription();

        $token = (string) session(env('API_TOKEN_KEY'));

        $response = Http::withToken($token)->get($url);
        $levelSubject = $response->json()['data'];

        // return response()->json($levelSubject);
        $subResponse = Http::withToken($token)->get($subscriptionUrl);
        $subInfo = null;
        if ($subResponse->successful()) {
            $subData = $subResponse->json();
            $subInfo = $subData['data'];
        }
        // dd($subInfo);
        return view('dashboard.examination-series', [
            'levelSubject' => $levelSubject,
            'levelSubjectId' => $id,
            'subInfo' => $subInfo,
            'ApiRoutes' => $apiRoutes, // Pass the instance to the view
        ]);
    }


    public function deny()
    {
        $flasher = new FlasherHelper();
        $flasher->error("You can not view this series. Please, subscribe first.");
        return redirect()->back();
    }



    public function examInfo($sub, $id)
    {
        $id = CustomFunctions::decrypt($id);
        $sub = CustomFunctions::decrypt($sub);

        $apiRoutes = new ApiRoutes();
        $url = $apiRoutes->getSeriesBySubject($sub);
        $token = (string) session(env('API_TOKEN_KEY'));

        $response = Http::withToken($token)->get($url);
        $levelSubject = $response->json()['data'];

        $qnUrl = $apiRoutes->questions($id);
        $qnREsponse = Http::withToken($token)->get($qnUrl);
        $series = $qnREsponse->json();

        return view('dashboard.examination-show', compact(
            'sub',
            'id',
            'levelSubject',
            'series'
        ));
    }


    public function startExam($sub, $id)
    {
        $id = CustomFunctions::decrypt($id);
        $sub = CustomFunctions::decrypt($sub);
        $questionId = $id;
        $apiRoutes = new ApiRoutes();
        $url = $apiRoutes->questions($questionId);
        $token = (string) session(env('API_TOKEN_KEY'));

        $response = Http::withToken($token)->get($url);
        $responseData = $response->json();

        return view('dashboard.examination-start', ['response' => $responseData, 'sub' => $sub, 'series' => $id]);
    }



    public function submitExam(Request $request, $sub, $series)
    {
        $sub = (int) CustomFunctions::decrypt($sub);
        $series = (int) CustomFunctions::decrypt($series);

        // return response()->json(
        //     [
        //         'sub' => $sub,
        //         'series' => $series
        //     ]
        // );
        $data = [
            'series_id' => (int) $request->series_id,
            'start_time' => Carbon::parse($request->start_time)->format('Y-m-d H:i'),
            'end_time' => Carbon::parse($request->end_time)->format('Y-m-d H:i'),
            'end_type' => $request->end_type
        ];


        if ($request->end_type == 'submitted') {
            $questionData = json_decode($request->questions_data);
            $data['questions_data'] = $questionData;
        }
        // return response()->json($data);

        $token = (string) session(env('API_TOKEN_KEY'));
        $url = ApiRoutes::postResult();
        try {
            $response = Http::withToken($token)->post($url, $data);
            if ($response->successful()) {
                $message = '';
                if ($request->end_type == 'submitted') {
                    $message = 'Exam submitted successful';
                } else {
                    $message = 'Exam Cancelled successful';
                }

                FlasherHelper::success($message);
                return redirect()->route('examination.series.show', [
                    'sub' => CustomFunctions::encrypt($sub),
                    'series' => CustomFunctions::encrypt($series)
                ]);
            } else {
                FlasherHelper::error($response->json()['message']);
                // return response()->json($response);
                return redirect()->back();
            }
        } catch (Exception $e) {

            // dd($e);
            FlasherHelper::error('Something went wrong. Error' . $e->getMessage());
            return redirect()->back();
        }

    }


}
