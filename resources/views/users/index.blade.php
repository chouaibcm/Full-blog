@extends('layouts.app')

@section('content')

<div class="card-box pb-10">
  <div class="container">
    <div class="card-box-header pb-10">
      <div class="row">
        <div class="col-md-5 col-sm-12 pd-20">
             <h3 class="box-title" style="margin-bottom: 15px"> Users</h3>
        </div>
    </div>
    </div>
    <div class="card-box-body pb-10">
      @if ($users->count() > 0)
      <table class="table">
        <thead>
          <th>Image</th>
          <th>name</th>
          <th>Email</th>
          <th></th>
          <th></th>
        </thead>
        <tbody>
          @foreach ($users as $user)
              <tr>
                <td>
                <img width="40px" height="40px" style="border-radios: 50%" src="{{Gravatar::src($user->email)}}" alt="">
                </td>
                <td>
                  {{ $user->name }}
                </td>
                <td>
                  {{ $user->email }}
                </td>
                <td>
                    @if (!$user->isAdmin())
                      <form action="{{route('users.make-admin', $user->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">Make admin</button>
                      </form>
                    @endif
                </td>
              </tr>

          @endforeach
          
        </tbody>
      </table>
      @else
          <h3 class="text-center">No Users Yet</h3>

      @endif
    </div>
  </div>
</div>
@endsection