@extends('layouts.guest')

@section('content')

<div id="wrapper-admin">
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 pt-6 mt-5 d-none d-xxl-block">
                <div class="hometext">
                    <span>"A </span>
                    <span class="world-of-wisdom">World of Wisdom</span>
                    <span>, at Your Service."</span>
                    <span class="typed" data-typed-items="BS in Information Technology Student"></span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card shadow-lg border-0 rounded-lg justify-content-center">
                    <div class="card-body"> <!-- Center the content -->
                        <!-- Add the image at the top of the form and center it -->
                        <img src="{{ asset('images/homelogo.png') }}" alt="Library Image" class="homeimage" alt="...">
                        <h3 class="text-center font-weight-light mb-3 fw-bold">Login to VLFLMS</h3>
                        <form class="yourform" action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" id="username" name="username" value="{{ old('username') }}" placeholder="Username" required>
                                <label for="username">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="password" id="password" name="password" value="" placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>
                            <div class="d-grid col-6 mt-4 mb-0 mx-auto">
                                <button type="submit" class="btn btn-warning btn-block d-flex align-items-center justify-content-center">Login</button>
                            </div>
                        </form>
                        @error('username')
                        <div class='alert alert-danger mt-3'>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="card-footer text-center pb-3">
                        <div class="small">
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection