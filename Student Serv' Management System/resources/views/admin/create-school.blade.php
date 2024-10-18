<!-- Gaurav Nale - 1001859699
Srihari Meka - 1002030377
Varsha Nanajipuram - 1002039829 -->
@extends('layouts.layout')
@section('title', 'Admin | Create New School')
@section('content')

<div class="pagetitle">
    <h1>School</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">School Account</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

    <div class="card">
        <div class="card-header border-bottom">
            <h4 class="card-title">Create an account for New School</h4>
        </div>
        <div class="card-body pt-1">
            <!-- form -->
            <form class="validate-form" method="POST" action="{{ route('admin.storeschool') }}">
                @csrf
                <div class="row">
                    <div class="col-12 col-sm-3 mb-1">
                        <label class="form-label" for="account-retype-new-password">School Manager</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="text" class="form-control @error('admin_full_name') is-invalid @enderror"
                                value="{{ old('admin_full_name') }}" id="account-retype-new-password" name="admin_full_name"
                                placeholder="" />
                        </div>
                        @error('admin_full_name')
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
                        <label class="form-label" for="account-retype-new-password">School Name</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="text" class="form-control @error('school_name') is-invalid @enderror"
                                value="{{ old('school_name') }}" id="account-retype-new-password" name="school_name"
                                placeholder="" />
                        </div>
                        @error('school_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 col-sm-12 mb-1">
                        <label class="form-label" for="email">School Location Address</label>
                        <input type="text" id="address-input" name="address_address" value="{{ old('address_address') }}"
                            class="form-control map-input form-control-solid @error('address_address') is-invalid @enderror">
                        @error('address_address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <input type="hidden" name="address_latitude" id="address-latitude" value="50" />
                        <input type="hidden" name="address_longitude" id="address-longitude" value="50" />




                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary me-1 mt-1">Upload School</button>
                    </div>
                </div>
            </form>
            <!--/ form -->
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize"
        async defer></script>
    <script src="{{ asset('app-assets/js/mapInput.js') }}"></script>
@stop
