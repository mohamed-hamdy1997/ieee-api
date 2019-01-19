@extends('layouts.app_home_articles')
@section('content')

    <div class="slider-wrap">
        <!-- slider left Button -->
        <div id="arrow-left" class="arrow">
            <i class="fa fa-chevron-left fa-3x" aria-hidden="true"></i>
        </div>
        <!-- start slider slides -->
        <div id="slider">
            <div class="slide" style="background-image: url({{asset('images/home/starter.jpg')}}">
                <div class="overlay">
                    <div class="slide-content">
                        <h2>Vision</h2>
                        <div class="content-description">
                            <h4>REACH YOUR INFINITY</h4>
                            <p>Through:</p>
                            <ul>
                                <li>Holding Courses and Sessions to decrease the gap between theoretical scince and
                                    parctical life.</li>
                                <li>Holding technical workshops.</li>
                                <li>Helping our country by our community Service.</li>
                                <li>Participating in IEEE worldwide competitions.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide" style="background-image: url({{asset('images/home/eye-eee-magazine.jpg')}}">
                <div class="overlay">
                    <!-- <div class="slide-content">
                        <div class="content-title"></div>
                        <div class="content-description"></div>
                    </div> -->
                </div>
            </div>
            <div class="slide" style="background-image: url({{asset('images/home/ras.jpg')}}">
                <div class="overlay">
                    <!-- <div class="slide-content">
                        <div class="content-title"></div>
                        <div class="content-description"></div>
                    </div> -->
                </div>

            </div>
            <div class="slide" style="background-image: url({{asset('images/home/pes.jpg')}}">
                <div class="overlay">
                    <!-- <div class="slide-content">
                        <div class="content-title"></div>
                        <div class="content-description"></div>
                    </div> -->
                </div>

            </div>
            <div class="slide" style="background-image: url({{asset('images/home/wie.jpg')}}">
                <div class="overlay">
                    <!-- <div class="slide-content">
                        <div class="content-title"></div>
                        <div class="content-description"></div>
                    </div> -->
                </div>

            </div>
        </div>
        <!-- End slider slides -->
        <!-- slider right Button -->
        <div id="arrow-right" class="arrow">
            <i class="fa fa-chevron-right fa-3x" aria-hidden="true"></i>
        </div>
    </div>

@endsection
