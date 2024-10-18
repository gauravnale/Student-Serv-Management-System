<!-- Gaurav Nale - 1001859699
Srihari Meka - 1002030377
Varsha Nanajipuram - 1002039829 -->
@extends('layouts.app')

@section('content')
    <div class="nk-main">
        <div class="nk-wrap align-items-center justify-content-center">
            <div class="container p-2 p-sm-4">
                <div class="row">
                    <div class="col-lg-4"> </div>
                    <div class="col-lg-4">
                        <div class="card overflow-hidden card-gutter-lg rounded-4 card-auth card-auth-mh">
                            <div class="row g-0 flex-lg-row-reverse">
                                <div class="col-12">
                                    <div class="card-body h-100 d-flex flex-column justify-content-center">
                                        <div class="nk-block-head text-center">
                                            <div class="nk-block-head-content">
                                                <h3 class="nk-block-title mb-1">Create Business  Account</h3>
                                                <p class="small">Please sign-up  your account and start the adventure.
                                                </p>
                                            </div>
                                        </div>
                                        <form action="{{ route('storebusinessaccount') }}" method="POST" autocomplete="off">
                                            @csrf
                                            @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <div>{{$error}}</div>
                                            @endforeach
                                        @endif
                                            <div class="row gy-3">
                                                <div class="col-12">
                                                    <div class="form-group"><label for="email" class="form-label">Full Names</label>
                                                        <div class="form-control-wrap"><input type="text" class="form-control"
                                                                id="email" name="full_name" value="{{ old('full_name') }}" placeholder="Enter your full name">
                                                        </div>
                                                    </div>
                                                    @error('full_name')
                                                        <small class="text-danger"><strong>{{ $message }}</strong></small>
                                                    @enderror
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group"><label for="email" class="form-label">Phone Number</label>
                                                        <div class="form-control-wrap"><input type="text" class="form-control"
                                                                id="email" name="phone_number" value="{{ old('phone_number') }}" placeholder="98765434">
                                                        </div>
                                                    </div>
                                                    @error('phone_number')
                                                        <small class="text-danger"><strong>{{ $message }}</strong></small>
                                                    @enderror
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group"><label for="email" class="form-label">Business Name </label>
                                                        <div class="form-control-wrap"><input type="text" class="form-control"
                                                            id="email" name="shop_name" value="{{ old('phone_number') }}" placeholder="john stores">
                                                    </div>
                                                    </div>
                                                    @error('shop_name')
                                                        <small class="text-danger"><strong>{{ $message }}</strong></small>
                                                    @enderror
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group"><label for="email" class="form-label">Opening Time</label>
                                                        <div class="form-control-wrap"><input type="time" class="form-control"
                                                                id="email" name="opening_time" placeholder="98765" value="{{ old('opening_time') }}">
                                                        </div>
                                                    </div>
                                                    @error('opening_time')
                                                        <small class="text-danger"><strong>{{ $message }}</strong></small>
                                                    @enderror
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group"><label for="email" class="form-label">Closing Time</label>
                                                        <div class="form-control-wrap"><input type="time" class="form-control"
                                                                id="email" name="closing_time" placeholder="98765" value="{{ old('closing_time') }}">
                                                        </div>
                                                    </div>
                                                    @error('closing_time')
                                                        <small class="text-danger"><strong>{{ $message }}</strong></small>
                                                    @enderror
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group"><label for="email" class="form-label">Email
                                                            Address</label>
                                                        <div class="form-control-wrap"><input type="text" class="form-control"
                                                                id="email" name="email" placeholder="Enter valid email address" value="{{ old('email') }}">
                                                        </div>
                                                    </div>
                                                    @error('email')
                                                        <small class="text-danger"><strong>{{ $message }}</strong></small>
                                                    @enderror
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group"><label for="email" class="form-label">Products Selling
                                                            </label>
                                                        <div class="form-control-wrap"><input type="text" class="form-control"
                                                                id="email" name="products_selling" placeholder="clothes,vegetables" value="{{ old('products_selling') }}">
                                                        </div>
                                                    </div>
                                                    @error('products_selling')
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
                                                    <div class="form-group"><label for="password"
                                                            class="form-label">Password Confirmation</label>
                                                        <div class="form-control-wrap"><input type="password" name="password_confirmation"
                                                                class="form-control" id="password" placeholder="Confirm password">
                                                        </div>
                                                    </div>
                                                    @error('password_confirmation')
                                                        <small class="text-danger"><strong>{{ $message }}</strong></small>
                                                    @enderror
                                                </div>

                                                <div class="col-12">
                                                    <div class="d-grid"><button class="btn btn-primary" type="submit">Sign Up
                                                            </button></div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="my-3 text-center">
                                            <h6 class="overline-title overline-title-sep"><span>or</span></h6>
                                        </div>

                                        <div class="text-center mt-4">
                                            <p class="small">Don't have an account? <a href="{{ route('register') }}">Register as Student
                                                    </a>
                                            </p>
                                            <p class="small">Don't have an account? <a href="{{ route('schoolaccount') }}">Register as School Admin</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4"> </div>
                </div>

            </div>
        </div>
    </div>
@endsection
