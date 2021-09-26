<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Abuse;
use App\Models\Site;
use App\Models\Sphinx;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CatalogController extends Controller
{
    public function index() {

        $categories = Category::where('parent_id', null)
            ->orderBy('name')
            ->get()
        ;

        return view('catalog.index', compact('categories'));
    }


    public function category(Request $request, Category $category) {

        return view('catalog.category', compact('category'));
    }


    public function search(Request $request) {
        $query = $request->post('query');
        if (empty($query)) {
            $site_list = [];
            $site_ids = [];
        } else {
            $sphinx = new Sphinx();
            $site_ids = $sphinx->getResult($query);
            if (empty($site_ids)) {
                $site_list = [];
            } else {
                $site_list = Site::whereIn('id', $site_ids)
                    ->orderBy('id', 'DESC')
                    ->paginate(10)
                ;
            }
        }

        return view('catalog.search', ['site_list' => $site_list,
            'query' => $query,
            'total' => sizeof($site_ids),
            ]);
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
