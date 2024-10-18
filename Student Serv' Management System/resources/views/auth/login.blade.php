<!-- Gaurav Nale - 1001859699
Srihari Meka - 1002030377
Varsha Nanajipuram - 1002039829 -->
@extends('layouts.app')

@section('content')
    <div class="nk-main">
        <div class="nk-wrap align-items-center justify-content-center">
            <div class="container p-2 p-sm-4">
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <div class="card overflow-hidden card-gutter-lg rounded-4 card-auth card-auth-mh">
                            <div class="row g-0 flex-lg-row-reverse">
                                <div class="col-12">
                                    <div class="card-body h-100 d-flex flex-column justify-content-center">
                                        <div class="nk-block-head text-center">
                                            <div class="nk-block-head-content">
                                                <h3 class="nk-block-title mb-1">Login to Account</h3>
                                                <p class="small">Please sign-in to your account and start the adventure.
                                                </p>
                                                @if (session('accountsuccess'))
                                                    <div class="alert alert-success" role="alert">
                                                        {{ session('accountsuccess') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <form action="{{ route('login') }}" method="POST" autocomplete="off">
                                            @csrf
                                            <div class="row gy-3">
                                                <div class="col-12">
                                                    <div class="form-group"><label for="email" class="form-label">Email
                                                            or Username</label>
                                                        <div class="form-control-wrap"><input type="text" class="form-control"
                                                                id="email" name="email" placeholder="Enter email or username">
                                                        </div>
                                                    </div>
                                                    @error('email')
                                                        <small class="text-danger"><strong>{{ $message }}</strong></small>
                                                    @enderror
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group"><label for="password"
                                                            class="form-label">Password</label>
                                                        <div class="form-control-wrap"><input type="password" name="password"
                                                                class="form-control" id="password" placeholder="Enter password">
                                                        </div>
                                                    </div>
                                                    @error('password')
                                                        <small class="text-danger"><strong>{{ $message }}</strong></small>
                                                    @enderror
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex flex-wrap justify-content-between">
                                                        <div class="form-check form-check-sm"><input class="form-check-input"
                                                                type="checkbox" value="" id="rememberMe"><label
                                                                class="form-check-label" for="rememberMe"> Remember Me </label>
                                                        </div><a href="#" class="small">Forgot Password?</a>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-grid"><button class="btn btn-primary" type="submit">Login
                                                            to account</button></div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="my-3 text-center">
                                            <h6 class="overline-title overline-title-sep"><span>or</span></h6>
                                        </div>

                                        <div class="text-center mt-4">
                                            <p class="small">Don't have an account? <a href="{{ route('schoolaccount') }}">Register as Business
                                                    Owner</a>
                                            </p>
                                            <p class="small">Don't have an account? <a href="{{ route('schoolaccount') }}">Register as School Admin</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4"></div>
                </div>

            </div>
        </div>
    </div>
@endsection
