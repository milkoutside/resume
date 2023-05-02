<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleController extends Controller
{
    public function changeLocale(){
        $currentLocale = App::getLocale();
        switch ($currentLocale)
        {
            case 'ru':
                session(['locale' => 'ukr']);
                App::setLocale('ukr');
                break;

            case 'ukr':
                session(['locale' => 'en']);
                App::setLocale('en');
                break;
            default:
                session(['locale' => 'ru']);
                App::setLocale('ru');
        }

        return redirect()->back();
    }
}
