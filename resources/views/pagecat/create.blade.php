
@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    <h1>Add Page Category</h1>
  </div>
  <div class="card-body">
  
      <form method="post" action="{{route('admin.PageCategory.store')}}">
        
          <div class="form-group">
             {{@csrf_field()}}
             <input type="hidden" name="user_id" id="user_id">
             <label for="parent">Parent</label>
             <input type="text" name="parent" class="form-control">
             
              <label for="id">Title:</label>
              <textarea class="form-control" name="title" rows="5"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Insert</button>
      </form>
  </div>
</div>
@endsection