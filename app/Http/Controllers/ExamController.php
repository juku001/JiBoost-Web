<?php

namespace App\Http\Controllers;

use App\Helpers\ApiRoutes;
use App\Helpers\FlasherHelper;
use Exception;
use Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use NoRewindIterator;

class ExamController extends Controller
{
    public function index()
    {
        $apiRoutes = new ApiRoutes();
        $url = $apiRoutes->levelSubjects();
        $token = session(env('API_TOKEN_KEY'), '');

        $response = Http::withToken((string) $token)->get($url);
        $levelSubjects = $response->json()['data'];
        return view('dashboard.exams', [
            'levelSubjects' => $levelSubjects,
            'apiRoutes' => $apiRoutes
        ]);
    }

    public function add_series()
    {
        $apiRoutes = new ApiRoutes();
        $url = $apiRoutes->subjects();
        $urlLevel = $apiRoutes->educationLevels();

        $token = (string) session(env('API_TOKEN_KEY'));

        $response = Http::withToken($token)->get($url);
        $levelResponse = Http::withToken($token)->get($urlLevel);
        $subjects = $response->json();
        $levels = $levelResponse->json();


        return view('admin.add_series', compact('levels', 'subjects'));
    }


    public function series_add(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'level' => 'required',
            'subject' => 'required',
            'name' => 'required',
            'isTrial' => 'required|in:1,0',
            'duration' => 'nullable|numeric',
            'marking' => 'required|in:ems,wms'
        ]);

        $flasher = new FlasherHelper();
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            foreach ($errors as $error) {
                $flasher->error($error);
            }
            return redirect()->back();
        }

        $data = [
            'level_key' => $request->level,
            'subject_id' => (int) $request->subject,
            'title' => $request->name,
            'isTrial' => (int) $request->isTrial,
            'duration' => (int) $request->duration,
            'marking' => $request->marking
        ];

        $apiRoutes = new ApiRoutes();
        $url = $apiRoutes->assignSeries();
        $token = session(env('API_TOKEN_KEY'));
        try {

            $response = Http::withToken((string) $token)->post($url, $data);
            if ($response->successful()) {

                if ($response->getStatusCode() == 201) {
                    $flasher->success('Series Added Successful');
                }

            } else {
                $error = $response->json()['message'];
                $flasher->error($error);
            }

        } catch (\Exception $e) {
            $flasher->error($e);
        }
        return redirect()->back();
    }




    public function series()
    {
        $apiRoutes = new ApiRoutes();
        $url = $apiRoutes->levelSubjects();
        $token = session(env('API_TOKEN_KEY'), ''); // Provide a default empty string

        $response = Http::withToken((string) $token)->get($url);
        $levelSubjects = $response->json()['data'];
        return view('admin.view_series', [
            'levelSubjects' => $levelSubjects,
            'apiRoutes' => $apiRoutes
        ]);
    }





    public function add_subjects()
    {


        $apiRoutes = new ApiRoutes();
        $url = $apiRoutes->subjects();

        $token = (string) session(env('API_TOKEN_KEY'));

        $response = Http::withToken($token)->get($url);
        $subjects = $response->json();


        return view('admin.add_subjects', [
            'subjects' => $subjects,
            'ApiRoutes' => $apiRoutes, // Pass the instance to the view
        ]);
    }



    public function show($levelSub)
    {
        $apiRoutes = new ApiRoutes();
        $url = $apiRoutes->getSeriesBySubject($levelSub);

        $token = (string) session(env('API_TOKEN_KEY'));

        // Initialize $data to an empty array to avoid undefined variable issues
        $data = [];

        try {
            $response = Http::withToken($token)->get($url);

            if ($response->successful()) {
                if ($response->getStatusCode() == 200) {
                    $data = $response->json()['data'] ?? []; // Ensure 'data' exists, otherwise fallback to empty array
                }
            } else {
                // Log the error if request fails but is not an exception
                \Log::error('Failed to fetch series data', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
            }

        } catch (Exception $e) {
            // Log the exception for debugging
            \Log::error('Exception in fetching series data: ' . $e->getMessage());
        }

        return view('admin.series_details', compact('levelSub', 'data'));
    }




    public function questions($levelSub, $seriesId)
    {
        $apiRoutes = new ApiRoutes();
        $url = $apiRoutes->questions($seriesId);
        $questions = [];

        $token = (string) session(env('API_TOKEN_KEY'));

        $questions = [];
        $markingSystem = '';

        try {
            $response = Http::withToken($token)->get($url);

            if ($response->successful()) {
                if ($response->getStatusCode() == 200) {
                    $questions = $response->json()['data'] ?? []; // Ensure 'data' exists, otherwise fallback to empty array
                    $markingSystem = $response->json()['marking_system'] ?? 'ems';
                }
            } else {
                // Log the error if request fails but is not an exception
                \Log::error('Failed to fetch questions data', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
            }

        } catch (Exception $e) {
            // Log the exception for debugging
            \Log::error('Exception in fetching questions data: ' . $e->getMessage());
        }




        return view('admin.view_questions', compact('levelSub', 'seriesId', 'questions'));
    }

    public function addQuestions($levelSub, $seriesId)
    {
        $apiRoutes = new ApiRoutes();
        $url = $apiRoutes->getSeries($seriesId);
        $token = (string) session(env('API_TOKEN_KEY'));
        $markingSystem = '';

        try{
            $response = Http::withToken($token)->get($url);
            if ($response->successful()) {
                if ($response->getStatusCode() == 200) {
                    $markingSystem = $response->json()['data']['marking_system'] ?? 'ems';
                }
            } else {
                // Log the error if request fails but is not an exception
                \Log::error('Failed to fetch questions data', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
            }
        }catch (Exception $e){
            // Log the exception for debugging
            \Log::error('Exception in fetching series: ' . $e->getMessage());
        }
        return view('admin.add_questions', compact('levelSub', 'seriesId','markingSystem'));
    }


    public function questionAdd(Request $request, $levelSub, $seriesId)
    {
        $validator = Validator::make($request->all(), [
            'question_text' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'correct_option' => 'required',
            'image' => 'nullable|image|mimes:jpg,png|max:2048', // Ensure it's an image & restrict format
            'mark' => 'nullable|numeric'
        ]);

        $flasher = new FlasherHelper();
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $key => $error) {
                $flasher->error($error);
            }
            return redirect()->back();
        }

        $apiRoutes = new ApiRoutes();
        $url = $apiRoutes->assignQuestion();
        $data = $validator->validated();
        $data['series_id'] = (int) $seriesId;
        $token = (string) session(env('API_TOKEN_KEY'), ''); // Provide a default empty string

        try {
            $response = Http::withToken($token)->post($url, $data);



            if ($response->successful()) {
                if ($response->getStatusCode() == 201) {
                    $message = $response->json()['message'] ?? 'Successful added'; // Ensure 'data' exists, otherwise fallback to empty array
                    $flasher->success($message);
                }
            } else {
                // Log the error if request fails but is not an exception
                \Log::error('Failed to add question', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);

                $flasher->error($response->json()['message']);
            }

        } catch (Exception $e) {
            // Log the exception for debugging
            \Log::error('Exception in fetching series data: ' . $e->getMessage());
            $flasher->error($e->getMessage());
        }

        return redirect()->back();
    }
}
