<?php

namespace App\Helpers;

use DateTime;


class CustomFunctions
{




    public static function formatAmountToCurrency($amount)
    {
        return number_format($amount, 0, '.', ',');
    }



    public static function formatDateTimeFromDateTime($datetime)
    {
        $date = new DateTime($datetime); // Ensure this is a valid DateTime object

        // Get day with suffix
        $day = $date->format('j');
        $suffix = 'th';
        if (!in_array($day % 100, [11, 12, 13])) {
            switch ($day % 10) {
                case 1:
                    $suffix = 'st';
                    break;
                case 2:
                    $suffix = 'nd';
                    break;
                case 3:
                    $suffix = 'rd';
                    break;
            }
        }

        // Format: 22nd May 2025 03:08 pm
        return $day . $suffix . ' ' . $date->format('M Y h:i a');
    }

}