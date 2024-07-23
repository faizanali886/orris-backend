<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index(){

        $services = Service::latest()->get();
        
        return view('services.index', compact('services'));
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required|string',
            'image' => 'required|url'
        ]);

        $service = new Service();
        $service->title = $request->title;
        $service->image = $request->image;
        $service->save();

        return redirect()->back()->with('success', 'Service stored successfully');

    }

    public function update(Request $request){

        $request->validate([
            'title' => 'required|string',
            'image' => 'required|url',
        ]);

        $service = Service::find($request->id);
        $service->title = $request->title;
        $service->image = $request->image;
        $service->save();

        return redirect()->back()->with('success', 'Service updated successfully');
    }

    public function destroy($id){

        Service::destroy($id);
        
        return redirect()->back()->with('success', 'Service deleted successfully');
    }
}
