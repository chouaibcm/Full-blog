@extends('layouts.app')

@section('content')
<div class="card-box pb-10">
    <div class="container">

    <div class="card-box-header pb-10">
        <div class="row">
            <div class="col-md-5 col-sm-12 pd-20">
                 <h3 class="box-title" style="margin-bottom: 15px"> My Profile</h3>
            </div>
        </div>
    </div>

    <div class="card-box-body pb-10">
        @include('partials.errors')
       <form action="{{route('users.update-profile')}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control"name="name" id="name" value="{{ $user->name }}">
            
        </div>
        <div class="form-group">
            <label for="about">About me</label>
            <textarea name="about" id="about" cols="5" rows="5" class="form-control">{{$user->about}}</textarea>
        </div>  
        <button type="submit" class="btn btn-success">Update profile</button>  
        </form>
    </div>
</div>
</div>
@endsection
