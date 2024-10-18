<!-- Gaurav Nale - 1001859699
Srihari Meka - 1002030377
Varsha Nanajipuram - 1002039829 -->
@extends('layouts.layout')
@section('title', 'Student | My enrolled CLubs')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">My School Clubs</h4>
                </div>
                <!--Search Form -->

                <hr class="my-0" />
                <div class="card-datatable">
                    <div class="table-responsive p-1">
                        <table class="table table-bordered" id="example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Club Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Date Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($clubs->count() > 0)
                                    @foreach ($clubs as $key => $item)
                                        <tr>
                                            <td>{{ ++$key }}</td>

                                            <td>
                                                <img src="{{ asset('storage/clubs/' . $item->clubmemberclub->image) }}"
                                                    style="height:60px;width:100px;border-radius:10px;" alt="">
                                            </td>
                                            <td>{{ $item->clubmemberclub->club_name }}</td>

                                            <td>
                                                {{ str_limit(strip_tags($item->clubmemberclub->description), 150) }}
                                                @if (strlen(strip_tags($item->clubmemberclub->description)) > 150)
                                                    ....
                                                @endif
                                            </td>
                                            <td>{{ $item->created_at->format('M d, Y') }}</td>
                                            <td>

                                                <div class="d-flex align-items-center col-actions">

                                                    <form action="{{ route('student.exitclub', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')<button type="submit" title="Delete"
                                                            class="btn btn-danger btn-sm mx-1">
                                                            Deregister
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
@endsection
