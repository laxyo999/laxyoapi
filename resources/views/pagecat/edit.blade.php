
@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    <h1>Page Category Update here</h1>
  </div>
  <div class="card-body">
   
      <form method="post" action="{{action('PageCategoryController@update', $pagec->id)}}">
         <div class="form-group">
              {{@csrf_field()}}          
             <input type="hidden" name="_method" value="PATCH">
             <label for="id">Parent:</label>
            <input type="text" name="parent" value="{{$pagec->parent}}" class="form-control">
             
              <label for="id">Title:</label>
              <textarea class="form-control" name="title" rows="5">{{$pagec->title}}</textarea>
          </div>
          <button type="submit" class="btn btn-primary">Update Data</button>
      </form>
  </div>
</div>
@endsection