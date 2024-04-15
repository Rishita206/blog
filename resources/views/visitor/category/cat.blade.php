@extends('visitor.layout.app')
@section('visit')
<div class="container-fluid pt-3 p-5">
    <div class="rows" id="catpost">
        <div class="col-12 content-justify-center">
            <h1 id="postcat"> Post in {{ $categories->categoryname }} </h1>
            <hr>

            @foreach ($categories->post as $post)
                <h2 id="posttitle">{{ $post->title }}</h2>
               <h6> <img src="{{asset('img')}}/{{ $post->image }}" width="1250px" height="400px" /></h6>
                <h3 id="postbodyc">{{ $post->body }}</h3>
                    <small class=" text-primary">
                        created by {{ $post->user->name }}:
                        @if ($post->created_at->isToday())
                        Today
                        @elseif($post->created_at->isYesterday())
                        Yesterday
                        @else
                        {{$post->created_at->diffForHumans()}} 
                        @endif </small> 
                <hr>

                <br>
                <br>
            @endforeach
        </div>
    </div>
</div>
@endsection
