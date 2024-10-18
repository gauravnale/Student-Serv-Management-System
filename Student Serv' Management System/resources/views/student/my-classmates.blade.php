<!-- Gaurav Nale - 1001859699
Srihari Meka - 1002030377
Varsha Nanajipuram - 1002039829 -->
@extends('layouts.layout')
@section('title', 'Student | View other Students')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title">All School Mates</h4>
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
                                <th>Email</th>
                                <th>Phone Number </th>
                                <th>Date Joined</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if ($students->count() > 0)
                                @foreach ($students as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>


                                        <td>{{ $item->studentuser->name }}</td>
                                        <td>{{ $item->studentuser->email }}</td>
                                        <td>{{ $item->studentuser->phone_number }}</td>
 
                                        <td>{{ $item->created_at->format('M d, Y') }}</td>

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
@endsection
