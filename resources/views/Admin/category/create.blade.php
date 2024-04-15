@extends('admin.layout.master')
@section('contain')
@section('title')
    <title>Create category</title>
@endsection





<div class="container pt-2">
    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="category name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="categoryname" name="categoryname" >
            @error('categoryname')
            <div class="message"> {{$message}} </div>
            @enderror
                
            
        </div>

        <div class="mb-3">
            <label for="formFileSm" class="form-label">Image</label>
            <input class="form-control form-control-sm" id="catimage" name="catimage" type="file">
            <div class="message"> {{$message}} </div>
            @enderror
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

