<?php
namespace App\Helpers;

class FlasherHelper
{



    public function success($message)
    {
        flash()->success($message, ['position' => 'bottom-right']);
    }


    public function error($message)
    {
        flash()->error($message, ['position' => 'bottom-right']);
    }



}