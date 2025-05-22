<?php

namespace App\Http\Controllers;

use App;
use App\Helpers\FlasherHelper;
 use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Session;

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


    public function changeLanguage()
    {
        $currentLocale = App::getLocale();
        $newLocale = $currentLocale === 'en' ? 'sw' : 'en';
        Session::put(env('LANGUAGE_KEY'), $newLocale);
        App::setLocale($newLocale); 
        // return [
        //     'old_locale' => $currentLocale,
        //     'new_locale' => $newLocale,
        //     'dashboard' => __('dashboard.dashboard')
        // ];
        FlasherHelper::success($newLocale == 'en' ? 'Language Changed successfully.' : 'Umefanikiwa kubadilisha lugha.');
        return redirect()->back();
    }

}
