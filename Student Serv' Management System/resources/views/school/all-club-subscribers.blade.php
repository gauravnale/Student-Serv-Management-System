<!-- Gaurav Nale - 1001859699
Srihari Meka - 1002030377
Varsha Nanajipuram - 1002039829 -->
@extends('layouts.layout')
@section('title', 'School | All My Clubs Subscribers')
@section('content')

    <!-- Advanced Search -->
    <section id="advanced-search-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Subscribed Students to {{ ucwords($club->club_name) }}</h4>
                    </div>
                    <!--Search Form -->

                    <hr class="my-0" />
                    <div class="card-datatable">
                        <div class="table-responsive p-1">
                            <table class="table table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student Name</th>
                                        <th>Student Email</th>
                                        <th>Phone Number </th>
                                        <th>Date Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($students->count() > 0)
                                        @foreach ($students as $key => $item)
                                            <tr>
                                                <td>{{ ++$key }}</td>


                                                <td>{{ $student->clubmemberstudent->name }}</td>
                                                <td>

                                                    {{ $student->clubmemberstudent->email }}</td>
                                                <td>

                                                    {{ $student->clubmemberstudent->phone_number }}</td>

                                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center col-actions">

                                                        <form action="{{ route('schooladmin.clubunsubscribe', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" title="Delete"
                                                                class="btn btn-danger btn-sm mx-1">
                                                                Remove
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
