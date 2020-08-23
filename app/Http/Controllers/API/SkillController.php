<?php

namespace App\Http\Controllers\API;

use App\Models\Skill;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\SkillRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class SkillController extends Controller
{

    public function index()
    {
        return response()->json(Skill::all());
    }

    /**
     * Store a newly skill
     * @param SkillRequest $request
     * @return JsonResponse
     */
    public function store(SkillRequest $request)
    {
        $newSkill = Skill::create([
            'name' => ucwords($request->name),
            'category' => $request->category,
            'start_from' => $request->start_from
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Successfully add new skill name ' . $newSkill->name,
            'data' => Skill::findOrFail($newSkill->id)
        ], 201);
    }

    public function show($id)
    {
        return response()->json(Skill::findOrFail($id));
    }

    public function update(SkillRequest $request, $id)
    {
        $editSkill = Skill::findOrFail($id);
        $editSkill->update([
            'name' => Str::ucfirst($request->name),
            'category_id' => $request->category_id,
            'start_from' => $request->start_from
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Successfully updated skill named ' . $editSkill->name,
            'data' => $editSkill
        ], 200);
    }

    /**
     * Remove the specified skill.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $deleteSkill = Skill::findOrFail($id);
        $deleteSkill->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted skill called ' . $deleteSkill->name,
            'data' => $deleteSkill
        ]);
    }
}
