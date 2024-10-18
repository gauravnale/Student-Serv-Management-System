<!-- Gaurav Nale - 1001859699
Srihari Meka - 1002030377
Varsha Nanajipuram - 1002039829 -->
@extends('layouts.layout')
@section('title', 'School | Create Club')
@section('content')
    {{-- @livewire('admin.create-business') --}}
    <div class="card">
        <div class="card-header border-bottom">
            <h4 class="card-title">Create New Club</h4>
        </div>
        <div class="card-body pt-1">
            <!-- form -->
            <form class="validate-form" method="POST" action="{{ route('schooladmin.storeclub') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-sm-6 mb-1">
                        <label class="form-label" for="account-retype-new-password">Club Name</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="text" class="form-control @error('club_name') is-invalid @enderror"
                                value="{{ old('club_name') }}" id="account-retype-new-password" name="club_name"
                                placeholder="" />
                        </div>
                        @error('club_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-12 col-sm-6 mb-1">
                        <label class="form-label" for="account-retype-new-password">Club Image</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="file" class="form-control @error('club_image') is-invalid @enderror"
                                value="{{ old('club_image') }}" id="account-retype-new-password" name="club_image"
                                placeholder="" />
                        </div>
                        @error('club_image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-12 col-sm-12 mb-1">
                        <label class="form-label" for="account-old-password">Group Description</label>
                        <textarea name="club_description" id="editor" cols="30" rows="5" class="form-control">{{ old('club_description') }}</textarea>
                        @error('club_description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-12">
                        <button type="submit" class="btn btn-primary me-1 mt-1">Upload Club</button>
                        <button type="reset" class="btn btn-outline-secondary mt-1">Reset</button>
                    </div>
                </div>
            </form>
            <!--/ form -->
        </div>
    </div>
@endsection
