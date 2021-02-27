<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index() {

        return view('catalog.index');
    }


    public function category() {
        return view('catalog.category');
    }


    public function search() {
        return view('catalog.search');
    }

    public function site() {
        return view('catalog.site');
    }

    public function add_form() {
        return view('catalog.add_form');
    }

    public function about() {
        return view('catalog.about');
    }

    public function rules() {
        return view('catalog.rules');
    }
}
