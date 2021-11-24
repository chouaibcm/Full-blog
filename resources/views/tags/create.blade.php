@extends('Layouts.app');

@section('content')
<div class="card card-default">
    <div class="card-header">
        {{ isset($tag) ? 'Edit Category' : 'Create Category'}}
    </div>
    <div class="card-body">
        @include('partials.errors')
       <form action="{{ isset($tag) ? Route('tags.update', $tag->id) : Route('tags.store') }}"method="POST">
            @csrf

            @if (isset($tag))
               @method("PUT")                
            @endif

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" name="name" value="{{ isset($tag) ? $tag->name : '' }}">
            </div>
            <div class="form-group">
            <button class="btn btn-success">{{isset($tag) ? 'Update tag' : 'Add tag'}}</button>
            </div>
        </form>
    </div>
</div>
@endsection