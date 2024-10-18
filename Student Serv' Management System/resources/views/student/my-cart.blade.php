<!-- Gaurav Nale - 1001859699
Srihari Meka - 1002030377
Varsha Nanajipuram - 1002039829 -->
@extends('layouts.layout')
@section('title', 'Student | My Cart ')
@section('content')

    <!-- Advanced Search -->
    <section id="advanced-search-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">My Shopping cart</h4>
                        <a href="{{ route('student.checkout') }}" class="btn btn-sm btn-primary">Check out</a>
                    </div>
                    <!--Search Form -->

                    <hr class="my-0" />
                    <div class="card-datatable">
                        <div class="table-responsive p-1">
                            <table class="table table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Image</th>
                                        <th>Product</th>
                                        <th>Price </th>
                                        <th>Quantity</th>
                                        <th>Description</th>
                                        <th>Date Selected</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($products->count() > 0)
                                        @foreach ($products as $key => $item)
                                            <tr>
                                                <td>{{ ++$key }}</td>

                                                <td>
                                                    <img src="{{ asset('storage/products/' . $item->cartproduct->image) }}"
                                                        style="height:60px;width:100px;border-radius:10px;" alt="">
                                                </td>
                                                <td>{{ $item->cartproduct->product_name }}</td>
                                                <td>{{ $item->cartproduct->price }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>
                                                    {{ str_limit(strip_tags($item->cartproduct->description), 150) }}
                                                    @if (strlen(strip_tags($item->cartproduct->description)) > 150)
                                                        ....
                                                    @endif
                                                </td>
                                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center col-actions">

                                                        <form action="{{ route('student.removecart') }}"
                                                            method="POST">
                                                            @csrf

                                                            <input type="hidden" name="product_name" value="{{ $item->cartproduct->slug }}">
                                                            <button type="submit"
                                                                onsubmit="confirm(\'Are you sure you want to delete this business?\')"
                                                                title="Delete" class="btn btn-danger btn-sm mx-1">
                                                                Delete
                                                            </button>
                                                        </form>


                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Advanced Search -->
@endsection
