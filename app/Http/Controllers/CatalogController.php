<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Site;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index() {

        $categories = Category::where('parent_id', null)
            ->orderBy('name')
            ->get()
        ;

        //var_dump($categories);

        return view('catalog.index', compact('categories'));
    }


    public function category(Request $request, Category $category) {

        return view('catalog.category', compact('category'));
    }


    public function search() {
        return view('catalog.search', ['site_list' => []]);
    }

    public function site(Request $request, Site $site) {
        return view('catalog.site', compact('site'));
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
