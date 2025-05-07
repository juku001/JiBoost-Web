<?php

namespace App\Http\Controllers;

use App\Helpers\ApiRoutes;
use App\Helpers\FlasherHelper;
use Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuoteController extends Controller
{
    public function index()
    {

        $url = ApiRoutes::quotes();
        $token = (string)session(env('API_TOKEN_KEY'));

        $response = Http::withToken($token)->get($url);
        $quotes = $response->json()['data'];

        return view('admin.quotes', compact('quotes'));
    }


    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'author' => 'required',
            'quote' => 'required'
        ]);


        $flasher = new FlasherHelper();
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $flasher->error($error);
            }
            return redirect()->back();
        }
            

        $url = ApiRoutes::quote();
        $token = session(env('API_TOKEN_KEY'));
        $data = [
            "quote" => $request->quote,
            "author" => $request->author,
            "category" => $request->category
        ];
        try {
            $response = Http::withToken((string)$token)->post($url, $data);
            $data = $response->json();

            $message = $data['message'];
            if ($data['code'] == 500) {
                $flasher->error($message);
            } else if ($data['code'] == 201) {
                $flasher->success($message);
            } else {
                $flasher->error('Unknown response from server');
            }
            return redirect()->back();
        } catch (\Exception $e) {
            $flasher->success($message);
            return redirect()->back()->withInput();
        }
    }
}
