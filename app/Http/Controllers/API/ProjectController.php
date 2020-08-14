<?php

namespace App\Http\Controllers\API;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $projects = Project::latest('finished_date')->get();
        return response()->json($projects);
    }

    /**
     * update / create new project
     *
     * @param  ProjectRequest  $request
     * @return Response
     */
    public function save(ProjectRequest $request, $id)
    {
        $project = Project::updateOrCreate(
            ['id' => $id],
            [
                'title' => ucwords($request->title),
                'finished_date' => $request->finished_date,
                'is_teamwork' => $request->boolean('is_teamwork'),
                'desc' => $request->desc
            ]
        );
        
        $message = '';
        $jsonCode = '';
        switch ($request->method()) {
            case 'POST':
                $message = 'Succesfully add new project';
                $jsonCode = 201;
                break;
            case 'PUT':
                $message = 'Succesfully upated project named ' . ucwords($request->title);
                $jsonCode = 200;
            break;
        }
        
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $project
        ], $jsonCode);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return Response
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
     * @return Response
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
