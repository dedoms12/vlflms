@extends('layouts.app')
@section('content')
<div id="admin-content">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h2 class="admin-heading">Update Publisher</h2>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <form class="yourform" action="{{ route('publisher.update', $publisher->id) }}" method="post"
                    autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label>Publisher Name</label>
                        <input type="text" class="form-control @error('name') isinvalid @enderror" name="name"
                            value="{{ $publisher->name }}" required>
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-grid gap-2 justify-content-md-end pt-3">
                    <input type="submit" name="submit" class="btn btn-warning" value=" Update " required>
                    <a class="btn btn-danger" href="{{ route('publishers') }}">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
