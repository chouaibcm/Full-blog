@extends('layouts.blog2')
@section('title')
    ZAKEM
@endsection
@section('content')

    <!-- Main Content -->
    <div class="min-height-200px">
        <div class="page-header ">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title-center">
                        <h2>Latest Blog Posts</h2>
                        <h4>Read and get updated on how we progress</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-wrap">
            <div class="container pd-0">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="blog-list pb-20">
                            <ul>
                                @forelse($posts as $post)
                                    <li>
                                        <div class="row no-gutters">
                                            <div class="col-lg-4 col-md-12 col-sm-12">
                                                <div class="blog-img">
                                                    <img src="{{ asset("storage/$post->image") }}" alt="" class="bg_img">
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-12 col-sm-12">
                                                <div class="blog-caption">
                                                    <h4><a href="{{ route('blog.show', $post->id) }}">{{ $post->title }}</a>
                                                    </h4>
                                                    <div class="blog-by">
                                                        <p class="fifty-chars">{{ $post->description }}</p>
                                                        <div class="pt-10">
                                                            <a href="#" class="btn btn-outline-primary">Read More</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                @empty
                                    <p class="text-center">
                                        No results found
                                    </p>
                                @endforelse
                                {{ $posts->appends(request()->query())->links() }}
                            </ul>

                        </div>

                    </div>
                    @include('partials.sidebar')
                </div>
            </div>
        </div>
    </div>

@endsection
