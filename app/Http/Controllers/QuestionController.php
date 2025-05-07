<?php

namespace App\Http\Controllers;

use App\Helpers\ApiRoutes;
use App\Helpers\FlasherHelper;
use Http;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function destroy($id)
    {

        $apiRoutes = new ApiRoutes();
        $flasher = new FlasherHelper();
        $url = $apiRoutes->deleteQuestion($id);

         $token = (string) session(env('API_TOKEN_KEY'));
        $response = Http::withToken($token)->post($url);
        if ($response->successful()) {
            $result = $response->json();
            if ($result['status'] == true) {
                $flasher->success($result['message']);
            } else {
                $flasher->error($result['message']);
            }

        } else {

            $flasher->error('Failed to delete question');
            return response()->json($response->json());
        }

        return redirect()->back();

    }
}
