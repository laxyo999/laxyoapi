
@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    <h1>Page Update here</h1>
  </div>
  <div class="card-body">
   
      <form method="post" action="{{action('PageController@update', $page->id)}}">
         <div class="form-group">
              {{@csrf_field()}}          
             <input type="hidden" name="_method" value="PATCH">
             <label for="id">Categories Id:</label>
            <input type="text" name="catg_id" value="{{$page->catg_id}}" class="form-control">
             
              <label for="id">Content:</label>
              <textarea class="form-control" name="content" rows="5">{{$page->content}}</textarea>
          </div>
          <button type="submit" class="btn btn-primary">Update Data</button>
      </form>
  </div>
</div>
@endsection