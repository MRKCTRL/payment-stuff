<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class contactController extends Controller
{
    //
    public function index()
    {
    $contact = Contact::get();        

        return view('contact.index', compact('contact',));
    // foreach ($contact as $contact){
    //     echo $contact->name.'<br>';

    }
    public function store()
    {
    Contact::create([
        'name' => 'David'
    ]);
    return back();
    }
}
