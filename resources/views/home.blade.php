@extends('layouts.master_home')

<!-- ======= Hero Section ======= -->
@include('layouts.body.slider')
<!-- End Hero -->

@section('main-home')
<main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>About Us</strong></h2>
            </div>

            <div class="row content">
                <div class="col-lg-6" data-aos="fade-right">
                    <h3>{{$abouts->title}}</h2>
                        <h5>{{$abouts->short_desc}}</h5>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
                    <h5>{{$abouts->long_desc}}</h5>
                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->


    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Portfolio</h2>
            </div>

            <div class="row portfolio-container" data-aos="fade-up">
                @foreach($images as $img)
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img src="{{asset($img->image)}}" class="img-fluid" alt="">
                </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Our Brands Section ======= -->
    <section id="clients" class="clients">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Our Brands</h2>
            </div>

            <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">

                @foreach($brands as $brand)
                <div class="col-lg-3 col-md-3 col-6">
                    <div class="client-logo">
                        <img src="{{ $brand->brand_image }}" class="img-fluid" style="width: 80px; height: 80px;">
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </section><!-- End Our Brands Section -->

</main>
@endsection