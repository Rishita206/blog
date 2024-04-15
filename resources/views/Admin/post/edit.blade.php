@extends('admin.layout.master')
@section('contain')
@section('title')
    <title>create post</title>
@endsection

@if('success')
@session('message')
<div class="alert alert-success" role="alert">
    DAta has been updated!!!
  </div>
@endsession
@endif
<form action="{{ route('post.update') }}" method="POST">
    @csrf
    <div class="mb-3">
        <input type="hidden" name="id" id="id" value="{{ $post->id }}">
        <label for="title" class="form-label">TITLE</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">


    </div>

    <div class="mb-3">
        <label for="formFileSm" class="form-label " >Image</label>
        <input class="form-control form-control-sm"  type="file" name="image" id="image" value="{{ $post->image }}">
    </div>
   

    <div class="mb-3">
        {{-- <label for="body" class="form-label">Content</label>
      <input type="password" class="form-control" id="exampleInputPassword1"> --}}
        <label for="body" class="form-label">Content</label>
        <textarea name="body" id="body" value="{{ $post->body }}" cols="180" rows="10"></textarea>
    </div>

    

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
