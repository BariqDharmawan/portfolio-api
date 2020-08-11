<?php

namespace App\Http\Controllers\API;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::latest('finished_date')->get();
        return response()->json($projects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'title' => 'required|unique:my_project|max:50',
            'finished_date' => 'required|date|before_or_equal:today|after:1910-01-01',
            'is_teamwork' => 'required|boolean',
            'desc' => 'required|string|min:10|max:255'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 400);
        }
        else {
            Project::create([
                'title' => $request->title,
                'finished_date' => $request->finished_date,
                'is_teamwork' => $request->boolean('is_teamwork'),
                'desc' => $request->desc
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Berhasil menambahkan project baru',
                'data' => Project::all()->last()
            ], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        return response()->json($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
        [
            'title' => 'required|max:50',
            'finished_date' => 'required|date|before_or_equal:today|after:1910-01-01',
            'is_teamwork' => 'required|boolean',
            'desc' => 'required|string|min:10|max:255'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        else {
            $project = Project::updateOrCreate(
                ['id' => $id],
                [
                    'title' => $request->title,
                    'finished_date' => $request->finished_date,
                    'is_teamwork' => $request->is_teamwork,
                    'desc' => $request->desc
                ]
            );
            return response()->json($project, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteProject = Project::findOrFail($id);
        $deleteProject->delete();
        return 'berhasil delete project';
    }
}
