<?php

namespace App\Helpers;

class ApiRoutes
{
    /**
     * Get the base API URL from the environment.
     */
    public static function baseUrl(): string
    {
        return env('ENGINE_BASE_URL', 'https://default-url.com/');
    }

    /**
     * Get the full API base URL.
     */
    public static function apiUrl(): string
    {
        return self::baseUrl() . '/' . 'api/';
    }



    public static function displayUrl(): string
    {
        return self::baseUrl() . '/' . 'display/';
    }

    /**
     * Authentication Routes
     */



    public static function welcome()
    {
        return self::apiUrl() . 'welcome';
    }

    public static function login(): string
    {
        return self::apiUrl() . 'login';
    }

    public static function register(): string
    {
        return self::apiUrl() . 'register';
    }

    public static function updatePassword()
    {
        return self::apiUrl() . 'update_password';
    }


    public static function forgotPassword()
    {
        return self::apiUrl() . 'forgot_password';
    }

    public static function verifyOTP()
    {
        return self::apiUrl() . 'verify_otp';
    }


    public static function resetPassword()
    {
        return self::apiUrl() . 'reset_password';
    }






    public static function logout(): string
    {
        return self::apiUrl() . 'logout';
    }


    public static function users(): string
    {
        return self::apiUrl() . 'users';
    }




    public static function user()
    {
        return self::apiUrl() . 'user';
    }




    /**
     * User Routes
     */
    public static function userProfile(): string
    {
        return self::apiUrl() . 'user/profile';
    }

    public static function updateUser(): string
    {
        return self::apiUrl() . 'user/update';
    }

    /**
     * Exam Routes
     */
    public static function exams(): string
    {
        return self::apiUrl() . 'exams';
    }

    public static function examResults(): string
    {
        return self::apiUrl() . 'results';
    }

    public static function postResult(): string
    {
        return self::apiUrl() . 'result';
    }


    public static function examResultsById($id): string
    {
        return self::apiUrl() . 'results/' . $id;
    }

    /**
     * Payment Routes
     */

    public static function pay(): string
    {
        return self::apiUrl() . 'pay';
    }
    public static function payments(): string
    {
        return self::apiUrl() . 'payments';
    }

    public static function singlePayment($id): string
    {
        return self::apiUrl() . 'payments/' . $id;
    }

    public static function educationLevels()
    {
        return self::apiUrl() . 'levels';
    }

    public static function quotes()
    {
        return self::apiUrl() . 'quotes';
    }

    public static function quote()
    {
        return self::apiUrl() . 'quote';
    }

    public function subjects()
    {
        return self::apiUrl() . 'subjects';
    }

    public function levelSubjects()
    {
        return self::apiUrl() . 'level_subjects';
    }


    public function assignSeries()
    {
        return self::apiUrl() . 'assign_to_series';
    }


    public function getSeriesBySubject($id)
    {
        return self::apiUrl() . 'series/edulevel/' . $id;
    }


    public function getAllSeries()
    {
        return self::apiUrl() . 'series';
    }

    public function getSeries($id)
    {
        return self::apiUrl() . 'series/' . $id;
    }

    public function assignQuestion()
    {
        return self::apiUrl() . 'assign_to_questions';
    }

    public function questions($id)
    {
        return self::apiUrl() . 'questions/' . $id;
    }


    public function deleteQuestion($id)
    {
        return self::apiUrl() . 'delete/question/' . $id;
    }



    public function subscription()
    {
        return self::apiUrl() . 'subscription';
    }


    public function subscriptionPPE()
    {
        return self::apiUrl() . 'subscription_ppe';
    }


    public function subscriptionList()
    {
        return self::apiUrl() . 'subscriptions';
    }

    public function paymentMethods()
    {
        return self::apiUrl() . 'methods';
    }


    public function getQuote()
    {
        return self::apiUrl() . 'quote';
    }

    public function paymentStatus()
    {
        return self::apiUrl() . 'payment_status';
    }


    static function getFaqs()
    {
        return self::apiUrl() . 'faqs';
    }


    static function singleFaq()
    {
        return self::apiUrl() . 'faq';
    }

    static function updateFaq($id)
    {
        return self::apiUrl() . 'faq/' . $id;
    }

    static function displayPhoto()
    {
        return self::apiUrl() . 'display/photo';
    }
}
