<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index(){

        $client = Client::first();

        return view('clients.index', compact('client'));
    }
}
