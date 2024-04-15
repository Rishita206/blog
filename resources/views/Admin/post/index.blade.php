@extends('admin.layout.master')
@section('contain')
@section('title')
<title> Post </title>
@endsection


  <div class="container pt-2">  
<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">Content</th>
        
        <th scope="col">Category Name</th>
        <th scope="col">Action</th>
        
      </tr>
    </thead>
    @foreach($post as $post)
    <tbody>
      <tr>
        <td>{{$post->user->name}}</td>
        <td> <img src="{{asset('img')}}/{{ $post->image }}"width="50px"height="50px"/></td>
        <td>{{$post->title}}</td>
        <td>{{$post->body}}</td>
        <td>{{$post->category->categoryname}}</td>
        <td>
            {{-- <a href="{{route ('post.edit')}}/{{$post->id}}"class="btn btn-sm btn-success">Edit</a> --}}
            <a href="{{route ('post.delete')}}/{{$post->id}}"class="btn btn-sm btn-danger">Delete</a>
        </td>
      </tr>
      
    </tbody>
    @endforeach
  </table>
  
  </div>


@endsection