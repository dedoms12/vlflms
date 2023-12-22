@extends('layouts.app')
@section('content')

<div id="admin-content">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h2 class="admin-heading">All Books</h2>
            </div>
            <div class="d-grid gap-2 justify-content-md-end pb-4">
                <a class="add-new" href="{{ route('book.create') }}">Add Book</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="message"></div>
                <table class="content-table">
                        <thead>
                            <th>ID No.</th>
                            <th>Book Name</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                    <tbody>
                        @forelse ($books as $book)
                        <tr>
                            <td class="id">{{ $book->id }}</td>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->category->name }}</td>
                            <td>{{ $book->author->name }}</td>
                            <td>{{ $book->publisher->name }}</td>
                            <td>
                                @if ($book->status == 'Y')
                                <span class='badge text-primary'>Available</span>
                                @else
                                <span class='badge text-danger'>Issued</span>
                                @endif
                            </td>
                            <td class="edit">
                                <a href="{{ route('book.edit', $book) }}" class="btn btn-success">Edit</a>
                            </td>
                            <td class="delete">
                                <form action="{{ route('book.destroy', $book) }}" method="post" class="form-hidden">
                                    <button class="btn btn-danger delete-book">Delete</button>
                                    @csrf
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">No Books Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $books->links('vendor/pagination/bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection