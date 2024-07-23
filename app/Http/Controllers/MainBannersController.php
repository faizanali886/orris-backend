<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MainBanner;
use Illuminate\Http\Request;

class MainBannersController extends Controller
{
    public function index(){

        $banner = MainBanner::first();
        
        return view('main_banner.index', compact('banner'));
    }

    public function update(Request $request){

        $request->validate([
            'title' => 'required',
            'video_link' => 'required|url',
        ]);

        $banner = MainBanner::find($request->id);
        $banner->title = $request->title;
        $banner->video_link = $request->video_link;
        $banner->save();
        
        return redirect()->back()->with('success', 'Main banner updated successfully');
    }
}
