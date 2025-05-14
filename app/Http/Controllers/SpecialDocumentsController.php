<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SpecialDocumentsController extends Controller
{
    public function privacy()
    {
        return view('customs.privacy_policy');
    }

    public function app(): RedirectResponse
    {
        return redirect()->away('https://play.google.com/store/apps/details?id=jukuapps.spidertechstudios.jiboost');
    }

}
