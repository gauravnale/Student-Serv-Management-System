<!-- Gaurav Nale - 1001859699
Srihari Meka - 1002030377
Varsha Nanajipuram - 1002039829 -->
@extends('layouts.layout')
@section('title', 'Student | Product details')
@section('content')
    <div class="card-content-types">
        <h5 class="mt-3">Product Details</h5>
        <div class="row">

            <div class="col-md-12 col-lg-12">
                <h6 class="my-2 text-muted">{{ $item->product_name }}</h6>
                <div class="card mb-4">
                    <a href="{{ route('student.productdetails', $item->slug) }}"><img class="card-img-top"
                            src="{{ asset('storage/products/' . $item->image) }}" alt="Product Details"></a>
                    <div class="card-body">
                        <p class="card-text" style="min-height: 20vh;">
                            {!! $item->description !!}

                        </p>
                        <p class="card-text">
                            <span class="badge badge-light-success">Available Stock - {{ $item->quantity }}</span>
                        </p>
                        @php
                            $checkcart = App\Models\Cart::where(['student_id' => Auth::user()->id, 'status' => 'pending', 'product_id' => $item->id])->first();
                        @endphp
                        @if ($checkcart)
                            <form action="{{ route('student.removecart') }}" method="POST">
                                @csrf
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                @endif
                                <input type="hidden" name="product_name" value="{{ $item->slug }}">
                                <button type="submit" class="btn btn-block btn-danger">Remove Product</button>
                            </form>
                        @else
                            <form action="{{ route('student.addtocart') }}" method="POST">
                                @csrf
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                @endif
                                <input type="hidden" name="product_name" value="{{ $item->slug }}">
                                <button type="submit" class="btn btn-block btn-primary">Add To Cart</button>
                            </form>
                        @endif


                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
