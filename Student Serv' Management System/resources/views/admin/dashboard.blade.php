<!-- Gaurav Nale - 1001859699
Srihari Meka - 1002030377
Varsha Nanajipuram - 1002039829 -->
@extends('layouts.layout')
@section('title', 'Admin Dashboard')
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>

                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Students <span>| Today</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $students->count() }}</h6>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>

                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Schools <span>| Total</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $businesses->count() }}</h6>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card customers-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>

                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Business Accounts <span>| Total</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $schools->count() }}</h6>


                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                    <!-- Reports -->
                    <div class="col-12">
                        <div class="card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>

                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Total Products <span></span></h5>

                                <!-- Line Chart -->
                                {{-- <div id="reportsChart"></div> --}}
                                @if ($products->count() > 0)
                                    <div id="barchart_material" style="width: 100%; height: 300px;"></div>

                                    <script type="text/javascript">
                                        google.charts.load('current', {
                                            'packages': ['bar']
                                        });
                                        google.charts.setOnLoadCallback(drawChart);

                                        function drawChart() {
                                            var data = google.visualization.arrayToDataTable([
                                                ['Order Name', 'Price'],

                                                @php
                                                    foreach ($products as $order) {
                                                        echo "['" . $order->product_name . "', '" . $order->price . "'],";
                                                    }
                                                @endphp
                                            ]);

                                            var options = {
                                                chart: {
                                                    title: 'Products Data Report',
                                                    subtitle: 'Price, and Product Name: @php echo $products[0]->created_at @endphp',
                                                },
                                                bars: 'vertical'
                                            };
                                            var chart = new google.charts.Bar(document.getElementById('barchart_material'));
                                            chart.draw(data, google.charts.Bar.convertOptions(options));
                                        }
                                    </script>
                                @endif


                            </div>

                        </div>
                    </div><!-- End Reports -->

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>

                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Recent 5 Products <span></span></h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Seller</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Date Uploaded</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fiveproducts as $sales)
                                            <tr>
                                                <th scope="row">{{ $sales->id }}</th>
                                                <td>{{ $sales->product_name }}</td>
                                                <td>{{ $sales->productseller->name }}</td>
                                                <td>{{ $sales->price }}</td>
                                                <td>{{ $sales->quantity }} </td>
                                                <td>{{ $sales->created_at->format('M d, Y') }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Recent Sales -->


                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

                <!-- Recent Activity -->
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>

                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Recent Created Accounts <span> </span></h5>

                        <div class="activity">

                            @foreach ($fiveusers as $newuser)
                                <div class="activity-item d-flex">
                                    <div class="activite-label">{{ $newuser->created_at->diffForHumans() }}</div>
                                    <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                    <div class="activity-content">
                                        {{ ucwords($newuser->name) }} created an account as <a href="#"
                                            class="fw-bold text-dark">
                                            @if ($newuser->hasRole('admin'))
                                                {{ $newuser->name }}
                                            @elseif($newuser->hasRole('businessowner'))
                                                Business Manager
                                            @elseif($newuser->hasRole('schooladmin'))
                                                School Manager
                                            @else
                                                Student
                                            @endif
                                        </a>
                                    </div>
                                </div><!-- End activity item-->
                            @endforeach



                        </div>

                    </div>
                </div><!-- End Recent Activity -->



                <div class="card info-card sales-card">

                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>

                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Total Adverts <span>| Uploaded</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $adverts->count() }}</h6>


                            </div>
                        </div>
                    </div>

                </div>
                <div class="card info-card sales-card">

                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>

                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Total Clubs <span>| Uploaded</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $clubs->count() }}</h6>


                            </div>
                        </div>
                    </div>

                </div>
                <div class="card info-card sales-card">

                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>

                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Total Posts <span>| Uploaded</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $posts->count() }}</h6>


                            </div>
                        </div>
                    </div>

                </div>
                <div class="card info-card sales-card">

                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>

                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Total Complains <span>| Raised</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $complains->count() }}</h6>


                            </div>
                        </div>
                    </div>

                </div>

            </div><!-- End Right side columns -->

        </div>
    </section>
@endsection
