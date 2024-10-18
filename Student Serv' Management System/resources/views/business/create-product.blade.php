<!-- Gaurav Nale - 1001859699
Srihari Meka - 1002030377
Varsha Nanajipuram - 1002039829 -->
@extends('layouts.layout')
@section('title', 'Business | Create New School Student')
@section('content')
    {{-- @livewire('admin.create-business') --}}
    <div class="card">
        <div class="card-header border-bottom">
            <h4 class="card-title">Create New Product</h4>
        </div>
        <div class="card-body pt-1">
            <!-- form -->
            <form class="validate-form" method="POST" action="{{ route('businessowner.storeproduct') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-sm-3 mb-1">
                        <label class="form-label" for="account-retype-new-password">Product Name</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="text" class="form-control @error('product_name') is-invalid @enderror"
                                value="{{ old('product_name') }}" id="account-retype-new-password" name="product_name"
                                placeholder="" />
                        </div>
                        @error('product_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 col-sm-3 mb-1">
                        <label class="form-label" for="account-retype-new-password">Product Price</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="number" class="form-control @error('product_price') is-invalid @enderror"
                                value="{{ old('product_price') }}" id="account-retype-new-password" name="product_price"
                                placeholder="" />
                        </div>
                        @error('product_price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 col-sm-3 mb-1">
                        <label class="form-label" for="account-retype-new-password">Stock Available</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="number" class="form-control @error('stock_available') is-invalid @enderror"
                                value="{{ old('stock_available') }}" id="account-retype-new-password" name="stock_available"
                                placeholder="" />
                        </div>
                        @error('stock_available')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 col-sm-3 mb-1">
                        <label class="form-label" for="account-retype-new-password">Product Image</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="file" class="form-control @error('product_image') is-invalid @enderror"
                                value="{{ old('product_image') }}" id="account-retype-new-password" name="product_image"
                                placeholder="" />
                        </div>
                        @error('product_image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-12 col-sm-12 mb-1">
                        <label class="form-label" for="account-old-password">Product Description</label>
                            <textarea name="product_description" id="editor" cols="30" rows="5" class="form-control">{{ old('product_description') }}</textarea>
                        @error('product_description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-12">
                        <button type="submit" class="btn btn-primary me-1 mt-1">Upload Product</button>
                        <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button>
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
