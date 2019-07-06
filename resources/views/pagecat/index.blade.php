@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
  .navbar{
    margin-bottom: 50px;
  }
</style>
<nav class="navbar navbar-default">
</nav>
<div class="row">
  <div class="col-md-12">
    <div style="float:right;">
     <a href="{{route('admin.PageCategory.create')}}" class="btn btn-success">New </a>
     </div>
  </div>
</div>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped table-bordered bg-light">
    <thead class="bg-dark" style="color: White">
        <tr>
          <td>ID</td>
          <td>Parent</td>
          <td>Title</td>
          <td>Action</td>
          
        </tr>
    </thead>
    <tbody>
        @foreach($pagec as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->parent}}</td>
            <td>{{$post->title}}</td>
            <td><a href="/admin/PageCategory/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
                <a href="#" class="btn btn-danger" onclick="event.preventDefault(); if(confirm('Are you sure?')){
                  document.getElementById('delete-form-{{ $post->id }}').submit();}">Delete</a>

                  <form id="delete-form-{{ $post->id }}" action="{{ route('admin.PageCategory.destroy', $post->id) }}" method="POST" style="display: none;">
                      @csrf
                      @method('delete')
                  </form>
              </td>

        </tr>
        @endforeach
    </tbody>
  </table>
<div>
  

@endsection