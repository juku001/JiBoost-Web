<?php

namespace App\Http\Controllers;

use App\Helpers\FlasherHelper;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(){
        $flasher = new FlasherHelper();
        $flasher->error('Notification is not available for now.');
        return redirect()->back();
    }
}
