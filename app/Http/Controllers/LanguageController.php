<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class LanguageController extends Controller
{
    public function switchLang(Request $request, $lang)
    {
        App::setLocale($lang);
        $request->session()->put('locale', $lang);
        return redirect()->back();
    }
}