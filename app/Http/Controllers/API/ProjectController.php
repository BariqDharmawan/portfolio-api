<?php

namespace App\Http\Controllers\API;

use App\Models\Project;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    protected function saveProject(Project $project, Request $request)
    {
        $project->title = ucwords($request->title);
        $project->finished_date = $request->finished_date;
        $project->is_teamwork = $request->boolean('is_teamwork');
        $project->desc = $request->desc;
        $project->save();
    }

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
        $newProject = new Project;
        $this->saveProject($newProject, $request);

        return response()->json([
            'message' => 'Successfully add new project with title ' . $newProject->title,
            'data' => $project
        ], 201);
    }

    public function update(ProjectRequest $request, $id)
    {
        $editProject = Project::findOrFail($id);
        $this->saveProject($editProject, $request);

        return response()->json([
            'message' => 'Successfully update project ' . $editProject->title,
            'data' => $editProject
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  Project $project
     * @return JsonResponse
     */
    public function show(Project $project)
    {
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
            'message' => 'Successfully remove project named ' . $deleteProject->title
        ], 200);
    }
}
