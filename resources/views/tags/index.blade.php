@extends('Layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
<button class="btn btn-success " onclick="handletag2()">Add tag</button>
</div>
<div class="card-box pb-10">
  <div class="container">
    <div class="card-box-header pb-10">
      <div class="row">
        <div class="col-md-5 col-sm-12 pd-20">
             <h3 class="box-title" style="margin-bottom: 15px"> Tags</h3>
        </div>
      </div>
    </div>
     <div class="card-box-body pb-10">
         @if ($tags->count() > 0)
         <table class="table">
          <thead>
              <th>Name</th>
              <th>Posts Count</th>
              <th></th>
          </thead>
          <tbody>
              @foreach ($tags as $tag)

              <tr>
                  <td>
                      {{ $tag->name }}
                  </td>
                  <td>
                      {{ $tag->Posts->count() }}
                  </td>
                  <td>
                  <button class="btn btn-info btn-sm" onclick="updatetag({{ $tag->id }})">Edit</button>

                  <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $tag->id }})">Delete</button>
                  </td>
              </tr>
                  
              @endforeach
          </tbody>
         </table>
         <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="DeleteModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
           <form action="" method="POST" id="deletetagForm">
             @csrf               
             @method('DELETE') 
             <div class="modal-content">
                 <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Delete tag</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>
                 <div class="modal-body">
                   <p class="text-center text-bold">
                       Are your sure to delete this tag ?
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
         <!-- create and edit tags -->
         <div class="modal fade" id="createtagModal" tabindex="-1" role="dialog" aria-labelledby="createtagModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <form action="" method="POST" id="createtagForm">
              @csrf 
              <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tagModalLabel"> Create tag </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" id="name" class="form-control" name="name" >
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add tag</button>
                  </div>
                </div>
            </form>
           </div>
          </div>
         <!-- ends -->
         <div class="modal fade" id="tagModal" tabindex="-1" role="dialog" aria-labelledby="tagModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <form action="" method="POST" id="edittagForm">
              @csrf             
               @method("PUT")    
              <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tagModalLabel">Edit tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" id="name" class="form-control" name="name" >
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update tag</button>
                  </div>
                </div>
            </form>
           </div>
          </div>
         @else
         <h3 class="text-center">No Tags Yet</h3>
         @endif
     </div>
    </div>
</div>
@endsection
@section('scripts')

<script>
    function handleDelete(id){
        var form = document.getElementById('deletetagForm')  
        form.action = '/tags/' + id   
        $('#DeleteModal').modal('show')
    }
</script>
<script>
  function handletag2(){
      var form = document.getSelection('createtagForm')
      form.action = '/tags/create'
      $('#createtagModal').modal('show')
  }
</script>
<script>
  function updatetag(id){
      var form = document.getElementById('edittagForm')  
      form.action = '/tags/' + id  
      $('#tagModal').modal('show')
  }
</script>
    
@endsection