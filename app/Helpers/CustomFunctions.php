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

    public static function formatTimeFromDateTime($dateTime)
    {

        $date = new DateTime($dateTime);

        return $date->format('h:i a');

    }



    public static function getDurationFromMinutes($duration)
    {
        $hours = floor($duration / 60);
        $minutes = $duration % 60;

        if ($hours > 0 && $minutes > 0) {
            return "{$hours} hrs and {$minutes} mins";
        } elseif ($hours > 0) {
            return "{$hours} hrs";
        } elseif ($minutes > 0) {
            return "{$minutes} mins";
        } else {
            return "0 mins";
        }
    }




    public static function giveAnswerResult($question, $answerData)
    {
        $answers = json_decode($answerData, true);
        $correct = $question['correct_option'];
        $correctAnswer = $question[$correct];
        $choice = $answers[$question['id']] ?? null;

        $isChecked = $choice == $correct;

        if ($isChecked) {
            return '<span class="small text-success">' . LaTexHelper::extractLatex($correctAnswer) . '</span>';
        } else {
            $choiceAnswer = $question[$choice] ?? 'N/A';
            return '<span class="small text-danger fw-semibold"> ' . LaTexHelper::extractLatex($choiceAnswer) . '</span><span class="small"> (' . LaTexHelper::extractLatex($correctAnswer) . ')</span>';
        }
    }


    public static function allowedToViewSeries($series, $subscription, $levelId)
    {

        $allow = false;
        if ($series['isTrial']) {
            $allow = true;

        } else {
            if ($subscription != null) {
                if ($subscription['subscription_id'] == 2) {
                    $allow = true;
                } else if ($subscription['subscription_id'] == 1) {
                    if ($subscription['education_level_id'] == $levelId) {
                        $allow = true;
                    }
                }
            }
        }
        return $allow;
    }


}