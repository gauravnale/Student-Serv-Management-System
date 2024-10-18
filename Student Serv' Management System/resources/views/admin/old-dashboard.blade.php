<!-- Gaurav Nale - 1001859699
Srihari Meka - 1002030377
Varsha Nanajipuram - 1002039829 -->
@extends('layouts.layout')
@section('title', 'Admin Dashboard')
@section('content')
    <!-- Advanced Search -->
    <section id="advanced-search-datatable">
        <div class="row">
            <!-- share project card -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-file-text font-large-2 mb-1">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                        <h5 class="card-title">Products</h5>
                        <h4>{{ $products->count() }}</h4>


                    </div>
                </div>
            </div>
            <!-- / share project card -->

            <!-- add new card  -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-credit-card font-large-2 mb-1">
                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2">
                            </rect>
                            <line x1="1" y1="10" x2="23" y2="10"></line>
                        </svg>
                        <h5 class="card-title">Adverts</h5>
                        <h4>{{$adverts->count() }}</h4>

                    </div>
                </div>
            </div>
            <!-- / add new card  -->


            <!-- two factor auth -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-key font-large-2 mb-1">
                            <path
                                d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4">
                            </path>
                        </svg>
                        <h5 class="card-title">Clubs</h5>
                       <h4>{{$clubs->count() }}</h4>

                    </div>
                </div>
            </div>
            <!-- / two factor auth  -->

            <!-- edit user  -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-user font-large-2 mb-1">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <h5 class="card-title">Registered Students</h5>
                        <h4>{{$students->count() }}</h4>

                    </div>
                </div>
            </div>
            <!-- / edit user  -->

            <!-- edit user  -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-user font-large-2 mb-1">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <h5 class="card-title">Uploaded Posts</h5>
                        <h4>{{$posts->count() }}</h4>


                    </div>
                </div>
            </div>
            <!-- / edit user  -->
             <!-- edit user  -->
             <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-user font-large-2 mb-1">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <h5 class="card-title">Schools Created </h5>
                        <h4>{{$schools->count() }}</h4>


                    </div>
                </div>
            </div>
            <!-- / edit user  -->
             <!-- edit user  -->
             <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-user font-large-2 mb-1">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <h5 class="card-title">Business Owners</h5>
                        <h4>{{$businesses->count() }}</h4>


                    </div>
                </div>
            </div>
            <!-- / edit user  -->
             <!-- edit user  -->
             <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-user font-large-2 mb-1">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <h5 class="card-title">Total  Users</h5>
                        <h4>{{$users->count() }}</h4>
                    </div>
                </div>
            </div>
            <!-- / edit user  -->
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Registered Business</h4>
                    </div>
                    <!--Search Form -->

                    <hr class="my-0" />
                    <div class="card-datatable">
                        <div class="table-responsive p-1">
                            <table class="table table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Shop Name</th>
                                        <th>Location</th>
                                        <th>Owner </th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Status</th>
                                        <th>Date Registered</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($businesses->count() > 0)
                                        @foreach ($businesses as $key => $item)
                                            <tr>
                                                <td>{{ ++$key }}</td>

                                                <td>{{ $item->business_name }} </td>
                                                <td>{{ $item->location_address }}</td>
                                                <td>{{ $item->businessowner->name }}</td>
                                                <td>{{ $item->businessowner->email }}</td>
                                                <td>{{ $item->businessowner->phone_number }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center col-actions">
                                                        <a href="{{ route('admin.editbusiness', $item->slug) }}"
                                                            class="btn btn-primary btn-sm mr-1" title="Edit">
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('admin.deletebusiness', $item->slug) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')<button type="submit"
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
