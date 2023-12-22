<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;
use Illuminate\Http\JsonResponse;

class ApiCategoryController extends Controller
{
    public function categoryindex(): JsonResponse
    {
        $categories = category::all();

        return response()->json(['data' => $categories], 200);
    }

    public function categorystore(StorecategoryRequest $request): JsonResponse
    {
        $category = category::create($request->validated());

        return response()->json(['message' => 'Category created successfully', 'data' => $category], 201);
    }

    public function categoryupdate(UpdatecategoryRequest $request, $id): JsonResponse
    {
        $category = category::findOrFail($id);
        $category->update($request->validated());

        return response()->json(['message' => 'Category updated successfully', 'data' => $category], 200);
    }

    public function categorydestroy($id): JsonResponse
    {
        $category = category::findOrFail($id);
        $category->delete();

        return response()->json(['message' => 'Category deleted successfully']);
    }
}
