@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Add Book Issue</h2>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <form class="yourform" action="{{ route('book_issue.create') }}" method="post"
                        autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label>Student Name</label>
                            <select class="form-control" name="student_id" required>
                                <option value="">Select Name</option>
                                @foreach ($students as $student)
                                    <option value='{{ $student->id }}'>{{ $student->name }}</option>
                                @endforeach
                            </select>
                            @error('student_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Book Name</label>
                            <select class="form-control" name="book_id" required>
                                <option value="">Select Name</option>
                                @foreach ($books as $book)
                                    <option value='{{ $book->id }}'>{{ $book->name }}</option>
                                @endforeach
                            </select>
                            @error('book_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="d-grid gap-2 justify-content-md-end pt-3">
                        <input type="submit" name="save" class="btn btn-warning" value="   Save   ">
                        <a class="btn btn-danger" href="{{ route('book_issued') }}">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
