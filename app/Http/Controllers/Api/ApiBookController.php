<?php

namespace App\Http\Controllers\Api;

use App\Models\book;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorebookRequest;
use App\Http\Requests\UpdatebookRequest;

class ApiBookController extends Controller
{
    public function bookindex(): JsonResponse
    {
        $books = book::with(['author', 'category', 'publisher'])->get();

        return response()->json(['data' => $books], 200);
    }

    public function bookshow($id): JsonResponse
    {
        $book = book::with(['author', 'category', 'publisher'])->find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        return response()->json(['data' => $book], 200);
    }

    public function bookstore(StorebookRequest $request): JsonResponse
    {
        $book = book::create($request->validated());

        return response()->json(['message' => 'Book created successfully', 'data' => $book], 201);
    }

    public function bookupdate(UpdatebookRequest $request, $id): JsonResponse
    {
        $book = book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $book->update($request->validated());

        return response()->json(['message' => 'Book updated successfully', 'data' => $book]);
    }

    public function bookdestroy($id): JsonResponse
    {
        $book = book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $book->delete();

        return response()->json(['message' => 'Book deleted successfully']);
    }
}
