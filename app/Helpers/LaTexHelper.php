<?php


namespace App\Helpers;


class LaTexHelper{
    
   static public function  extractLatex($text)
    {
        return preg_replace_callback('/\$\$(.*?)\$\$/s', function ($matches) {
            return ' \\('. $matches[1] .'\\) ';
        }, $text);
    }
    
}