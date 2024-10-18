<!-- Gaurav Nale - 1001859699
Srihari Meka - 1002030377
Varsha Nanajipuram - 1002039829 -->
@extends('layouts.layout')
@section('title', 'School | Manage Posted Products')
@section('content')
    <div class="card">
        <!-- Product Details starts -->
        <div class="card-body">
            <div class="row my-2">
                <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('storage/products/' . $product->image) }}" class="img-fluid product-img"
                            alt="product image">
                    </div>
                </div>
                <div class="col-12 col-md-7">

                    <h4>{{ $product->product_name }}</h4>
                    <span class="card-text item-company">By <a href="#" class="company-name">{{ $product->productseller->name }}</a></span>
                    <div class="ecommerce-details-price d-flex flex-wrap mt-1">
                        <h4 class="item-price me-1">$ {{ $product->price }}</h4>
                        <ul class="unstyled-list list-inline ps-1 border-start">
                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg" width="14"
                                    height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-star filled-star">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                    </polygon>
                                </svg></li>
                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg" width="14"
                                    height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-star filled-star">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                    </polygon>
                                </svg></li>
                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg" width="14"
                                    height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-star filled-star">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                    </polygon>
                                </svg></li>
                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg" width="14"
                                    height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-star filled-star">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                    </polygon>
                                </svg></li>
                            <li class="ratings-list-item"><svg xmlns="http://www.w3.org/2000/svg" width="14"
                                    height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-star unfilled-star">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                    </polygon>
                                </svg></li>
                        </ul>
                    </div>
                    <p class="card-text">Available - <span class="text-success">In  Stock ( {{$product->quantity }} )</span></p>
                    <p class="card-text">
                        {!! $product->description !!}
                    </p>


                    <hr>
                    <div class="d-flex flex-column flex-sm-row pt-1">
                        <form action="{{ route('schooladmin.deleteproduct', $product->slug) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="btn btn-danger btn-cart me-0 me-sm-1 mb-1 mb-sm-0 waves-effect waves-float waves-light">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-shopping-cart me-50">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                                <span class="add-to-cart">Delete Product</span>
                            </button>
                        </form>

                        <a href="{{ route('schooladmin.allproducts') }}"
                            class="btn btn-outline-secondary btn-wishlist me-0 me-sm-1 mb-1 mb-sm-0 waves-effect">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-heart me-50">
                                <path
                                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                </path>
                            </svg>
                            <span>Return Back</span>
                        </a>

                    </div>
                </div>
            </div>
        </div>
        <!-- Product Details ends -->
    </div>
@endsection
