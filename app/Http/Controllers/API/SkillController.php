<?php

namespace App\Http\Controllers\API;

use App\Skill;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use App\Http\Requests\SkillRequest;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{

    /**
     * Display all skill.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $allSkill = Skill::latest('start_from')->get();
        return response()->json($allSkill);
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
            'data' => Skill::where('id', $newSkill->id)->first()
        ], 201);
    }

    /**
     * Displaying specified skill
     *
     * @param  $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $singleSkill = Skill::findOrFail($id);
        return response()->json($singleSkill);
    }

    public function update(SkillRequest $request, $id)
    {
        $skill = Skill::findOrFail($id);
        $skill->update([
            'name' => ucwords($request->name),
            'category' => $request->category,
            'start_from' => $request->start_from
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Successfully updated skill named ' . $skill->name,
            'data' => Skill::where('id', $skill->id)->first()
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
