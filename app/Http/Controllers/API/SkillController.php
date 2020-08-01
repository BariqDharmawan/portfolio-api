<?php

namespace App\Http\Controllers\API;

use App\Skill;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\SkillRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|unique:my_skill|max:50',
            'category' => 'required|in:frontend-framework,backend-framework,basic-stack,tools,preprocessor',
        ],
        [
            'name.unique' => 'Skill dengan nama " ' . $request->name . ' " sudah ada',
            'name.required' => 'Masukkan name skill',
            'category.required' => 'Masukkan category skill',
            'category.in' => 'Pilihan category skill salah',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error' => $validator->errors()
            ], 400);
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
        $validator = Validator::make($request->all(),
        [
            'name' => 'required',
            'category' => 'required|in:frontend-framework,backend-framework,basic-stack,tools,preprocessor',
        ],
        [
            'name.required' => 'Masukkan name skill',
            'category.required' => 'Masukkan category skill',
            'category.in' => 'Pilihan category skill salah',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        else {
            $skill = Skill::findOrFail($id);
            $skill->update($request->all());
            return response()->json($skill, 200);
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
        $deleteSkill = Skill::findOrFail($id);
        $deleteSkill->delete();
        return 'berhasil delete skill';
    }
}
