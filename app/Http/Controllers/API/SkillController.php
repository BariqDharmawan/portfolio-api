<?php

namespace App\Http\Controllers\API;

use App\Skill;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use App\Http\Requests\SkillRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{

    /**
     * Display all skill.
     *
     * @return Response
     */
    public function index()
    {
        $allSkill = Skill::latest('start_from')->get();
        return response()->json($allSkill);
    }

    /**
     * Store a newly skill.
     *
     * @param  SkillRequest  $request
     * @return Response
     */
    public function save(SkillRequest $request, $id)
    {
        $newSkill = Skill::updateOrCreate(
            ['id', $id],
            [
                'name' => ucwords($request->name),
                'category' => $request->category,
                'start_from' => $request->start_from
            ]
        );

        $message = '';
        $jsonCode = '';
        switch ($request->method()) {
            case 'POST':
                $message = 'Succesfully add new skill';
                $jsonCode = 201;
                break;
            case 'PUT':
                $message = 'Succesfully updated skill named ' . ucwords($request->name);
                $jsonCode = 200;
            break;
        }
        
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $newSkill
        ], $jsonCode);
    }

    /**
     * Displaying specified skill
     *
     * @param  $id
     * @return Response
     */
    public function show($id)
    {
        $singleSkill = Skill::findOrFail($id);
        return response()->json($singleSkill);
    }

    /**
     * Remove the specified skill.
     *
     * @param $id
     * @return Response
     */
    public function destroy($id)
    {
        $deleteSkill = Skill::findOrFail($id);
        $deleteSkill->delete();
        return 'Successfully deleted skill called ' . $deleteSkill->name;
    }
}
