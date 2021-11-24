@extends('layouts.blog2')
@section('content')

    <!-- Main Content -->
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title-center">
                        <h2>Category {{ $category->name }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-wrap">
            <div class="container pd-0">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="row gap-y">

                            @forelse($posts as $post)
                                <div class="col-md-6">
                                    <div class="card border hover-shadow-6 mb-6 d-block">
                                        <a href="{{ route('blog.show', $post->id) }}"><img class="card-img-top"
                                                src="{{ asset("storage/$post->image") }}" alt="Card image cap"></a>
                                        <div class="p-6 text-center">
                                            <p>
                                                <a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">
                                                    {{ $post->category->name }}
                                                </a>
                                            </p>
                                            <h5 class="mb-20">
                                                <a class="text-dark" href="{{ route('blog.show', $post->id) }}">
                                                    {{ $post->title }}
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center">
                                    No results found for query <Strong>{{ request()->query('search') }}</Strong>
                                </p>
                            @endforelse

                        </div>

                        {{ $posts->appends(['search' => request()->query('search')])->links() }}
                    </div>
                    @include('partials.sidebar')
                </div>
            </div>
        </div>
    </div>

@endsection
