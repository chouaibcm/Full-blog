@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
  <a href="{{ route('posts.create') }}" class="btn btn-success">Add post</a>
</div>
<div class="card-box pb-10">
  <div class="container">
    <div class="card-box-header pb-10">
      <div class="row">
        <div class="col-md-5 col-sm-12 pd-20">
             <h3 class="box-title" style="margin-bottom: 15px"> Posts</h3>
        </div>
      </div>
    </div>
    <div class="card-box-body pb-10">
      @if ($posts->count() > 0)
      <table class="table">
        <thead>
          <th>Image</th>
          <th>Title</th>
          <th>Category</th>
          <th></th>
          <th></th>
        </thead>
        <tbody>
          @foreach ($posts as $post)
              <tr>
                <td>
                  <img src="<?php echo asset("storage/$post->image")?>"  width="60px" height="60px">
                </td>
                <td>
                  {{ $post->title }}
                </td>
                <td>
                  <a href="{{ route('categories.edit', $post->category->id) }}">
                    {{ $post->category->name }}
                  </a>
                  
                </td>
                  @if ($post->trashed())
                    <td>
                      <form action="{{ route('restore-posts',$post->id) }}" method="POST")>
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-info btn-sm">Restore</button>
                      </form>                    
                    </td>
                  @else
                    <td>
                    <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-info btn-sm">Edit</a>
                    </td>
                  @endif
                
                <td>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">
                    {{ $post->trashed() ? 'Delete': 'Trash' }}
                  </button>
                  
                </form>
                </td>
              </tr>

          @endforeach
          
        </tbody>
      </table>
      @else
          <h3 class="text-center">No Posts Yet</h3>

      @endif
    </div>
  </div>
</div>
@endsection