<!-- Gaurav Nale - 1001859699
Srihari Meka - 1002030377
Varsha Nanajipuram - 1002039829 -->
@extends('layouts.layout')
@section('title', 'School | All My Clubs ')
@section('content')

    <!-- Advanced Search -->
    <section id="advanced-search-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Registered Clubs</h4>
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
                                        <th>Students Joined </th>
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
                                                    <img src="{{ asset('storage/clubs/' . $item->image) }}"
                                                        style="height:60px;width:100px;border-radius:10px;" alt="">
                                                </td>
                                                <td>{{ $item->club_name }}</td>
                                                <td>
                                                    @php
                                                        $students = App\Models\ClubMember::where(['school_id'=>$school->id, 'club_id' => $item->id])->count();
                                                    @endphp
                                                    {{ $students }}</td>
                                                <td>
                                                    {{ str_limit(strip_tags($item->description), 150) }}
                                                    @if (strlen(strip_tags($item->description)) > 150)
                                                        ....
                                                    @endif
                                                </td>
                                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center col-actions">
                                                        <a href="{{ route('schooladmin.editclub', $item->slug) }}"
                                                            class="btn btn-primary btn-sm mr-1" title="Edit">
                                                            Edit
                                                        </a>
                                                        <a href="{{ route('schooladmin.managemembers', $item->slug) }}"
                                                            class="btn btn-warning btn-sm mx-1" title="Edit">
                                                            Students
                                                        </a>
                                                        <form action="{{ route('schooladmin.deleteclub', $item->slug) }}"
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
