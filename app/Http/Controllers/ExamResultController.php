<?php

namespace App\Http\Controllers;

use App\Helpers\ApiRoutes;
use App\Helpers\CustomFunctions;
use App\Helpers\FlasherHelper;
use Exception;
use Http;
use Illuminate\Http\Request;

class ExamResultController extends Controller
{






    public function index()
    {
        $apiRoutes = new ApiRoutes();

        // Get results data
        $url = $apiRoutes->examResults();
        $token = (string) session(env('API_TOKEN_KEY'));
        $response = Http::withToken($token)->get($url);

        $results = []; // Default empty array in case of failure

        if ($response->successful()) {
            $results = $response->json()['data'] ?? [];
        } else {
            \Log::error('Failed to fetch results', ['response' => $response->body()]);
        }
        // Enrich results with series info
        foreach ($results as &$result) {
            $seriesId = $result['series_id'];

            $series = $this->getSeriesFromId($seriesId);
            if (isset($series)) {
                $result['series_title'] = $series['title'] ?? null;
                $result['education_level'] = $series['educationLevel'] ?? null;
                $result['subject'] = $series['subject'] ?? null;
            } else {
                // Default values if series not found
                $result['series_title'] = null;
                $result['education_level'] = null;
                $result['subject'] = null;
            }
        }

        // return response()->json($results);
        return view('dashboard.results', compact('results'));
    }



    private function getSeriesFromId($seriesId)
    {
        $apiRoutes = new ApiRoutes();
        $seriesUrl = $apiRoutes->getAllSeries();
        $token = (string) session(env('API_TOKEN_KEY'));
        $responseSeries = Http::withToken($token)->get($seriesUrl);

        $seriesMap = [];
        if ($responseSeries->successful()) {
            $seriesMap = $responseSeries->json()['data'] ?? [];
        } else {
            \Log::error('Failed to fetch series', ['response' => $responseSeries->body()]);
        }

        $matchingSeries = null;
        foreach ($seriesMap as $series) {
            if ($series['id'] == $seriesId) {
                $matchingSeries = $series;
                break;
            }
        }
        return $matchingSeries;

    }


    public function show($exam)
    {
        $exam = CustomFunctions::decrypt($exam);
        $flasher = new FlasherHelper();
        $apiRoutes = new ApiRoutes();
        $url = $apiRoutes->examResultsById($exam);

        $token = (string) session(env('API_TOKEN_KEY'));

        $exam = null;

        try {
            $response = Http::withToken($token)->get($url);
            if ($response->successful()) {
                $exam = $response->json()['data'];
            }
            $seriesId = $exam['series_id'];
            $qnUrl = $apiRoutes->questions($seriesId);
            $responseQns = Http::withToken($token)->get($qnUrl);
            $questions = [];
            if ($response->successful()) {
                $questions = $responseQns->json()['data'];
            }

            return view('dashboard.result-details', compact('exam', 'questions'));

        } catch (Exception $e) {
            $flasher->error('Failed to fetch Exam Information');
            return redirect()->back();
        }
    }
}
