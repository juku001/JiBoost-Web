<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpecialDocumentsController extends Controller
{
    public function privacy()
    {
        return view('customs.privacy_policy');
    }
}
