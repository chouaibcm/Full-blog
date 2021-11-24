@extends('Layouts.app');

@section('content')
<div class="card-box pb-10">
    <div class="card-box-header pb-10">
        <div class="row">
            <div class="col-md-5 col-sm-12 pd-20">
                 <h3 class="box-title" style="margin-bottom: 15px">{{ isset($category) ? 'Edit Category' : 'Create Category'}}</h3>
            </div>
          </div>
    </div>
    <div class="card-box-body pb-10">
        @include('partials.errors')
       <form action="{{ isset($category) ? Route('categories.update', $category->id) : Route('categories.store') }}"method="POST">
            @csrf

            @if (isset($category))
               @method("PUT")                
            @endif

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" name="name" value="{{ isset($category) ? $category->name : '' }}">
            </div>
            <div class="form-group">
            <button class="btn btn-success">{{isset($category) ? 'Update category' : 'Add category'}}</button>
            </div>
        </form>
    </div>
</div>
@endsection