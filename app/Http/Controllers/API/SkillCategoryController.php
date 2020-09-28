<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkillCategoryRequest;
use Illuminate\Http\Request;
use App\Models\SkillCategory;

class SkillCategoryController extends Controller
{
    protected function saveCategorySkill(SkillCategory $category, Request $request)
    {
        $category->category = $request->category;
        $category->save();
    }

    public function index()
    {
        $skillCategory =  SkillCategory::orderBy('category', 'ASC')->get();
        $skillCategory->load('allSkill');
        return response()->json($skillCategory);
    }

    public function store(SkillCategoryRequest $request)
    {
        $newCategory = new SkillCategory;
        $this->saveCategorySkill($newCategory, $request);

        return response()->json([
            'message' => "Successfully add new skill category named $newCategory->category",
            'data' => $newCategory
        ]);
    }

    public function show($id)
    {
        return response()->json(SkillCategory::findOrFail($id)->load('allSkill'));
    }

    public function update(SkillCategoryRequest $request, $id)
    {
        $category = SkillCategory::findOrFail($id);
        $originalCategory = $category->getOriginal('category');
        $this->saveCategorySkill($category, $request);

        return response()->json([
            'message' => "Successfully updated skill category $originalCategory become $category->category",
            'data' => $category
        ], 200);
    }

    public function destroy($id)
    {
        $category = SkillCategory::findOrFail($id);
        $category->allSkill()->delete();
        $category->delete();

        return response()->json([
            'message' => "Successfully deleted skill category $category->category with his skill"
        ], 200);
    }
}
