<?php

namespace App\Http\Controllers\API;

use App\Skill;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\SkillRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::all();
        return $skills;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:my_skill|max:50',
            'category' => 'required|regex:/^[\pL\s\-]+$/u|max:40',
            'start_from' => 'required|digits:4|integer|min:1900|max:' . Carbon::tomorrow()->year
        ],
        [
            'name.required' => 'A name of skill is required',
            'category.required' => 'A category of skill is required',
            'start_from.required' => 'A start from of skill is required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            foreach($errors->all() as $error) {
                return response()->json($error, 400);
            }
        }
        else {
            $createSkill = Skill::create([
                'name' => $request->name,
                'category' => $request->category,
                'start_from' => $request->start_from
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Berhasil menambah skill',
            ], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $skill = Skill::findOrFail($id);
        return $skill;
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
        $skill = Skill::findOrFail($id)->update([
            'name' => $request->name, 
            'category' => $request->category
        ]);
        return response()->json($skill, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteSkill = Skill::findOrFail($id);
        $deleteSkill->delete();
        return response()->json(null, 204);
    }
}
