<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function add_form() {

        $cat_arr = Category::getListForSelect();


        return view('site.add_form', compact('cat_arr'));
    }


    public function store(Request $request) {
        $validated = $request->validate([
            'category_id' => 'required|integer',
            'url' => 'required|min:5|max:1024',
            'title' => 'required|min:5|max:255',
            'description' => 'required|min:5|max:1024',
            'long_description' => 'max:5120',
        ]);
    }
}
