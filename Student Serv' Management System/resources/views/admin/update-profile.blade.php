<!-- Gaurav Nale - 1001859699
Srihari Meka - 1002030377
Varsha Nanajipuram - 1002039829 -->
@extends('layouts.layout')
@section('title', 'Admin Account Settings')
@section('content')
<div class="card">
    <div class="card-header border-bottom">
        <h4 class="card-title">Change Password</h4>
    </div>
    <div class="card-body pt-1">
        <!-- form -->
        <form class="validate-form" method="POST" action="{{ route('admin.updatepassword') }}">
            @csrf
            <div class="row">
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="account-old-password">Current password</label>
                    <div class="input-group form-password-toggle input-group-merge">
                        <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                            id="account-old-password" name="current_password" placeholder="Enter current password"
                            data-msg="Please current password" />
                        <div class="input-group-text cursor-pointer">
                            <i data-feather="eye"></i>
                        </div>

                    </div>
                    @error('current_password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="account-new-password">New Password</label>
                    <div class="input-group form-password-toggle input-group-merge">
                        <input type="password" id="account-new-password" name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Enter new password" />
                        <div class="input-group-text cursor-pointer">
                            <i data-feather="eye"></i>
                        </div>
                    </div>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="account-retype-new-password">Retype New Password</label>
                    <div class="input-group form-password-toggle input-group-merge">
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="account-retype-new-password" name="password_confirmation"
                            placeholder="Confirm your new password" />
                        <div class="input-group-text cursor-pointer"><i data-feather="eye"></i></div>
                    </div>
                    @error('password_confirmation')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary me-1 mt-1">Save changes</button>
                    <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button>
                </div>
            </div>
        </form>
        <!--/ form -->
    </div>
</div>
<div class="card">
    <div class="card-header border-bottom">
        <h4 class="card-title">Change Account Email Address</h4>
    </div>
    <div class="card-body pt-1">
        <!-- form -->
        <form class="validate-form" method="POST" action="{{ route('admin.saveaccountemail') }}">
            @csrf
            <div class="row">
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="account-old-password">Current Email</label>
                    <div class="input-group form-password-toggle input-group-merge">
                        <input type="email" class="form-control @error('current_email') is-invalid @enderror"
                            id="account-old-password" name="current_email" placeholder="Enter current email"
                            data-msg="Please current Email Address" />
                    </div>
                    @error('current_email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="account-new-password">New Email</label>
                    <div class="input-group form-password-toggle input-group-merge">
                        <input type="email" id="account-new-password" name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="Enter New Email Address" />

                    </div>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="account-retype-new-password">Retype New Email Address</label>
                    <div class="input-group form-password-toggle input-group-merge">
                        <input type="email" class="form-control @error('confirm_email') is-invalid @enderror"
                            id="account-retype-new-password" name="confirm_email"
                            placeholder="Confirm your new email address" />
                    </div>
                    @error('confirm_email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary me-1 mt-1">Save changes</button>
                    <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button>
                </div>
            </div>
        </form>
        <!--/ form -->
    </div>
</div>
@endsection
