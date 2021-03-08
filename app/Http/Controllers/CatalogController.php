<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Abuse;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    public function abuse(Request $request, Site $site) {
        return view('catalog.abuse', compact('site'));
    }

    public function send_abuse(Request $request, Site $site) {
        $validated = $request->validate([
            'site_id' => 'required|integer',
            'contact' => 'required|min:5|max:255',
            'email' => 'bail|required|min:5|max:255|email',
            'message' => 'required|min:5|max:5120',
        ]);


        Abuse::create($validated);

        Session::flash('message', 'Сообщение отправлено');
        Session::flash('alert-class', 'alert-success');

        return redirect('/');
    }
}
