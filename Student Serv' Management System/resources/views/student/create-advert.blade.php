<!-- Gaurav Nale - 1001859699
Srihari Meka - 1002030377
Varsha Nanajipuram - 1002039829 -->
@extends('layouts.layout')
@section('title', 'Post Advert')
@section('content')
    {{-- @livewire('admin.create-business') --}}
    <div class="card">
        <div class="card-header border-bottom">
            <h4 class="card-title">Create New Advert</h4>
        </div>
        <div class="card-body pt-1">
            <!-- form -->
            <form class="validate-form" method="POST" action="{{ route('student.storeadvert') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-sm-4 mb-1">
                        <label class="form-label" for="account-retype-new-password">Advert Name</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="text" class="form-control @error('advert_name') is-invalid @enderror"
                                value="{{ old('advert_name') }}" id="account-retype-new-password" name="advert_name"
                                placeholder="" />
                        </div>
                        @error('advert_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 col-sm-4 mb-1">
                        <label class="form-label" for="account-retype-new-password">Advert Price</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="number" class="form-control @error('advert_price') is-invalid @enderror"
                                value="{{ old('advert_price') }}" id="account-retype-new-password" name="advert_price"
                                placeholder="" />
                        </div>
                        @error('advert_price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-12 col-sm-4 mb-1">
                        <label class="form-label" for="account-retype-new-password">Advert Image</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="file" class="form-control @error('advert_image') is-invalid @enderror"
                                value="{{ old('advert_image') }}" id="account-retype-new-password" name="advert_image"
                                placeholder="" />
                        </div>
                        @error('advert_image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-12 col-sm-12 mb-1">
                        <label class="form-label" for="account-old-password">Advert Description</label>
                            <textarea name="advert_description" id="editor" cols="30" rows="5" class="form-control">{{ old('advert_description') }}</textarea>
                        @error('advert_description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-12">
                        <button type="submit" class="btn btn-primary me-1 mt-1">Upload Advert</button>
                        <button type="reset" class="btn btn-outline-secondary mt-1">Reset</button>
                    </div>
                </div>
            </form>
            <!--/ form -->
        </div>
    </div>
@endsection
