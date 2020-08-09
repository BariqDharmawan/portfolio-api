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
     * Display a listing of the skill.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::all();
        return $skills;
    }

    /**
     * Store a newly skill.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|alpha_spaces|unique:my_skill|max:50',
            'category' => 'required|in:frontend-framework,backend-framework,basic-stack,tools,preprocessor',
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
                'data' => $createSkill
            ], 201);
        }
    }

    /**
     * Displaying skill
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
     * Update skill
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  id = $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|alpha_spaces|max:50',
            'category' => 'required|in:frontend-framework,backend-framework,basic-stack,tools,preprocessor',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 400);
        }
        else {
            $createSkill = Skill::updateOrCreate(
                ['id' => $id],
                [
                    'name' => $request->name, 
                    'category' => $request->category, 
                    'start_from' => $request->start_from
                ]
            );
            return response()->json([
                'success' => true,
                'message' => 'Berhasil mengubah skill',
                'data' => $createSkill
            ], 201);
        }
    }

    /**
     * Remove the specified skill.
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
