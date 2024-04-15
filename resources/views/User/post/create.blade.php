@extends('user.layout.temp')
@section('content')
@section('title')
    <title>create post</title>
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

        padding: 2px 50px;
        cursor: pointer;
        background-color: white;
        border-radius: 5px;

    }
</style>



<div class="container-fluid p-2 pt-3" id="create">
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <select class="form-select" name="catId">
            @foreach ($category as $item)
                <option value="{{ $item->id }}">{{ $item->categoryname }}</option>
            @endforeach
        </select>

        <div class="mb-3 p-2">
            <label for="title" class="form-label">TITLE</label>
            <input type="text" class="form-control" id="title" name="title">
            @error('title')
                <div class="message"> {{ $message }} </div>
            @enderror

        </div>

        {{-- <div class="mb-3">
            <label for="formFileSm" class="form-label ">Image</label>
            <input class="form-control form-control-sm" type="file" name="image" id="image" accept="image/*"
                onchange="readURL(this,'#image1')"/>
            <label for="img">Image pic</label>
            <img src="{{ url('img/default.jpg') }}" alt="image" id="image1" height="50px" width="50px">
            @error('image')
                <div class="message"> {{ $message }} </div>
            @enderror
        </div> --}}

        <div class="mb-3">
            <label for="formFileSm" class="form-label">Image</label>
            <input id="image-upload" class="input-file" type="file" name="image" id="image" accept="image/*"
                onchange="previewImage(event)">
            <!-- Move the label below the file input -->
            <label for="image-upload" class="custom-file-upload">
                <span id="file-name">Choose File</span>
            </label>
            <img src="{{ asset('img/default.jpg') }}" alt="image" id="image-preview" class="image-preview">
            @error('image')
                <div class="message">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Content</label>

            <textarea name="body" id="body" cols="178" rows="10"></textarea>
            @error('body')
                <div class="message"> {{ $message }} </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection


<script>
    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function() {
            var imgElement = document.getElementById('image-preview');
            imgElement.src = reader.result;
            // Display the filename inside the browse box
            var fileNameSpan = document.getElementById('file-name');
            fileNameSpan.textContent = input.files[0] ? input.files[0].name : 'Choose File';
        }
        reader.readAsDataURL(input.files[0]);
    }
</script>
