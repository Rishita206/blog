@extends('admin.layout.master')
@section('contain')
@section('title')
    <title>Update category</title>
@endsection





<div class="container pt-2">
    <form action="{{ route('category.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <input type="hidden" name="id" id="id" value={{$category->id}}>
            <label for="category name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="categoryname" name="categoryname" value="{{$category->categoryname}}">
            @error('categoryname')
            <div class="message"> {{$message}} </div>
            @enderror
                
            
        </div>

        {{-- <div class="mb-3">
            <label for="formFileSm" class="form-label">Image</label>
            <input class="form-control form-control-sm" id="catimage" name="catimage" type="file" value="{{$category->catimage}}">
            @error('catimage')
            <div class="message"> {{$message}} </div>
            @enderror
            
          </div> --}}

          <div class="mb-3">
            <label for="formFileSm" class="form-label">Current Image</label>
            @if ($category->catimage)
                
                <p>{{ basename($category->catimage) }}</p>
            @else
                <p>No image uploaded</p>
            @endif
        </div>
        
        <div class="mb-3">
            <label for="formFileSm" class="form-label">New Image</label>
            <input class="form-control form-control-sm" id="catimage" name="catimage" type="file">
            @error('catimage')
            <div class="message"> {{$message}} </div>
            @enderror
        </div>

          
        
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

