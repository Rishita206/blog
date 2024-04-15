@extends('user.layout.temp')
@section('content')
@section('title')
    <title> Post </title>
@endsection
<div class="container-fluid pt-3 p-5">
    <div class="rows" id="catpost">
        <div class="col-12 content-justify-center">
            <h1 id="postcat"> Post in {{ $categories->categoryname }} </h1>
            <hr>

            @foreach ($categories->post as $post)
                <h2 id="posttitle">{{ $post->title }}</h2>
                <h6> <img src="{{ asset('img') }}/{{ $post->image }}" width="1200px" height="400px" /></h6>
                <h3 id="postbodyc">{{ $post->body }}</h3>
                <small class="ms-3 text-primary">
                    created by {{ $post->user->name }}:
                    @if ($post->created_at->isToday())
                        Today
                    @elseif($post->created_at->isYesterday())
                        Yesterday
                    @else
                        {{ $post->created_at->diffForHumans() }}
                    @endif
                </small>

                <h6>

                    <br>
                    
                        <div class="comment pt-2">
                            <h6 class="card-title">Leave a Comment</h6>
                            <form action="{{ route('comment.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <textarea name="comment" class="form-control" rows="3"></textarea>
                                <button type="submit" class="btn btn-primary mt-1">Submit</i></button>

                            </form>

                            @foreach ($post->comments as $comment)
                                <div class="comment-area mt-4">
                                    <h6 class="user-name">
                                        @if ($comment->user)
                                            {{ $comment->user->name }}
                                        @endif
                                        <small class="ms-3 text-primary">Commented
                                            on:{{ $comment->created_at->format('d-m-y') }} </small>
                                    </h6>
                                    <p class="user-comment px-2">
                                        {!! $comment->comment !!}

                                        <a href="{{ route('comment.delete') }}/{{ $comment->id }}"
                                            class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                    </p>
                                </div>
                            @endforeach

                        </div>

                    </div>
                </h6>
               
            @endforeach
        </div>

    </div>

    

    
   
</div>

@endsection
