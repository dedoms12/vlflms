@extends('layouts.app')
@section('content')
<div id="admin-content">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h2 class="admin-heading">Settings</h2>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <form class="yourform" action="{{ route('settings') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label>Return Days</label>
                        <input type="number" class="form-control" name="return_days" value="{{ $data->return_days }}" required>
                        @error('return_days')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Fine (in PHP)</label>
                        <input type="number" class="form-control" name="fine" value="{{ $data->fine }}" required>
                        @error('fine')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="d-grid col-6 mt-4 mb-0 mx-auto">
                        <input type="submit" class="btn btn-warning btn-block d-flex align-items-center justify-content-center" value=" Update " required>
                        <a class="btn btn-danger mt-3" href="{{ route('dashboard') }}">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection