<!-- Gaurav Nale - 1001859699
Srihari Meka - 1002030377
Varsha Nanajipuram - 1002039829 -->
@extends('layouts.layout')
@section('title', 'Student | Manage Orders')
@section('content')
    <form id="checkout-address" class="list-view product-checkout">
        <!-- Checkout Customer Address Left starts -->
        <div class="row">
            <div class="col-lg-8 col-sm-12 col-md-8 col-xs-12">
                <div class="checkout-items">
                    @foreach ($orders as $item)
                        <div class="card ecommerce-card">
                            <div class="row">
                                <div class="col-lg-3 col-xs-12 col-sm-12 col-md-3 py-1">
                                    <div class="item-img">
                                        <a href="app-ecommerce-details.html">
                                            <img src="{{ asset('storage/products/' . $item->cartproduct->image) }}"
                                                alt="img-placeholder" style="height: 150px;">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-12 col-sm-12 col-md-6 py-1">
                                    <div class="item-name">
                                        <h6 class="mb-0"><a href="app-ecommerce-details.html"
                                                class="text-body">{{ $item->cartproduct->product_name }}</a></h6>
                                        <span class="item-company">By <a href="#"
                                                class="company-name">{{ $item->cartseller->name }}</a></span>

                                    </div>


                                </div>
                                <div class="col-lg-3 col-xs-12 col-sm-12 col-md-3 py-1">
                                    <div class="item-options text-center">
                                        <div class="item-wrapper">
                                            <div class="item-cost">
                                                <h4 class="item-price">$ {{ $item->cartproduct->price }}</h4>
                                                <p class="card-text shipping">

                                                </p>
                                            </div>
                                        </div>


                                            <input type="hidden" name="product_name"
                                                value="{{ $item->cartproduct->slug }}">
                                            <a href="{{ route('student.returnitem',$item->id) }}" type="submit"
                                                class="btn btn-danger mt-1 remove-wishlist waves-effect waves-float waves-light">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-x align-middle me-25">
                                                    <line x1="18" y1="6" x2="6" y2="18">
                                                    </line>
                                                    <line x1="6" y1="6" x2="18" y2="18">
                                                    </line>
                                                </svg>
                                                <span>Return Item</span>
                                            </a>



                                    </div>
                                </div>
                            </div>



                        </div>
                    @endforeach

                </div>

            </div>
            <div class="col-lg-4 col-xs-12 col-sm-12">
                <div class="customer-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="price-details">
                                <h6 class="price-title">Price Details</h6>
                                <ul class="list-unstyled">
                                    <li class="price-detail">
                                        <div class="detail-title">Total Products</div>
                                        <div class="detail-amt">$ {{ $orders->count() }}</div>
                                    </li>
                                    <li class="price-detail">
                                        <div class="detail-title"> Discount</div>
                                        <div class="detail-amt discount-amt text-success">$ 00</div>
                                    </li>
                                    <li class="price-detail">
                                        <div class="detail-title">Estimated Tax</div>
                                        <div class="detail-amt">$ 00</div>
                                    </li>
                                    <li class="price-detail">
                                        <div class="detail-title">Products Cost</div>
                                        <a href="#" class="detail-amt text-primary">$ {{ $totalcost }}</a>
                                    </li>
                                    <li class="price-detail">
                                        <div class="detail-title">Delivery Charges</div>
                                        <div class="detail-amt discount-amt text-success">Free</div>
                                    </li>
                                </ul>
                                <hr>
                                <ul class="list-unstyled">
                                    <li class="price-detail">
                                        <div class="detail-title detail-total">Total</div>
                                        <div class="detail-amt fw-bolder">$ {{ $totalcost }}</div>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Checkout Customer Address Left ends -->

        <!-- Checkout Customer Address Right starts -->

        <!-- Checkout Customer Address Right ends -->
    </form>
@endsection
