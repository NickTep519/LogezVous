<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class FaqController extends Controller
{
    public function faq() {

        $locale = App::getLocale() ;

        if ($locale == 'en') {
            return view('faq.en') ;
        }

        return view('faq.fr') ;
    }
}
