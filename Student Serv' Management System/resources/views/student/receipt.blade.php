<!-- Gaurav Nale - 1001859699
Srihari Meka - 1002030377
Varsha Nanajipuram - 1002039829 -->
@extends('layouts.layout')
@section('title', 'Student | Receipt')
@section('content')
    <div class="card invoice-preview-card">
        <div class="card-body invoice-padding pb-0">
            <!-- Header starts -->
            <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                <div>
                    <div class="logo-wrapper">

                        <h3 class="text-primary invoice-logo">Receipt</h3>
                    </div>
                    <p class="card-text mb-25">Office 149, 450 South Brand Brooklyn</p>
                    <p class="card-text mb-25">San Diego County, CA 91905, USA</p>
                    <p class="card-text mb-0">+1 (123) 456 7891</p>
                </div>
                <div class="mt-md-0 mt-2">
                    <h4 class="invoice-title">
                        Invoice
                        <span class="invoice-number">#{{ Carbon\Carbon::now()->format('His') }}</span>
                    </h4>
                    <div class="invoice-date-wrapper">
                        <p class="invoice-date-title">Date Issued:</p>
                        <p class="invoice-date">{{ Carbon\Carbon::now()->format('M d, Y') }}</p>
                    </div>

                </div>
            </div>
            <!-- Header ends -->
        </div>

        <hr class="invoice-spacing">

        <!-- Address and Contact starts -->
        <div class="card-body invoice-padding pt-0">
            <div class="row invoice-spacing">
                <div class="col-xl-8 p-0">
                    <h6 class="mb-2">Invoice To:</h6>
                    <h6 class="mb-25">{{ ucwords(Auth::user()->name) }}</h6>
                    <p class="card-text mb-25">Student Accounts</p>
                    <p class="card-text mb-25">{{ Auth::user()->phone_number }} </p>
                    <p class="card-text mb-0">{{ Auth::user()->email }}</p>
                </div>
                <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                    <h6 class="mb-2">Payment Details:</h6>
                    <table>
                        <tbody>
                            <tr>
                                <td class="pe-1">Total Paid:</td>
                                <td><span class="fw-bold">${{ $totalcost }}</span></td>
                            </tr>
                            <tr>
                                <td class="pe-1">Bank name:</td>
                                <td>American Bank</td>
                            </tr>
                            <tr>
                                <td class="pe-1">Country:</td>
                                <td>United States</td>
                            </tr>
                            <tr>
                                <td class="pe-1">IBAN:</td>
                                <td>ETD95476213874685</td>
                            </tr>
                            <tr>
                                <td class="pe-1">SWIFT code:</td>
                                <td>BR91905</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Address and Contact ends -->

        <!-- Invoice Description starts -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="py-1">Product description</th>
                        <th class="py-1">Quantity</th>
                        <th class="py-1">Price</th>
                        <th class="py-1">Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td class="py-1">
                                <p class="card-text fw-bold mb-25">{{ $item->cartproduct->product_name }}</p>
                                <p class="card-text text-nowrap">
                                    {{ $item->cartproduct->description }}
                                </p>
                            </td>
                            <td class="py-1">
                                <span class="fw-bold">1</span>
                            </td>
                            <td class="py-1">
                                <span class="fw-bold">$ {{ $item->cartproduct->price }}</span>
                            </td>
                            <td class="py-1">
                                <span class="fw-bold">$ {{ $item->cartproduct->price }}</span>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>



        <hr class="invoice-spacing">

        <!-- Invoice Note starts -->
        <div class="card-body invoice-padding pt-0">
            <div class="row">
                <div class="col-12">
                    <span class="fw-bold">Note:</span>
                    <span>It was a pleasure doing business with you. We hope you will keep us in mind for future
                        engagements!</span>
                </div>
            </div>
        </div>
        <!-- Invoice Note ends -->
    </div>
@endsection
