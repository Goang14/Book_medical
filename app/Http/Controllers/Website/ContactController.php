<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(){
        return view('website.contact');
    }

    public function sendContact(Request $request){
        $sendContact = Contact::create([
            'name'  => $request->name,
            'email' => $request->email,
            'topic' => $request->topic,
            'phone' => $request->phone,
            'message'=>$request->message
        ]);
        return response()->json(['sendContact' => $sendContact, 'status' => 200]);
    }
}
