<!-- Gaurav Nale - 1001859699
Srihari Meka - 1002030377
Varsha Nanajipuram - 1002039829 -->
@extends('layouts.layout')

@section('title', 'Student Dashboard')
@section('content')
    <!-- Advanced Search -->
    <section id="advanced-search-datatable">
        <div class="row">
            <!-- share project card -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                      
                        <h5 class="card-title">Products</h5>
                        <h4>{{ $products->count() }}</h4>


                    </div>
                </div>
            </div>
            <!-- / share project card -->

            <!-- add new card  -->
            <div class="col-md-3">
                <div class="card h-100 overflow-hidden">
                    <div class="card-body pb-0">
                        <div class="card-title-group">
                            <div class="media-group">
                                <div class="media media-sm media-middle media-circle text-bg-primary"><em
                                        class="icon ni ni-coins"></em></div>
                                <div class="media-text">
                                    <h4>Uploaded Adverts</h4>
                                </div>
                            </div>
                            <div class="card-tools">

                            </div>
                        </div>
                        <div class="amount-wrap mt-3">
                            <div class="amount h2 mb-2">{{$adverts->count() }}</div>
                            <div class="d-flex flex-wrap align-items-center gap g-1">

                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- / add new card  -->


            <!-- two factor auth -->
            <div class="col-md-3">
                <div class="card h-100 overflow-hidden">
                    <div class="card-body pb-0">
                        <div class="card-title-group">
                            <div class="media-group">
                                <div class="media media-sm media-middle media-circle text-bg-primary"><em
                                        class="icon ni ni-coins"></em></div>
                                <div class="media-text">
                                    <h4>Uploaded Adverts</h4>
                                </div>
                            </div>

                        </div>
                        <div class="amount-wrap mt-3">
                            <div class="amount h2 mb-2">{{$adverts->count() }}</div>

                        </div>
                    </div>

                </div>
                <div class="card h-100 overflow-hidden">
                    <div class="card-body pb-0">
                        <div class="card-title-group">
                            <div class="media-group">
                                <div class="media media-sm media-middle media-circle text-bg-primary"><em
                                        class="icon ni ni-coins"></em></div>
                                <div class="media-text">
                                    <h4>Uploaded Clubs</h4>
                                </div>
                            </div>
                            <div class="card-tools">

                            </div>
                        </div>
                        <div class="amount-wrap mt-3">
                            <div class="amount h2 mb-2">{{$clubs->count() }}</div>
                            <div class="d-flex flex-wrap align-items-center gap g-1">

                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- / two factor auth  -->

            <!-- edit user  -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">

                        <h5 class="card-title"> Clubs Enrolled</h5>
                        <h4>{{ $myclubs->count() }}</h4>
                        <!-- modal trigger button -->
                    </div>
                </div>
            </div>
            <!-- / edit user  -->
        </div>
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
                                                        style="height:60px;width:100px;border-radius:10px;"
                                                        alt="">
                                                </td>
                                                <td>{{ $item->club_name }}</td>
                                                <td>
                                                    @php
                                                        $students = App\Models\ClubMember::where(['school_id' => $school->id, 'club_id' => $item->id])->count();
                                                        $enrolled = App\Models\ClubMember::where(['school_id' => $school->id, 'club_id' => $item->id, 'student_id' => Auth::user()->id])->first();
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
                                                        @if ($enrolled)
                                                            <form action="{{ route('student.exitclub', $enrolled->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')<button type="submit" title="Delete"
                                                                    class="btn btn-danger btn-sm mx-1">
                                                                    Deregister
                                                                </button>
                                                            </form>
                                                        @else
                                                            <a href="{{ route('student.enrollclub', $item->slug) }}"
                                                                class="btn btn-primary btn-sm mr-1" title="Edit">
                                                                Enroll
                                                            </a>
                                                        @endif


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
