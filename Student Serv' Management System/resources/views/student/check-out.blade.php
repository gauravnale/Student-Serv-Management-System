<!-- Gaurav Nale - 1001859699
Srihari Meka - 1002030377
Varsha Nanajipuram - 1002039829 -->
@extends('layouts.layout')
@section('title', 'Student | Product Check out')
@section('content')
    <form id="checkout-address" class="list-view product-checkout">
        <!-- Checkout Customer Address Left starts -->
        <div class="row">
            <div class="col-lg-8 col-sm-12 col-md-8 col-xs-12">
                <div class="checkout-items">
                    @foreach ($products as $item)
                    <div class="card ecommerce-card">
                        <div class="row">
                            <div class="col-lg-3 col-xs-12 col-sm-12 col-md-3 py-1">
                                <div class="item-img">
                                    <a href="app-ecommerce-details.html">
                                        <img src="{{ asset('storage/products/'.$item->cartproduct->image) }}" alt="img-placeholder">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xs-12 col-sm-12 col-md-6 py-1">
                                <div class="item-name">
                                    <h6 class="mb-0"><a href="app-ecommerce-details.html" class="text-body">{{$item->cartproduct->product_name}}</a></h6>
                                    <span class="item-company">By <a href="#" class="company-name">{{ $item->cartseller->name}}</a></span>

                                </div>
                                <span class="text-success mb-1">In Stock</span>
                                <div class="item-quantity">
                                    <span class="quantity-title">Qty:</span>
                                    <div class="quantity-counter-wrapper">
                                        <div class="input-group bootstrap-touchspin">
                                            <span class="input-group-btn bootstrap-touchspin-injected"><button
                                                    class="btn btn-primary bootstrap-touchspin-down"
                                                    type="button">-</button></span><input type="text"
                                                class="quantity-counter form-control" value="1"><span
                                                class="input-group-btn bootstrap-touchspin-injected"><button
                                                    class="btn btn-primary bootstrap-touchspin-up"
                                                    type="button">+</button></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-3 col-xs-12 col-sm-12 col-md-3 py-1">
                                <div class="item-options text-center">
                                    <div class="item-wrapper">
                                        <div class="item-cost">
                                            <h4 class="item-price">$ {{ $item->cartproduct->price }}</h4>
                                            <p class="card-text shipping">
                                                <span class="badge rounded-pill badge-light-success">Free Shipping</span>
                                            </p>
                                        </div>
                                    </div>
                                    <form action="{{ route('student.removecart') }}"
                                    method="POST">
                                    @csrf

                                    <input type="hidden" name="product_name" value="{{ $item->cartproduct->slug }}">
                                    <button type="submit"
                                        class="btn btn-light mt-1 remove-wishlist waves-effect waves-float waves-light">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-x align-middle me-25">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                        <span>Remove</span>
                                    </button>
                                </form>


                                </div>
                            </div>
                        </div>



                    </div>
                    @endforeach

                </div>
                <div class="card">
                    <div class="card-header flex-column align-items-start">
                        <h4 class="card-title">Add New Address</h4>
                        <p class="card-text text-muted mt-25">Be sure to check "Deliver to this address" when you have
                            finished</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-2">
                                    <label class="form-label" cfor="checkout-name">Full Name:</label>
                                    <input type="text" id="checkout-name" class="form-control" name="fname"
                                        placeholder="John Doe">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-2">
                                    <label class="form-label" cfor="checkout-number">Mobile Number:</label>
                                    <input type="number" id="checkout-number" class="form-control" name="mnumber"
                                        placeholder="0123456789">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-2">
                                    <label class="form-label" cfor="checkout-apt-number">Flat, House No:</label>
                                    <input type="number" id="checkout-apt-number" class="form-control"
                                        name="apt-number" placeholder="9447 Glen Eagles Drive">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-2">
                                    <label class="form-label" cfor="checkout-landmark">Landmark e.g. near apollo
                                        hospital:</label>
                                    <input type="text" id="checkout-landmark" class="form-control" name="landmark"
                                        placeholder="Near Apollo Hospital">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-2">
                                    <label class="form-label" cfor="checkout-city">Town/City:</label>
                                    <input type="text" id="checkout-city" class="form-control" name="city"
                                        placeholder="Tokyo">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-2">
                                    <label class="form-label" cfor="checkout-pincode">Pincode:</label>
                                    <input type="number" id="checkout-pincode" class="form-control" name="pincode"
                                        placeholder="201301">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-2">
                                    <label class="form-label" cfor="checkout-state">State:</label>
                                    <input type="text" id="checkout-state" class="form-control" name="state"
                                        placeholder="California">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-2">
                                    <label class="form-label" cfor="add-type">Address Type:</label>
                                    <select class="form-select" id="add-type">
                                        <option>Home</option>
                                        <option>Work</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <a href="{{ route('student.receipt') }}"
                                    class="btn btn-primary btn-next delivery-address waves-effect waves-float waves-light">Save
                                   My Receipt</a>
                            </div>
                        </div>
                    </div>
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
                                        <div class="detail-amt">{{ $products->count() }}</div>
                                    </li>
                                    <li class="price-detail">
                                        <div class="detail-title"> Discount</div>
                                        <div class="detail-amt discount-amt text-success">00</div>
                                    </li>
                                    <li class="price-detail">
                                        <div class="detail-title">Estimated Tax</div>
                                        <div class="detail-amt">00</div>
                                    </li>
                                    <li class="price-detail">
                                        <div class="detail-title">Products Cost</div>
                                        <a href="#" class="detail-amt text-primary">{{ $totalcost }}</a>
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
                                        <div class="detail-amt fw-bolder">{{ $totalcost }}</div>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="payment-type">
                        <div class="card">
                            <div class="card-header flex-column align-items-start">
                                <h4 class="card-title">Payment options</h4>
                                <p class="card-text text-muted mt-25">Be sure to click on correct payment option</p>
                            </div>
                            <div class="card-body">
                                <h6 class="card-holder-name my-75">{{ ucwords(Auth::user()->name) }}</h6>
                                <div class="form-check">
                                    <input type="radio" id="customColorRadio1" name="paymentOptions"
                                        class="form-check-input" checked="">
                                    <label class="form-check-label" for="customColorRadio1">
                                        US Unlocked Debit Card 12XX XXXX XXXX 0000
                                    </label>
                                </div>
                                <div class="customer-cvv mt-1 row row-cols-lg-auto">
                                    <div class="col-3 d-flex align-items-center">
                                        <label class="mb-50 form-label" for="card-holder-cvv">Enter CVV:</label>
                                    </div>
                                    <div class="col-4 p-0">
                                        <input type="password" class="form-control mb-50 input-cvv" name="input-cvv"
                                            id="card-holder-cvv">
                                    </div>
                                    <div class="col-3">
                                        <button type="button"
                                            class="btn btn-primary btn-cvv mb-50 waves-effect waves-float waves-light">Continue</button>
                                    </div>
                                </div>
                                <hr class="my-2">
                                <ul class="other-payment-options list-unstyled">
                                    <li class="py-50">
                                        <div class="form-check">
                                            <input type="radio" id="customColorRadio2" name="paymentOptions"
                                                class="form-check-input">
                                            <label class="form-check-label" for="customColorRadio2"> Credit / Debit / ATM
                                                Card </label>
                                        </div>
                                    </li>
                                    <li class="py-50">
                                        <div class="form-check">
                                            <input type="radio" id="customColorRadio3" name="paymentOptions"
                                                class="form-check-input">
                                            <label class="form-check-label" for="customColorRadio3"> Net Banking </label>
                                        </div>
                                    </li>
                                    <li class="py-50">
                                        <div class="form-check">
                                            <input type="radio" id="customColorRadio4" name="paymentOptions"
                                                class="form-check-input">
                                            <label class="form-check-label" for="customColorRadio4"> EMI (Easy
                                                Installment) </label>
                                        </div>
                                    </li>
                                    <li class="py-50">
                                        <div class="form-check">
                                            <input type="radio" id="customColorRadio5" name="paymentOptions"
                                                class="form-check-input">
                                            <label class="form-check-label" for="customColorRadio5"> Cash On Delivery
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                                <hr class="my-2">
                                <div class="gift-card mb-25">
                                    <p class="card-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-plus-circle me-50 font-medium-5">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="12" y1="8" x2="12" y2="16"></line>
                                            <line x1="8" y1="12" x2="16" y2="12"></line>
                                        </svg>
                                        <span class="align-middle">Add Gift Card</span>
                                    </p>
                                </div>
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
