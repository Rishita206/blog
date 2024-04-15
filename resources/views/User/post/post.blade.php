@extends('user.layout.temp')
@section('content')
@section('title')
    <title>Home</title>
@endsection

<!-- Set your background image for this header on the line below. -->
<header class="intro-header">
    <img src="{{ asset('asset/postimg/blogintroo.jpg') }}" height="600px" width="1348px">

</header>

<!-- Main Content -->
<div class="container pt-5  "id="">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <div class="post-preview">
                <a href="{{ route('post.user') }}"></a>

                @foreach ($post as $singlepost)
                    <h4 id="postuser">Post by {{ $singlepost->user->name }} </h4>
                    <h3 id="posttitles"> {{ $singlepost->title }} </h3>
                    <h6> <img src="{{ asset('img') }}/{{ $singlepost->image }}" width="1200px" height="400px" /> </h6>
                    <h5 id="postbodys"> {{ $singlepost->body }} </h5>
                    <small class="ms-3 text-primary"> Created :
                        @if ($singlepost->created_at->isToday())
                            Today
                        @elseif($singlepost->created_at->isYesterday())
                            Yesterday
                        @else
                            {{ $singlepost->created_at->diffForHumans() }}
                        @endif
                    </small>



                    <h6>

                        <br>
                        <div class="container">
                            <div class="comment pt-2">
                                <h6 class="card-title">Leave a Comment</h6>
                                <form action="{{ route('comment.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $singlepost->id }}">
                                    <textarea name="comment" class="form-control" rows="3"></textarea>
                                    <button type="submit" class="btn btn-primary mt-1">Submit</i></button>

                                </form>

                                @foreach ($singlepost->comments as $comment)
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
                    <hr>
                @endforeach
            </div>
            <div class="row mt-4">
                <div class="row mt-4">
                    <div class="col-md-12 text-center">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                {{ $post->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
