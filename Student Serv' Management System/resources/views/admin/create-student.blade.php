<!-- Gaurav Nale - 1001859699
Srihari Meka - 1002030377
Varsha Nanajipuram - 1002039829 -->
@extends('layouts.layout')
@section('title', 'Admin | Create New School Student')
@section('content')
    {{-- @livewire('admin.create-business') --}}
    <div class="card">
        <div class="card-header border-bottom">
            <h4 class="card-title">Create an account for New Student</h4>
        </div>
        <div class="card-body pt-1">
            <!-- form -->
            <form class="validate-form" method="POST" action="{{ route('admin.storestudent') }}">
                @csrf
                <div class="row">
                    <div class="col-12 col-sm-3 mb-1">
                        <label class="form-label" for="account-retype-new-password">Student Full Names</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="text" class="form-control @error('student_full_name') is-invalid @enderror"
                                value="{{ old('student_full_name') }}" id="account-retype-new-password"
                                name="student_full_name" placeholder="" />
                        </div>
                        @error('student_full_name')
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
                        <label class="form-label" for="account-retype-new-password">Student Registration Number</label>
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
                        <label class="form-label" for="account-retype-new-password">Guardian Name</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="text" class="form-control @error('guardian_name') is-invalid @enderror"
                                value="{{ old('guardian_name') }}" id="account-retype-new-password" name="guardian_name"
                                placeholder="" />
                        </div>
                        @error('guardian_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 col-sm-3 mb-1">
                        <label class="form-label" for="account-retype-new-password">Guardian Contact</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="text" class="form-control @error('guardian_contact') is-invalid @enderror"
                                value="{{ old('guardian_contact') }}" id="account-retype-new-password" name="guardian_contact"
                                placeholder="" />
                        </div>
                        @error('guardian_contact')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 col-sm-3 mb-1">
                        <label class="form-label" for="account-retype-new-password">School Name</label>
                        <div class="input-group form-password-toggle input-group-merge">

                                <select name="school_name" id="account-retype-new-password" class="form-control">
                                    <option value="">click to select </option>
                                    @foreach ($schools as $school)
                                    <option value="{{ $school->id }}">{{ $school->school_name }}</option>
                                    @endforeach
                                </select>
                        </div>
                        @error('school_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 col-sm-3 mb-1">
                        <button type="submit" class="btn btn-primary me-1 mt-4">Onboard Student</button>

                    </div>
                </div>
            </form>
            <!--/ form -->
        </div>
    </div>
@endsection

