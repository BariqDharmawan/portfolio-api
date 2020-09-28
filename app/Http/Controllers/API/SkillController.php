<?php

namespace App\Http\Controllers\API;

use App\Models\Skill;
use App\Http\Requests\SkillRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SkillController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth:sanctum')->except(['index', 'show']);
//    }

    protected function returnResponseJson($data = '', $message = '', $code = '')
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
        ], $code);
    }

    protected function saveSkill(Skill $skill, Request $request)
    {
        $skillName = $request->name;
        $skill->name = Str::ucfirst($skillName);
        $skill->slug = Str::slug($skillName);
        $skill->category_id = $request->category_id;
        $skill->start_from = $request->start_from;
        $skill->user_id = $request->user_id;
        $skill->save();
    }

    public function index() //done
    {
        return response()->json(Skill::latest()->get());
    }

    public function store(SkillRequest $request) //done
    {
        $skill = new Skill;
        $this->saveSkill($skill, $request);

        return response()->json([
            'message' => "Successfully add new skill with name $skill->name",
            'data' => $skill,
        ], 201);
    }

    public function show(Skill $skill) //done
    {
        return response()->json($skill);
    }

    public function update(SkillRequest $request, Skill $skill)
    {
        $this->saveSkill($skill, $request);

        return response()->json([
            'message' => "Successfully updated skill with name "  . $skill->name,
            'data' => $skill
        ], 200);
    }

    public function destroy($id) //done
    {
        $deleteSkill = Skill::findOrFail($id);
        $deleteSkill->delete();

        return response()->json([
            'message' => 'Successfully deleted skill called ' . $deleteSkill->name
        ], 200);
    }
}
