@extends('visitor.layout.app')
@section('visit')
@section('title')
    <title>Home</title>
@endsection



<div class="d-flex justify-content-center align-items-center "
    style="background-image: url(asset/postimg/blogintroo.jpg);height: 700px;background-size: cover;">

</div><br>


<!--Heading starts here-->
<div class="quote">
    <h1>Blogging</h1>
    <p class="pt-2">"Write with the intent to
        inspire, educate, and empower.</p>
    <p class=""> Every word you share has
        the potential to create ripples of impact in the vast ocean of online content."</p>
    <a href="{{ route('login') }}" class="btn btn-outline-dark">Get Started</a>
</div>



</div>

<div class="para px-4 mt-3">
    <h1>About</h1>
    <hr>
    <p>Our blog covers a wide range of topics. From in-depth analyses of the latest fashion trends to step-by-step
        recipes for delicious meals, from travel guides to hidden gems in far-off destinations to practical tips for
        living a more sustainable lifestyle, there's something here for everyone. We're committed to delivering
        high-quality, well-researched content that informs, entertains, and inspires our readers.</p>
</div>


<div>
    <h1 style="padding-left: 32px; padding-top: 20px;">Category</h1>
    <hr>
    @php
        $categories = App\Models\Category::all(); // Assuming you have a Category model
    @endphp
    <div class=" d-flex  justify-content-center  ">
    @foreach ($categories as $category)
        <a class="" href="{{ route('post.view') }}/{{ $category->id }}"
                target="">
     <div   style="background-image: url('images/{{ $category->catimage }}');height: 200px; width: 250px ;margin:5px; ">
            
             <button class="btn btn-primary px-2 ">{{ $category->categoryname }}</button>
             {{-- <img src="images/{{ $category->catimage }}" height= "200px"; width= "300px";/> --}}
            </div>
            
        </a>
        @endforeach

    </div>
          {{-- <div style="background-image: url(asset/images/fitness6.jpg);height: 200px; width: 300px;">
              <a href="{{ url('/cat/1') }}" class="btn btn-primary px-3">Fittness Blog</a>

          </div>
          <div style="background-image: url(asset/images/b11.webp); height: 200px; width: 300px;">
              <a href="{{ url('/cat/3') }}" class="btn btn-primary px-2">Bussiness Blog</a>
          </div>
          <div style="background-image: url(asset/images/t13.jpg); height: 200px;width: 300px;">
              <a href="{{ url('/cat/4') }}" class="btn btn-primary px-3">Travel Blog</a>
          </div>
      </div><br>

      <div class="d-flex gap-5 justify-content-center px-5 flex-lg-nowrap flex-wrap ">
          <div style="background-image: url(asset/images/f3.webp );height: 200px; width: 300px;">
              <a href="{{ url('/cat/7') }}" class="btn btn-primary px-2"> Food Blog </a>

          </div>
          <div style="background-image: url(asset/images/fa8.avif);height: 200px; width: 300px;">
              <a href="{{ url('/cat/6') }}" class="btn btn-primary  px-3">Fashion Blog</a>

          </div>
          <div style="background-image: url(asset/images/p10.jpg); height: 200px; width: 300px;">
              <a href="{{ url('/cat/8') }}" class="btn btn-primary  px-2">Personal Blog</a>
          </div>
          <div style="background-image: url(asset/images/n3.jpg); height: 200px;width: 300px;">
              <a href="{{ url('/cat/5') }}" class="btn btn-primary  px-3">News Blog</a>
          </div> --}}
          
     


    @include('admin.layout.inc.footer')






@endsection
