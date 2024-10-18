<!-- Gaurav Nale - 1001859699
Srihari Meka - 1002030377
Varsha Nanajipuram - 1002039829 -->
@extends('layouts.layout')
@section('title', 'School | Manage Business Products ')
@section('content')

    <!-- Advanced Search -->
    <section id="advanced-search-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Uploaded Products</h4>
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
                                        <th>Stock Available</th>
                                        <th>Description</th>
                                        <th>Date Uploaded</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($products->count() > 0)
                                        @foreach ($products as $key => $item)
                                            <tr>
                                                <td>{{ ++$key }}</td>

                                                <td>
                                                    <img src="{{ asset('storage/products/'.$item->image) }}" style="height:60px;width:100px;border-radius:10px;" alt="">
                                                  </td>
                                                <td>{{ $item->product_name }}</td>
                                                <td>{{ $item->price}}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>
                                                    {{ str_limit(strip_tags($item->description), 150) }}
                                                    @if (strlen(strip_tags($item->description)) > 150)
                                                    ....
                                                  @endif
                                                  <br>
                                                  <small class="text-success">Seller - {{ $item->productseller->name }} ( {{ $item->productseller->phone_number }} )</small>
                                                   </td>
                                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center col-actions">
                                                        <a href="{{ route('schooladmin.viewproduct', $item->slug) }}"
                                                            class="btn btn-primary btn-sm mr-1" title="Edit">
                                                            View
                                                        </a>
                                                        <form action="{{ route('schooladmin.deleteproduct', $item->slug) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')<button type="submit"

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
