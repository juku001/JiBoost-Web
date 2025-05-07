<?php

namespace App\Http\Controllers;

use App\Helpers\ApiRoutes;
use Http;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {


        $token = session(env('API_TOKEN_KEY'));
        $url = ApiRoutes::users();
        $response = Http::withToken($token)->get($url);
        $users = $response->json()['data'];

        // Initialize the data count array
        $dataCount = [
            'student' => 0,
            'parents' => 0,
            'teachers' => 0
        ];

        // Loop through users and count the user types
        foreach ($users as $user) {
            if ($user['user_type'] === 'student') {
                $dataCount['student']++;
            } elseif ($user['user_type'] === 'parent') {
                $dataCount['parents']++;
            } elseif ($user['user_type'] === 'teacher') {
                $dataCount['teachers']++;
            }
        }

        // Now, $dataCount contains the count of each user type


        $apiRoutes = new ApiRoutes();
        return view('admin.users', compact('users', 'apiRoutes', 'dataCount'));
    }
}
