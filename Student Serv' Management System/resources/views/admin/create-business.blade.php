<!-- Gaurav Nale - 1001859699
Srihari Meka - 1002030377
Varsha Nanajipuram - 1002039829 -->
@extends('layouts.layout')
@section('title', 'Admin | Create New Business')
@section('content')
<div class="pagetitle">
    <h1>Business</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">Create Business Account</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

 
    <div class="card">
        <div class="card-header border-bottom">
            <h4 class="card-title">Create an account for a business owner</h4>
        </div>
        <div class="card-body pt-1">
            <!-- form -->
            <form class="validate-form" method="POST" action="{{ route('admin.storebusiness') }}">
                @csrf

                <div class="row">
                    <div class="col-12 col-sm-3 mb-1">
                        <label class="form-label" for="account-retype-new-password">Full Names</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="text" class="form-control @error('full_name') is-invalid @enderror"
                                value="{{ old('full_name') }}" id="account-retype-new-password" name="full_name"
                                placeholder="" />
                        </div>
                        @error('full_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 col-sm-3 mb-1">
                        <label class="form-label" for="account-retype-new-password">Phone Number</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="number" class="form-control @error('phone_number') is-invalid @enderror"
                                value="{{ old('phone_number') }}" id="account-retype-new-password" name="phone_number"
                                placeholder="" />
                        </div>
                        @error('phone_number')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 col-sm-3 mb-1">
                        <label class="form-label" for="account-retype-new-password">Email Address</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" id="account-retype-new-password" name="email"
                                placeholder="" />
                        </div>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 col-sm-3 mb-1">
                        <label class="form-label" for="account-retype-new-password">Shop Name</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="text" class="form-control @error('shop_name') is-invalid @enderror"
                                value="{{ old('shop_name') }}" id="account-retype-new-password" name="shop_name"
                                placeholder="" />
                        </div>
                        @error('shop_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 col-sm-3 mb-1">
                        <label class="form-label" for="account-retype-new-password">Opening Time</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="time" class="form-control @error('opening_time') is-invalid @enderror"
                                value="{{ old('opening_time') }}" id="account-retype-new-password" name="opening_time"
                                placeholder="" />
                        </div>
                        @error('opening_time')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 col-sm-3 mb-1">
                        <label class="form-label" for="account-retype-new-password">Closing Time</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="time" class="form-control @error('closing_time') is-invalid @enderror"
                                value="{{ old('closing_time') }}" id="account-retype-new-password" name="closing_time"
                                placeholder="" />
                        </div>
                        @error('closing_time')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 col-sm-6 mb-1">
                        <label class="form-label" for="account-retype-new-password">Products Selling</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="text" class="form-control @error('products_selling') is-invalid @enderror"
                                value="{{ old('products_selling') }}" id="account-retype-new-password" name="products_selling"
                                placeholder="Clothes,Electronics, Vegetables" />
                        </div>
                        @error('products_selling')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-12">
                        <button type="submit" class="btn btn-primary me-1 mt-1">Register Business</button>
                    </div>
                </div>
            </form>
            <!--/ form -->
        </div>
    </div>
@endsection
@section('scripts')
