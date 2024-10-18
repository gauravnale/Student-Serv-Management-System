<!-- Gaurav Nale - 1001859699
Srihari Meka - 1002030377
Varsha Nanajipuram - 1002039829 -->
@extends('layouts.layout')
@section('title', 'Student | My Adverts')
@section('content')
    <form id="checkout-address" class="list-view product-checkout">
        <!-- Checkout Customer Address Left starts -->
        <div class="row">
            @foreach ($adverts as $item)
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                    <div class="checkout-items">

                        <div class="card ecommerce-card">
                            <div class="row">
                                <div class="col-lg-3 col-xs-12 col-sm-12 col-md-3 py-1">

                                    <div class="item-img">
                                        <a href="{{ route('student.advert', $item->slug) }}">
                                            <img src="{{ asset('storage/adverts/' . $item->image) }}" alt="img-placeholder">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-12 col-sm-12 col-md-6 py-1">
                                    <div class="item-name">
                                        <h6 class="mb-0"><a href="" class="text-body">{{ $item->product_name }}</a>
                                        </h6>
                                        <span class="item-company">By <a href="#" class="company-name">{{ $item->cartseller->name}}</a></span>
                                        <p>{!! $item->description !!}</p>
                                    </div>


                                </div>
                                <div class="col-lg-3 col-xs-12 col-sm-12 col-md-3 py-1">
                                    <div class="item-options text-center">
                                        <div class="item-wrapper">
                                            <div class="item-cost">
                                                <h4 class="item-price">$ {{ $item->price }}</h4>
                                            </div>
                                        </div>


                                             <button type="submit"
                                                class="btn btn-danger btn-sm  mt-1 remove-wishlist waves-effect waves-float waves-light">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-x align-middle me-25">
                                                    <line x1="18" y1="6" x2="6" y2="18">
                                                    </line>
                                                    <line x1="6" y1="6" x2="18" y2="18">
                                                    </line>
                                                </svg>
                                                <span>{{ $item->cartseller->phone_number}}</span>
                                            </button>



                                    </div>
                                </div>
                            </div>



                        </div>


                    </div>

                </div>
            @endforeach
        </div>

    </form>
@endsection
