@extends('layouts.app')

@section('content')
    <div id="admin-content">
        <div class="container mt-5">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <h2 class="admin-heading text-center">Not Returned Books</h2>
                </div>
            </div>

            @if ($books && count($books) > 0)
                <div class="row">
                    <div class="col-md-12">
                        <table class="content-table">
                            <thead>
                                <th>ID No.</th>
                                <th>Student Name</th>
                                <th>Book Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Issue Date</th>
                                <th>Return Date</th>
                                <th>Over Days</th>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td>{{ $book['id'] }}</td>
                                        <td>{{ $book['student']['name'] }}</td>
                                        <td>{{ $book['book']['name'] }}</td>
                                        <td>{{ $book['student']['phone'] }}</td>
                                        <td>{{ $book['student']['email'] }}</td>
                                        <td>{{ \Carbon\Carbon::parse($book['issue_date'])->format('d M, Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($book['return_date'])->format('d M, Y') }}</td>
                                        <td>
                                            @php
                                                $date1 = now();
                                                $date2 = \Carbon\Carbon::parse($book['return_date']);
                                                $diff = $date1->diff($date2);
                                                echo $diff->days . ' days';
                                            @endphp
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-12">
                        <p>No Record Found!</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
