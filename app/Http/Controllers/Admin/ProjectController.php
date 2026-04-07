<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view("projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types=Type::all();
        return view('projects.create',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->all();
        $newProject = new Project();
        $newProject->title = $data['title'];
        $newProject->type = $data['type_id'];
        $newProject->author = $data['author'];
        $newProject->description = $data['description'];
        $newProject->save();
        return redirect()->route('projects.show', $newProject);

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
         $type= $project->type;
        return view("projects.show", compact("project",'type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types=Type::all();
        return view("projects.edit",compact("project",'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Project $project)
    {
        $data=$request->all();
        $project->title = $data['title'];
        $project->author = $data['author'];
        $project->description= $data['description'];
        $project->type_id=$data['type_id'];
        $project->save();
        return redirect()->route('projects.show',$project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route("projects.index");
    }
}
