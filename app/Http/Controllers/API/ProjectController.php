<?php

namespace App\Http\Controllers\API;

use App\Models\Project;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $projects = Project::latest('finished_date')->get();
        return response()->json($projects);
    }

    /**
     * add new project
     *
     * @param  ProjectRequest  $request
     * @return JsonResponse
     */
    public function store(ProjectRequest $request)
    {
        $project = Project::create([
            'title' => ucwords($request->title),
            'finished_date' => $request->finished_date,
            'is_teamwork' => $request->boolean('is_teamwork'),
            'desc' => $request->desc
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Successfully add new project with title ' . $project->title,
            'data' => $project
        ], 201);
    }

    public function update(ProjectRequest $request, $id)
    {
        $editProject = Project::findOrFail($id);
        $editProject->update([
            'title' => ucwords($request->title),
            'finished_date' => $request->finished_date,
            'is_teamwork' => $request->boolean('is_teamwork'),
            'desc' => $request->desc
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Successfully update project ' . $editProject->title,
            'data' => $editProject
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return response()->json($project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $deleteProject = Project::findOrFail($id);
        $deleteProject->delete();
        return response()->json([
            'success' => true,
            'message' => 'Succesfully remove project named ' . $deleteProject->title,
            'data' => $deleteProject
        ]);
    }
}
