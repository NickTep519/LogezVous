<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocalizationController extends Controller
{
    public function changLang($locale) {


        if (in_array($locale, ['en', 'fr'])) {

            session(['locale' => $locale]) ;
        }


        return redirect()->back() ;

    }
}
