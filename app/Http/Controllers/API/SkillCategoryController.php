<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SkillCategory;

class SkillCategoryController extends Controller
{

    public function index()
    {
        $skillCategory =  SkillCategory::orderBy('category', 'ASC')->get();
        return response()->json($skillCategory);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|unique:App\Models\SkillCategory'
        ]);

        $newCategory = SkillCategory::create([
            'category' => $request->category
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Successfully add new skill category',
            'data' => $newCategory
        ]);
    }

    public function show($id)
    {
        return response()->json(SkillCategory::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $editSkill = SkillCategory::findOrFail($id);
        $editSkill->category = $request->category;
        $originalCategory = $editSkill->getOriginal('category');
        $editSkill->save();

        return response()->json([
            'success' => true,
            'message' => "Successfully updated skill category $originalCategory become $editSkill->category",
            'data' => $editSkill
        ]);
    }

    public function destroy($id)
    {
        $deleteCategory = SkillCategory::findOrFail($id);
        $deleteCategory->delete();

        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted skill category',
            'data' => $deleteCategory
        ]);
    }
}
