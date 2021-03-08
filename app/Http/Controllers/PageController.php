<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about() {
        return view('page.about');
    }

    public function contact() {
        return view('page.contact');
    }

    public function rules() {
        return view('page.rules');
    }


}
