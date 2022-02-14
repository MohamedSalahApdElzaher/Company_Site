@extends('layouts.master_home');

@section('main-home');
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">


            <div class="row portfolio-container" data-aos="fade-up">
                @foreach($images as $img)
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img src="{{asset($img->image)}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <a href="{{asset($img->image)}}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </section><!-- End Portfolio Section -->

@endsection