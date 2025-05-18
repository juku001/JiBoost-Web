<?php

namespace App\Http\Controllers;

use App\Helpers\FlasherHelper;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function index()
    {
        $flasher = new FlasherHelper();
        $flasher->error('Community is not available for now.');
        return redirect()->back();
    }
}
