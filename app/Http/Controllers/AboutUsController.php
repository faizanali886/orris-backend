<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index(){

        $about = About::first();

        return view('aboutus.index', compact('about'));
    }

    public function update(Request $request){

        $request->validate([
            'title' => 'required',
            'content' => 'required|string',
        ]);

        $about = About::find($request->id);
        $about->title = $request->title;
        $about->content = $request->content;
        $about->save();
        
        return redirect()->back()->with('success', 'About us updated successfully');

    }
}
