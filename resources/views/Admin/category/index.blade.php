@extends('admin.layout.master')
@section('contain')
@section('title')
    <title> Category </title>
@endsection

<div class="container p-2">
    <a href="{{ route('category.create') }}"class="btn btn-primary">Add Category</a>
</div>
<div class="container pt-2">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Category Name</th>
                <th scope="col">category Image</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        @foreach ($categories as $category)
            <tbody>
                <tr>

                    <td>{{ $category->categoryname }}</td>
                    <td><img src="{{asset('images')}}/{{ $category->catimage }}"width="50px"height="50px" /></td>
                    <td>
                        <a
                            href="{{ route('category.edit') }}/{{ $category->id }}"class="btn btn-sm btn-success">Edit</a>
                        <a href="{{ route('category.delete') }}/{{ $category->id }}"
                            class="btn btn-sm btn-danger">Delete</a>
                    </td>

                </tr>


            </tbody>
        @endforeach

    </table>
</div>

@endsection
