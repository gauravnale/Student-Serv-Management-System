<!-- Gaurav Nale - 1001859699
Srihari Meka - 1002030377
Varsha Nanajipuram - 1002039829 -->
@extends('layouts.layout')
@section('title', 'School | All Our Posts')
@section('content')
<div class="row">
    <div class="col-12 py-2">
        <a href="{{ route('schooladmin.createpost') }}" class="btn btn-primary">create New Post</a>
    </div>
</div>
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4 col-12">
                <div class="card">
                    <a href="page-blog-detail.html">
                        <img class="card-img-top img-fluid" src="{{ asset('storage/posts/'.$post->image) }}" alt=" Post pic">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ route('schooladmin.editpost', $post->slug) }}" class="blog-title-truncate text-body-heading">{{ $post->post_title }}</a>
                        </h4>
                        <div class="d-flex">
                            <div class="avatar me-50">

                            </div>
                            <div class="author-info">
                                <small class="text-muted me-25">By</small>
                                <small><a href="#" class="text-body">School Admin</a></small>
                                <span class="text-muted ms-50 me-25">|</span>
                                <small class="text-muted">{{ $post->created_at->format('M d, Y') }}</small>
                            </div>
                        </div>
                        <div class="my-1 py-25">

                        </div>
                        <p class="card-text blog-content-truncate">
                            {!! $post->description !!}
                        </p>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <form action="{{ route('schooladmin.deletepost', $post->slug) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')<button type="submit"
                                    title="Delete" class="btn btn-danger btn-sm mx-1">
                                    Delete
                                </button>
                            </form>
                            <a href="{{ route('schooladmin.editpost', $post->slug) }}" class="fw-bold">Edit Post</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
