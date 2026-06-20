<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the projects.
     */
    public function index()
    {
        return response()->json(Auth::user()->projects, 200);
    }

    /**
     * Store a newly created project in storage.
     */
    public function store(ProjectRequest $request)
    {

        $project = Auth::user()->projects()->create($request->validated());

        return response()->json($project, 201);
    }

    /**
     * Display the specified project.
     */
    public function show(Project $project)
    {
        $this->authorize('view', $project);

        return response()->json($project, 200);
    }

    /**
     * Update the specified project in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {

        $this->authorize('update', $project);

        return response()->json($project, 200);
    }

    /**
     * Remove the specified project from storage.
     */
    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        return response()->json([
            'message' => 'Project succesfully deleted',
        ]);
    }
}
