<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index(){

        $contacts = Contact::latest()->paginate(30);

        return view('contacts.index', compact('contacts'));
    }
}
