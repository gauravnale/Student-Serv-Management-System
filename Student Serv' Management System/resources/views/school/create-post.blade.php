<!-- Gaurav Nale - 1001859699
Srihari Meka - 1002030377
Varsha Nanajipuram - 1002039829 -->
@extends('layouts.layout')
@section('title', 'School | Create Post')
@section('content')
    {{-- @livewire('admin.create-business') --}}
    <div class="card">
        <div class="card-header border-bottom">
            <h4 class="card-title">Create New Post</h4>
        </div>
        <div class="card-body pt-1">
            <!-- form -->
            <form class="validate-form" method="POST" action="{{ route('schooladmin.storepost') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-sm-12 mb-1">
                        <label class="form-label" for="account-retype-new-password">Post Title</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="text" class="form-control @error('post_title') is-invalid @enderror"
                                value="{{ old('post_title') }}" id="account-retype-new-password" name="post_title"
                                placeholder="" />
                        </div>
                        @error('post_title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-12 col-sm-12 mb-1">
                        <label class="form-label" for="account-retype-new-password">Post Image</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="file" class="form-control @error('post_image') is-invalid @enderror"
                                value="{{ old('post_image') }}" id="account-retype-new-password" name="post_image"
                                placeholder="" />
                        </div>
                        @error('post_image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-12 col-sm-12 mb-1">
                        <label class="form-label" for="account-old-password">Post Description</label>
                        <textarea name="post_description" id="editor" cols="30" rows="5" class="form-control">{{ old('post_description') }}</textarea>
                        @error('post_description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-12">
                        <button type="submit" class="btn btn-primary me-1 mt-1">Upload Post</button>
                        <button type="reset" class="btn btn-outline-secondary mt-1">Reset</button>
                    </div>
                </div>
            </form>
            <!--/ form -->
        </div>
    </div>
@endsection
