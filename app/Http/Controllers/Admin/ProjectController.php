<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Psy\CodeCleaner\ReturnTypePass;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->paginate(10);
        $direction = 'desc';
        return view('admin.projects.projects', compact('projects', 'direction'));
    }

    public function orderby($column, $direction){
        $direction = $direction === 'desc'?'asc':'desc';
        $projects = Project::orderBy($column, $direction)->paginate(10);
        return view('admin.projects.projects', compact('projects', 'direction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $project_data = $request->all();
        $project_data['slug'] = Project::generateSlug($project_data['name']);

        $new_project = new Project();
        $new_project->fill($project_data);
        $new_project->save();
        //$new_project = Project::create($project_data);

        return redirect()->route('admin.project.show', $new_project)->with('message', "Progetto inserito correttamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $project_data = $request->all();
        if($project_data['name'] != $project->name){
            $project_data['slug'] = Project::generateSlug($project_data['name']);
        }else{
            $project_data['slug'] = $project->slug;
        }

        $project->update($project_data);
        return redirect()->route('admin.project.show', $project)->with('message', "Progetto modificato correttamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.project.index')->with('deleted', "Progetto eliminato correttamente");
    }
}
