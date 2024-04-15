@extends('admin.layout.master')
@section('contain')
@section('title')
<title>create post</title>
@endsection






<div class="container pt-3">
<form action="{{route ('post.store')}}" method="POST">
    @csrf 
    <select class="form-select" name="catId" >
      @foreach ($category as $item)
    
      <option value="{{$item->id}}">{{$item->categoryname}}</option> 
      @endforeach
      
      
    </select>
    <div class="mb-3">
      <label for="title" class="form-label">TITLE</label>
      <input type="text" class="form-control" id="title" name="title" >
      @error('title')
      <div class="message"> {{$message}} </div>
          
      @enderror
    </div>

    
    <div class="mb-3">
      {{-- <label for="body" class="form-label">Content</label>
      <input type="password" class="form-control" id="exampleInputPassword1"> --}}
      <label for="body" class="form-label">Content</label>
      <textarea name="body" id="body" cols="180" rows="10"></textarea>
      @error('body')
      <div class="message"> {{$message}} </div>
      @enderror
    </div>

   

    
      
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

</div>
@endsection