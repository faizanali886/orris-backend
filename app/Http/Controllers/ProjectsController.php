<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectDetail;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index(){

        $projects = Project::with('projectDetails')->latest()->get();

        return view('projects.index', compact('projects'));
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required|string',
            'cover' => 'required|url',
            'images' => 'required|array',
        ]); 

        $project = new Project();
        $project->title = $request->title;
        $project->cover = $request->cover;
        $project->save();

        foreach($request->images as $image){
            $projectDetail = new ProjectDetail();
            $projectDetail->project_id = $project->id;
            $projectDetail->link = $image;
            $projectDetail->save();
        }

        return redirect()->back()->with('success', 'Project added successfully');
    }

    public function update(Request $request){

        $request->validate([
            'title' => 'required|string',
            'cover' => 'required|url',
            'images' => 'required|array',
        ]); 

        $project = Project::find($request->id);
        $project->title = $request->title;
        $project->cover = $request->cover;
        $project->save();

        $project->projectDetails()->delete();

        foreach($request->images as $image){
            $projectDetail = new ProjectDetail();
            $projectDetail->project_id = $project->id;
            $projectDetail->link = $image;
            $projectDetail->save();
        }

        return redirect()->back()->with('success', 'Project updated successfully');
    }

    public function destroy($id){

        $project = Project::findOrFail($id);

        $project->projectDetails()->delete();

        $project->delete();

        return redirect()->back()->with('success', 'Project deleted successfully');
    }
}
