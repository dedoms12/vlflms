<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\author;
use App\Http\Requests\StoreauthorRequest;
use App\Http\Requests\UpdateauthorRequest;

class ApiAuthorController extends Controller
{
    public function authorindex()
    {
        $authors = author::all();

        return response()->json(['data' => $authors], 200);
    }


    public function authorstore(StoreauthorRequest $request)
    {
    // Validate the incoming request using StoreauthorRequest
    $author = author::create($request->validated());

    // If validation passes and author is created successfully
    return response()->json(['message' => 'Author created successfully', 'data' => $author], 201);
    }

    public function authorshow($id)
    {
        $author = author::find($id);

        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }

        return response()->json(['data' => $author], 200);
    }

    public function authorupdate(UpdateauthorRequest $request, $id)
    {
        $author = author::find($id);

        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }

        $author->update($request->validated());

        return response()->json(['message' => 'Author updated successfully', 'data' => $author], 200);
    }

    public function authordestroy($id): JsonResponse
    {
        $author = author::find($id);

        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }

        $author->delete();

        return response()->json(['message' => 'Author deleted successfully']);
    }



}
