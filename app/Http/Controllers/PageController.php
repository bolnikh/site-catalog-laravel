<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function about() {
        return view('page.about');
    }

    public function contact() {
        return view('page.contact');
    }

    public function send_contact(Request $request) {
        $validated = $request->validate([
            'contact' => 'required|min:5|max:255',
            'email' => 'bail|required|min:5|max:255|email',
            'message' => 'required|min:5|max:5120',
        ]);


        Contact::create($validated);

        Session::flash('message', 'Сообщение отправлено');
        Session::flash('alert-class', 'alert-success');

        return redirect('/');
    }



    public function rules() {
        return view('page.rules');
    }


}
