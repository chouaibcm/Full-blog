<div class="col-md-4 col-sm-12">
    <div class="card-box mb-30">
        <h5 class="pd-20 h5 mb-0">Search</h5>
        <form class="input-group pd-20 h5 mb-0" action="" method="GET">
            <input type="text" class="form-control" name="search" placeholder="Search" value="{{ request()->search }}">
            <div class="input-group-addon">
                <span class="input-group-text"><i class="ti-search"></i></span>
            </div>
        </form>
    </div>
    <div class="card-box mb-30">
        <h5 class="pd-20 h5 mb-0">Categories</h5>
        <div class="list-group">
            @foreach ($categories as $category)
                <a href="{{ route('blog.category', $category->id) }}"
                    class="list-group-item d-flex align-items-center justify-content-between">{{ $category->name }}
                    <span class="badge badge-primary badge-pill">{{ $category->posts->count() }}</span></a>
            @endforeach
        </div>
    </div>
    <div class="card-box mb-30">
        <h5 class="pd-20 h5 mb-0">Tags</h5>
        <div class="gap-multiline-items-1 pd-20">
            @foreach ($tags as $tag)
                <a class="badge badge-secondary mb-10" href="{{ route('blog.tag', $tag->id) }}">{{ $tag->name }}</a>
            @endforeach
        </div>
    </div>
</div>
