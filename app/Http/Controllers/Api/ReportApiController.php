<?php

// app/Http/Controllers/Api/ReportApiController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\book_issue;
use Illuminate\Http\Request;

class ReportApiController extends Controller
{
    public function apiDateWise(Request $request)
    {
        $request->validate(['date' => "required|date"]);

        $date = $request->date;
        $books = book_issue::whereDate('issue_date', $date)->latest()->get();

        return response()->json($books);
    }

    public function apiMonthWise(Request $request)
    {
        $request->validate(['month' => "required|date"]);

        $month = $request->month;
        $books = book_issue::whereMonth('issue_date', date('m', strtotime($month)))
            ->whereYear('issue_date', date('Y', strtotime($month)))
            ->latest()
            ->get();

        return response()->json($books);
    }

    public function apiNotReturned()
{
    $books = book_issue::whereNull('return_date')
        ->orWhere('return_date', '>', now()) // Include books with return dates in the future
        ->latest()
        ->get();

    return response()->json($books);
}
}
