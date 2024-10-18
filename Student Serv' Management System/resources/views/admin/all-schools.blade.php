<!-- Gaurav Nale - 1001859699
Srihari Meka - 1002030377
Varsha Nanajipuram - 1002039829 -->
@extends('layouts.layout')
@section('title', 'Admin | All Registered Schools')
@section('content')

   <div class="pagetitle">
        <h1>Schools</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">ALl Schools</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <!-- Advanced Search -->

    <section id="advanced-search-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Registered Schools</h4>
                    </div>
                    <!--Search Form -->

                    <hr class="my-0" />
                    <div class="card-datatable">
                        <div class="table-responsive p-1">
                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>School Name</th>
                                        <th>Location</th>
                                        <th>Manager </th>
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

                                                <td>{{ $item->school_name }} </td>
                                                <td>{{ $item->location_address }}</td>
                                                <td>{{ $item->schoolmanager->name }}</td>
                                                <td>{{ $item->schoolmanager->email }}</td>
                                                <td>{{ $item->schoolmanager->phone_number }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center col-actions">
                                                        <a href="{{ route('admin.editschool', $item->slug) }}"
                                                            class="btn btn-primary btn-sm mr-1" title="Edit">
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('admin.deleteschool', $item->slug) }}"
                                                            method="POST">
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
