<!-- Gaurav Nale - 1001859699
Srihari Meka - 1002030377
Varsha Nanajipuram - 1002039829 -->
@extends('layouts.layout')
@section('title', 'Admin | Updating Business Details')
@section('content')
    {{-- @livewire('admin.create-business') --}}
    <div class="card">
        <div class="card-header border-bottom">
            <h4 class="card-title">Editing account for a business owner</h4>
        </div>
        <div class="card-body pt-1">
            <!-- form -->
            <form class="validate-form" method="POST" action="{{ route('admin.updatebusiness', $bsn->slug) }}">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-12 col-sm-3 mb-1">
                        <label class="form-label" for="account-retype-new-password">Full Names</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="text" class="form-control @error('full_name') is-invalid @enderror"
                                value="{{ $bsn->businessowner->name }}" id="account-retype-new-password" name="full_name"
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
                                value="{{ $bsn->businessowner->phone_number }}" id="account-retype-new-password"
                                name="phone_number" placeholder="" />
                        </div>
                        @error('phone_number')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 col-sm-3 mb-1">
                        <label class="form-label" for="account-retype-new-password">Email Address</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                value="{{ $bsn->businessowner->email }}" id="account-retype-new-password" name="email"
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
                                value="{{ $bsn->business_name }}" id="account-retype-new-password" name="shop_name"
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
                                value="{{ $bsn->opening_time }}" id="account-retype-new-password" name="opening_time"
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
                                value="{{ $bsn->closing_time }}" id="account-retype-new-password" name="closing_time"
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
                                value="{{ $bsn->products_selling }}" id="account-retype-new-password" name="products_selling"
                                placeholder="Clothes,Electronics, Vegetables" />
                        </div>
                        @error('products_selling')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-12">
                        <button type="submit" class="btn btn-warning me-1 mt-1">Update Business</button>
                         
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
