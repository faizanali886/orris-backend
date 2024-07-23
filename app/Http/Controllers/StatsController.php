<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Stats;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function index(){

        $stats = Stats::first();

        return view('stats.index', compact('stats'));
    }

    public function update(Request $request){
        
        $request->validate([
            'countries' => 'required|numeric',
            'clients' => 'required|numeric',
            'projects' => 'required|numeric',
        ]);

        $stats = Stats::find($request->id);
        $stats->countries = $request->countries;
        $stats->clients = $request->clients;
        $stats->projects = $request->projects;
        $stats->save();

        return redirect()->back()->with('success', 'Statistics updated successfully');

    }
}
