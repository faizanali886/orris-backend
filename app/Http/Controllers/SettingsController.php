<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(){

        $settings = Setting::first();

        return view('settings.index', compact('settings'));
    }

    public function update(Request $request){

        $request->validate([
            'logo' => 'required|url',
            'vimeoLink' => 'required|url',
            'behanceLink' => 'required|url',
            'instgramLink' => 'required|url',
            'facebookLink' => 'required|url',
            'linkedinLink' => 'required|url',
        ]);

        $setting = Setting::find($request->id);
        $setting->logo = $request->logo;
        $setting->vimeoLink = $request->vimeoLink;
        $setting->behanceLink = $request->behanceLink;
        $setting->instgramLink = $request->instgramLink;
        $setting->facebookLink = $request->facebookLink;
        $setting->linkedinLink = $request->linkedinLink;
        $setting->save();
        
        return redirect()->back()->with('success', 'Settings updated successfully');
    }
}
