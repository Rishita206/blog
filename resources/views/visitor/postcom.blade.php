@extends('visitor.layout.temp')
@section('contain')
    {{-- heading --}}

    <div class="banner_section layout_padding">
        <div class="container">
            <h1 class="best_taital">BLOGING</h1>

            <p class="there_text">


            <p class="pt-2">"Write with the intent to
                inspire, educate, and empower.</p>
            <p class=""> Every word you share has
                the potential to create ripples of impact in the vast ocean of online content."</p>
            <a href="{{ route('login') }}" class="btn btn-outline-dark">Get Started</a>
        </div>

    </div>
    </div>

    {{-- Health category --}}

    <div class="marketing_section layout_padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="job_section">
                        <h1 class="jobs_text">Health Category</h1>
                        <p class="dummy_text">Welcome to our health blog, your guide to holistic well-being and vitality.
                            Explore insightful articles, expert advice, and practical tips to nourish your body, mind, and
                            spirit. From nutrition and fitness to mental health and self-care, embark on a journey of
                            wellness with us. Discover the power of small changes, the joy of self-discovery, and the path
                            to living your best life. Join our community as we strive for balance, resilience, and radiant
                            health together.</p>
                        <div class="apply_bt"><a href="{{ url('/cat/1') }}">Read now</a></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="image_1 padding_0"><img src="asset{{ 'images/1712925234.jpg' }}"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Bussiness Blog --}}
    <div class="marketing_section layout_padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="image_1 padding_0"><img src="asset{{ 'images' }}"></div>
                </div>
                <div class="col-md-6">
                    <div class="job_section_2">
                        <h1 class="jobs_text">Business Category</h1>
                        <p class="dummy_text">Welcome to our business category, your go-to resource for all things
                            entrepreneurship, innovation, and success. Dive into insightful articles, practical tips, and
                            expert advice designed to empower and inspire aspiring entrepreneurs, seasoned business leaders,
                            and anyone passionate about the world of commerce. From startup strategies and growth hacking to
                            leadership insights and market trends, explore the dynamic landscape of business with us. Join
                            our community as we navigate the challenges, celebrate the victories, and forge the path towards
                            excellence in the world of commerce.</p>
                        <div class="apply_bt"><a href="{{ url('/cat/3') }}">Read now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Travel Blog --}}

    <div class="marketing_section layout_padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="job_section">
                        <h1 class="jobs_text">Travel Blogs</h1>
                        <p class="dummy_text">Embark on a journey of discovery with our travel blog, your passport to
                            adventure, culture, and wanderlust. Explore captivating destinations, hidden gems, and immersive
                            experiences through inspiring articles, vivid photographs, and firsthand accounts. Whether
                            you're a seasoned globetrotter or a novice explorer, find inspiration, practical tips, and
                            insider knowledge to fuel your wanderlust and plan your next unforgettable adventure. Join our
                            community of fellow travelers as we share stories, exchange tips, and celebrate the
                            transformative power of travel in enriching our lives and connecting us to the world.</p>
                        <div class="apply_bt"><a href="{{ url('/cat/4') }}">Read now</a></div>
                    </div>
                </div>
                <div class="col-md-6 padding_0">
                    <div class="image_1"><img src="images/img-3.png"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Food Blog --}}
    <div class="marketing_section layout_padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 padding_0">
                    <div class="image_1"><img src="images/img-4.png"></div>
                </div>
                <div class="col-md-6">
                    <div class="job_section_2">
                        <h1 class="jobs_text">Food Blog</h1>
                        <p class="dummy_text">Indulge your senses and tantalize your taste buds with our food blog, a
                            culinary haven where flavor, creativity, and passion collide. Immerse yourself in a world of
                            mouthwatering recipes, culinary adventures, and gastronomic delights curated to inspire home
                            cooks and food enthusiasts alike. From decadent desserts to savory sensations, discover the art
                            of cooking, baking, and savoring every delicious moment. Join our vibrant community as we
                            celebrate the joys of food, share kitchen secrets, and embark on a delicious journey that
                            satisfies both the stomach and the soul.</p>
                        <div class="apply_bt"><a href="{{url ('/cat/7')}}">Read now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
