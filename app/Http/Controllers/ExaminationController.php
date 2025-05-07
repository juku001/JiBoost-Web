<?php

namespace App\Http\Controllers;
use Http;
use App\Helpers\ApiRoutes;
use Illuminate\Http\Request;

class ExaminationController extends Controller
{
    public function series($id)
    {


        $apiRoutes = new ApiRoutes();
        $url = $apiRoutes->getSeriesBySubject($id);
        $token = (string) session(env('API_TOKEN_KEY'));

        $response = Http::withToken($token)->get($url);
        $levelSubject = $response->json()['data'];


        return view('dashboard.examination-series', [
            'levelSubject' => $levelSubject,
            'levelSubjectId' => $id,
            'ApiRoutes' => $apiRoutes, // Pass the instance to the view
        ]);
    }


    public function examInfo($sub, $id)
    {


        return view('dashboard.examination-show', compact('sub', 'id'));
    }


    public function startExam($sub, $id)
    {
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
        $apiRoutes = new ApiRoutes();
        $url = $apiRoutes->questions($series);
        $token = (string) session(env('API_TOKEN_KEY'));
    
        // Fetch all questions from API
        $response = Http::withToken($token)->get($url);
        $allQuestions = $response->json()['data']; 
    
        // Get user's answers
        $answers = $request->input('answers'); // Example: ["1" => "option_c", "2" => "option_d"]
    
        // Initialize counters
        $questionsDone = count($answers); // Number of answered questions
        $questionsChecked = 0; // Correctly answered questions
    
        // Loop through each question and check correctness
        foreach ($allQuestions as $question) {
            $questionId = $question['id'];
    
            // Check if user answered this question
            if (isset($answers[$questionId])) {
                if ($answers[$questionId] === $question['correct_option']) {
                    $questionsChecked++; // Count correct answers
                }
            }
        }
    
        // Prepare the data
        $data = [
            "series_id" => $series,
            "questions_done" => $questionsDone,
            "start_time" => now()->subMinutes(10)->toDateTimeString(), // Assume exam started 10 mins ago
            "end_time" => now()->toDateTimeString(), // Current time as end time
            "questions_checked" => $questionsChecked,
            "questions_skipped" => 0, // Always zero
            "end_type" => "submitted"
        ];
    
        return response()->json($data); // Example response (replace with your actual logic)
    }
    

}
