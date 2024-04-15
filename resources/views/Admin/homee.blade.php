@extends('user.layout.app')
@section('content')
@section('title')
    <title>Home</title>
@endsection

<div id="carouselExampleSlidesOnly " class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('asset/images/blogintroo.jpg') }}" class="d-block w-100" alt="Blog image">
        </div>

    </div>
</div>

<div id="getstart">
    <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores eius deleniti doloremque minima consectetur
        corporis ratione ducimus, fuga velit laudantium itaque reprehenderit in recusandae tenetur illum rem sequi.
        Minima, consequuntur?</h2>
    <a href="{{route('login')}}" class="btn btn-outline-dark">Get Started</a>
</div>

@endsection
