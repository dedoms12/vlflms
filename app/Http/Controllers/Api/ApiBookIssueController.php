<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Storebook_issueRequest;
use App\Http\Requests\UpdatebookRequest;
use App\Models\book_issue;
use Illuminate\Http\Request;
use App\Models\student;
use App\Models\book;
use App\Models\settings;

class ApiBookIssueController extends Controller
{
    public function apiindex()
    {
        return response()->json(book_issue::paginate(5));
    }

    public function apicreate()
    {
        return response()->json([
            'students' => student::latest()->get(),
            'books' => book::where('status', 'Y')->get(),
        ]);
    }

    public function apistore(Storebook_issueRequest $request)
    {
        $issue_date = now()->toDateString();
        $return_date = now()->addDays(settings::latest()->first()->return_days)->toDateString();

        $data = book_issue::create($request->validated() + [
            'student_id' => $request->student_id,
            'book_id' => $request->book_id,
            'issue_date' => $issue_date,
            'return_date' => $return_date,
            'issue_status' => 'N',
        ]);

        $data->save();

        $book = Book::find($request->book_id);
        $book->status = 'N';
        $book->save();

        return response()->json(['message' => 'Book issue created successfully', 'data' => $data], 201);
    }

    public function apiedit($id)
    {
        $book = book_issue::findOrFail($id);

        // Calculate the total fine (total days * fine per day)
        $first_date = now();
        $last_date = $book->return_date;
        $diff = $first_date->diff($last_date);
        $fine = $diff->days * $book->fine_per_day; 

        return response()->json([
            'book' => $book,
            'fine' => $fine,
        ]);
    }

    public function apiupdate(UpdatebookRequest $request, $id)
{
    $bookIssue = book_issue::findOrFail($id);

    // Validate and update the book_issue fields
    $validatedData = $request->validated();
    $bookIssue->update($validatedData);

    // Update book status (example, adjust as per your actual relationships)
    $book = $bookIssue->book;
    $book->status = 'Y';
    $book->save();

    return response()->json(['message' => 'Book issue updated successfully', 'data' => $bookIssue]);
}

    public function apidestroy($id)
    {
        $bookIssue = book_issue::findOrFail($id);

        // Delete the book issue
        $bookIssue->delete();

        return response()->json(['message' => 'Book issue deleted successfully']);
    }
}
