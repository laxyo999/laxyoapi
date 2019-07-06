
@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    <h1>Add Pages</h1>
  </div>
  <div class="card-body">
  
      <form method="post" action="{{route('admin.Page.store')}}">
        
          <div class="form-group">
             {{@csrf_field()}}
             <input type="hidden" name="user_id" id="user_id">
             <label for="id">Categories Id:</label>
            
             <select name="catg_id" class="form-control">
             @foreach($page as $select)
                <option value="{{$select->id}}">{{$select->id}}</option>
             @endforeach
             </select>
             
              <label for="id">Content:</label>
              <textarea class="form-control" name="content" rows="5"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Insert</button>
      </form>
  </div>
</div>
@endsection