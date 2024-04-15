@extends('user.layout.temp')
@section('content')
    <div class="container-fluid p-5 pt-3">
        <div class="row">
            <div class="col-12">
                @foreach ($post as $post)
                    <h3 id="posttitle"> {{ $post->title }} </h3>
                    <h2> <img src="img/{{ $post->image }}"width="1250px" height="400px" /> </h2>
                    <h5 id="postbody"> {{ $post->body }}</h5>
                        <small class="mt-1 text-primary"> Created :
                            @if ($post->created_at->isToday())
                                Today
                            @elseif($post->created_at->isYesterday())
                                Yesterday
                            @else
                                {{ $post->created_at->diffForHumans() }}
                            @endif
                        </small><br>
                   

                    {{-- {{ $post->created_at->format('y-d-m') }} </small> </h5> --}}

                    <a href="{{ route('postedit') }}/{{ $post->id }}" class="btn btn-sm btn-success "><i
                            class="fa-regular fa-pen-to-square"></i></a>
                    <a href="{{ route('postdelete') }}/{{ $post->id }}" class="btn btn-sm btn-danger"><i
                            class="fa-solid fa-trash-can"></i></a>
                    <hr>
                @endforeach
            </div>
           
        </div>
    </div>
@endsection
