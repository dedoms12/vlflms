@extends('layouts.app')
@section('content')
<div id="admin-content">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h2 class="admin-heading">Add Publisher</h2>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <form class="yourform" action="{{ route('publisher.store') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label>Publisher Name</label>
                        <input type="text" class="form-control @error('name') isinvalid @enderror" placeholder="Publisher Name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-grid gap-2 justify-content-md-end pt-3">
                    <input type="submit" name="save" class="btn btn-warning" value="   Save   " required>
                    <a class="btn btn-danger" href="{{ route('publishers') }}">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
