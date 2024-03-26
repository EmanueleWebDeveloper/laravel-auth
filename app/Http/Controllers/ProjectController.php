<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

use function PHPUnit\Framework\returnSelf;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project = Project::all();

        return view('pages.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $validated_data = $request->validated();

        $slug = Project::generateSlug($request->title);

        $validated_data['slug'] = $slug;

        $new_project = Project::create($validated_data);

        return redirect()->route('dashboard.project.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('pages.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        // dd($project->toArray());
        return view('pages.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $validated_data = $request->validated();
        $slug = Project::generateSlug($request->title);

        $validated_data['slug'] = $slug;

        $project->update($validated_data);
        return redirect()->route('dashboard.project.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('dashboard.project.index');
    }
}
