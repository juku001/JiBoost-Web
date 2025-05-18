<?php
namespace App\Helpers;

class FlasherHelper
{



    public static function success($message)
    {
        flash()->success($message, ['position' => 'bottom-right']);
    }


    public static function error($message)
    {
        flash()->error($message, ['position' => 'bottom-right']);
    }

    



}