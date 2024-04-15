@extends('user.layout.app')
@section('content')
@section('title')
    <title> Post </title>
@endsection




<div class="container-fluid" id="tablehead">

    <table class="table table-bordered"> 
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Title </th>
                <th>Content</th>
                <th>Category Name</th>
                <th>Action</th>

            </tr>
        </thead>

       
            <tbody>
                @foreach ($post as $post)
                <tr>
                    <td>{{ $post->user->name}}</td>
                    <td> <img src="{{asset ('postimg')}}/{{ $post->image }}"width="50px"height="50px" /></td>

                    <td>{{ $post->title }}
                    </td>
                    <td>{{ $post->body }}
                    </td>
                    <td>{{ $post->category->categoryname }}
                    </td>
                    <td>
                    <a href="{{ route('edit') }}/{{ $post->id }}"class="btn btn-sm btn-success">Edit</a>
                    <a href="{{ route('delete') }}/{{ $post->id }}"class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
       
    </table>
</div>
@endsection
