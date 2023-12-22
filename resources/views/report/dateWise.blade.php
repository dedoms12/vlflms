@extends('layouts.app')

@section('content')
    <div id="admin-content">
        <div class="container mt-5">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <h2 class="admin-heading text-center">Daily Book Issue Report</h2>
                </div>
            </div>
            <div class="row"></div>
            <div class="offset-md-4 col-md-4">
                <form class="yourform mb-5" action="{{ route('reports.date_wise_generate') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}">
                        @error('date')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-grid gap-2 justify-content-md-end pt-3">
                    <input type="submit" class="btn btn-warning" name="search_date" value=" Search ">
                    <a class="btn btn-danger" href="{{ route('reports') }}">Back</a>
                    </div>
                </form>
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
