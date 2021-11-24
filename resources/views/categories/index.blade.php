@extends('Layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
<a href="{{ route('categories.create')}}" class="btn btn-success">Add Category</a>
</div>
<div class="card-box pb-10">
  <div class="container">
    <div class="card-box-header pb-10">
      <div class="row">
        <div class="col-md-5 col-sm-12 pd-20">
             <h3 class="box-title" style="margin-bottom: 15px">Categories</h3>
        </div>
      </div>
    </div>
     <div class="card-box-body pb-10">
         @if ($categories->count() > 0)
         <table class="table">
          <thead>
              <th>Name</th>
              <th>Posts Count</th>
              <th></th>
          </thead>
          <tbody>
              @foreach ($categories as $category)

              <tr>
                  <td>
                      {{ $category->name }}
                  </td>
                  <td>
                    {{ $category->Posts->count() }}
                  </td>
                  <td>
                  <a href="{{ Route('categories.edit', $category->id) }}" class="btn btn-info btn-sm">Edit</a>
                  <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $category->id }})">Delete</button>
                  </td>
              </tr>
                  
              @endforeach
          </tbody>
         </table>
         <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="DeleteModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
           <form action="" method="POST" id="deleteCategoryForm">
             @csrf               
             @method('DELETE') 
             <div class="modal-content">
                 <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>
                 <div class="modal-body">
                   <p class="text-center text-bold">
                       Are your sure to delete this category ?
                   </p>
                 </div>
                 <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Gor back</button>
                   <button type="submit" class="btn btn-danger">Yes, Delete</button>
                 </div>
               </div>
           </form>
          </div>
         </div>
         @else
         <h3 class="text-center">No Categories Yet</h3>
         @endif
     </div>
    </div>
</div>
@endsection
@section('scripts')

<script>
    function handleDelete(id){
        var form = document.getElementById('deleteCategoryForm')  
        form.action = '/categories/' + id   
        $('#DeleteModal').modal('show')
    }
</script>
    
@endsection