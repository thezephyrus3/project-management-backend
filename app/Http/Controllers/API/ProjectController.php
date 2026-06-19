<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the projects.
     */
    public function index()
    {
        return response()->json(Project::all(), 200);
    }

    /**
     * Store a newly created project in storage.
     */
    public function store(ProjectRequest $request)
    {

        $project = Project::create($request->validated());

        return response()->json($project, 201);
    }

    /**
     * Display the specified project.
     */
    public function show(Project $project)
    {
        return response()->json($project, 200);
    }

    /**
     * Update the specified project in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {

        $project->update($request->validated());

        return response()->json($project, 200); // 200 OK
    }

    /**
     * Remove the specified project from storage.
     */
    public function destroy(Project $project)
    {
        $project->query()->delete();

        return response()->json([
            'message' => 'Project succesfully deleted',
        ]); // No content
    }
}
