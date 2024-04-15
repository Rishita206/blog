@extends('user.layout.temp')
@section('content') 
@section('title')
<title>update post</title>
@endsection

<style>
  /* Style for hiding the input[type=file] */
  .input-file {
      display: none;
  }

  /* Style for the image preview */
  .image-preview {
      width: 100px;
      height: 100px;
      object-fit: cover;
  }

  /* Style for the label/button */
  .custom-file-upload {
      border: 1px solid #ccc;
      display: inline-block;
      
      padding: 2px 300px;
      cursor: pointer;
      background-color: white;
      border-radius: 5px;
     
  }

  


  
</style>
 

<div class="container-fluid p-2">

<form action="{{route('update')}}" method="POST" enctype="multipart/form-data">
    @csrf 
    {{-- <select class="form-select" name="catId" >
      @foreach ($category as $item)
    
      <option value="{{$item->id}}">{{$item->categoryname}}</option> 
      @endforeach
      
      
    </select> --}}
    <div class="mb-3">
        <input type="hidden" id="id" name="id" value="{{$post->id}}">
      <label for="title" class="form-label">TITLE</label>
      <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
      @error('title')
                <div class=""> {{ $message }} </div>
            @enderror
    </div>

    {{-- <div class="mb-3">
      <label for="formFileSm" class="form-label">Image</label>
      <input id="image-upload" class="input-file" type="file" name="image" id="image" accept="image/*" onchange="previewImage(event)">
      <!-- Use a label to style the browse button -->
      <label for="image-upload" class="custom-file-upload">
          <span id="file-name">Choose File</span>
      </label>
      <img src="{{ old('img', asset($post->image ?? 'img/default.jpg')) }}" alt="image" id="image-preview" class="image-preview"> 
      @error('image')
          <div class="message">{{ $message }}</div>
      @enderror
  </div> --}}

  

  <div class="mb-3">
    <label for="formFileSm" class="form-label">Image</label>
    <input id="image-upload" class="input-file" type="file" name="image" id="image" accept="image/*" onchange="previewImage(event)">
    <!-- Use a label to style the browse button -->
    <label for="image-upload" class="custom-file-upload">
        <span id="file-name">Choose File</span>
    </label>
    @error('image')
        <div class="message">{{ $message }}</div>
    @enderror
    @php
        $imageValue = old('image', $post->image ?? null);
    @endphp
    {{-- <img src="{{ asset($imageValue ? $imageValue : 'img/default.jpg') }}" alt="image" id="image-preview" class="image-preview"> --}}
    @if($post->image)
    <img src="{{ asset('img') }}/{{$post->image}}" alt="image" id="image-preview" class="image-preview">
    @else
    <img src="{{ asset('img/default.jpg')}}" alt="image" id="image-preview" class="image-preview">
    @endif
</div>

  

  
    
    <div class="mb-3">
      {{-- <label for="body" class="form-label">Content</label>
      <input type="password" class="form-control" id="exampleInputPassword1"> --}}
      <label for="body" class="form-label">Content</label>
      <textarea name="body" id="body" cols="180" rows="10" >{{ old('body', $post->body) }}</textarea>
      @error('body')
      <div class=""> {{ $message }} </div>
  @enderror
    </div>
    
    <button type="submit" class="btn btn-primary">Update</button>
  </form>


@endsection
</div>

<script>
  function previewImage(event) {
      var input = event.target;
      var reader = new FileReader();
      reader.onload = function () {
          var imgElement = document.getElementById('image-preview');
          imgElement.src = reader.result;
          // Display the filename inside the browse box
          var fileNameSpan = document.getElementById('file-name');
          fileNameSpan.textContent = input.files[0] ? input.files[0].name : 'Choose File';
      }
      reader.readAsDataURL(input.files[0]);
  }
</script>