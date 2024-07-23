<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiProjectsResource;
use App\Models\About;
use App\Models\Client;
use App\Models\Contact;
use App\Models\MainBanner;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Stats;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function settings(){

        $settings = Setting::first();

        return response()->json($settings);
    }

    public function mainBanner(){
        
        $mainBanner = MainBanner::first();

        return response()->json($mainBanner);
    }

    public function stats(){

        $stats = Stats::first();

        return response()->json($stats);
    }

    public function services(){

        $services = Service::latest()->get();

        return response()->json($services);
    }

    public function clients(){

        $clients = Client::first();

        return response()->json($clients);
    }

    public function projects(){

        $projects = Project::latest()->get();

        return response()->json(ApiProjectsResource::collection($projects));
    }

    public function aboutus(){

        $aboutus = About::first();

        return response()->json($aboutus);
    }


    public function contact(Request $request){

        $request->validate([
            'name' => 'required|string|min:1|max:60',
            'email' => 'required|email',
            'message' => 'required|string|min:5|max:9999999'
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();

        return response()->json(['message' => 'Message submitted successfully, Will get back to you shortly.']);
    }
}
