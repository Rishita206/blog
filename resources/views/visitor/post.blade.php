@extends('visitor.layout.app')
@section('visit')
    <div class="post">
        <h1 class="p">BLOGS</h1>
        <div class="col-12">

            @php
                $categories = App\Models\Category::all(); // Assuming you have a Category model
            @endphp
            <div class=" d-flex gap-2 justify-content-center pt-4  ">
                @foreach ($categories as $category)
                    <a class="" href="{{ route('post.view') }}/{{ $category->id }}" target="">
                        <button class="btn btn-outline-warning px-5  "id="catbtn">{{ $category->categoryname }}</button>
                @endforeach
                </a>
            </div>



            <div class="container-fluid pt-5 p-5">
                <div class="row "id="postpage">

                    @foreach ($post as $singlepost)
                        <h3 id="posttitle"> {{ $singlepost->title }} </h3>
                        <h6> <img src="{{ asset('img') }}/{{ $singlepost->image }}" width="1200px" height="400px" />

                        </h6>
                        <h5 id="postbody"> {{ $singlepost->body }} </h5>
                        <small class="ms-3 text-primary">
                            created by {{ $singlepost->user->name }}:

                            @if ($singlepost->created_at->isToday())
                                Today
                            @elseif($singlepost->created_at->isYesterday())
                                Yesterday
                            @else
                                {{ $singlepost->created_at->diffForHumans() }}
                            @endif
                            <br>
                            {{-- <a href="{{route('comview')}}/{{$post->id}}"class="btn btn-sm btn-primary"> Read Comments </a>  --}}
                        </small>
                </div>
                @endforeach
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
