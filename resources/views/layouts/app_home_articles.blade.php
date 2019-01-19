<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IEEE Helwan Student Chapter</title>
    <meta name="keywords" content="IEEE, HSB, Helwan Student Chapter, IEE HSB">
    <meta name="author" content="Mohamed Emad">
    <meta name="description" content="Was created in 2001 .. and it was the 3rd branch to be created in Egypt. Then it was re-activated again in October 2010 by Dr.omar hanfy and Mr. ahmed kamal. IEEE Helwan was the first student organization to be founded in Helwan university.">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.min.css')}}">
</head>

<body>
<header>
    <div class="content-wrap">
        <div class="site-branding">
            <a href="/" title="IEEE-Helwan Student Branch"> <img src="{{asset('images/logo.png')}}" alt="IEEE Helwan Student Branch"> </a>
        </div><!-- .site-branding -->
        <button id="menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
        <nav class="site-navigation" id="site-navigation">
            <ul id="menu">
                <li class="active"><a href="/">Home</a></li>
                <li class="menu-item-has-children">
                    <a href="#">EYE-EEE Magazine</a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Magazine</a></li>
                        @if (Auth::guest())
                            <li><a href="/articles">Articles</a></li>
                        @endif
                        @if (!Auth::guest())
                            <li><a href="/articles-dashboard">Articles</a></li>
                        @endif
                    </ul>
                </li>
                <!--
                <li class="menu-item-has-children">
                    <a href="#">Chapters</a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">PES</a></li>
                        <li><a href="#">WIE</a></li>
                    </ul>
                </li>
                <li><a href="#">Misc</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact Us</a></li>
                -->
            </ul>
        </nav><!-- site-navigation -->

    </div>
</header><!-- masthead -->




@include('messages')
@yield('content')




<!-- start Footer -->
<footer>
    <div class="content-wrap">
        <!-- Rech Us Container -->
        <div class="reach-us">
            <h3>Reach Us</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                dolore
                eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem
            </p>
            <!-- Social Media Links -->
            <div class="social">
                <ul>
                    <li><a href="https://www.facebook.com/ieeehsb/" alt="Facebook page"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="https://twitter.com/helwansb" alt="twitter account"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.instagram.com/ieee_hsb/" alt="Instgram account"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <!-- end Social Media Links -->
        </div>
        <!-- end Rech Us Container -->

        <!-- Retrieve last posts added if user -->

        <div class="latest-posts">
            {{--@if(!auth()->guest())--}}
                @foreach($posts as $post)
                    <div class="post">
                        @if(auth()->guest())
                            <a href="/articles/{{$post->id}}/view" title="{{$post->title}}">
                        @else
                            <a href="/articles-dashboard/{{$post->id}}/view" title="{{$post->title}}">
                        @endif
                        @if($post->post_image)
                            <img src="{{ URL::to('/') }}/uploaded/images/{{$post->post_image}}" alt="{{$post->title}}">
                        @else
                            <img src="{{asset('images/ieee-post-default.png')}}" alt="{{$post->title}}">
                        @endif
                            </a>
                        <div class="description">
                            <a href="/articles/{{$post->id}}/view" title="{{$post->title}}">
                                <h4>{{$post->title}}</h4>
                            </a>
                            @if($post->body)
                                <p>{{substr($post->body,0,50)}}</p>
                            @endif
                        </div>
                    </div>
                    @break
                @endforeach
            {{--@endif--}}
        </div>
        <!-- Retrieve last post added if guest 

        {{--<div class="latest-posts">--}}
            {{--@if(auth()->guest())--}}
                {{--<div class="post">--}}
                    {{--@if(auth()->guest())--}}
                        {{--<a href="/articles/{{$post->id}}/view">--}}
                    {{--@else--}}
                        {{--<a href="/articles-dashboard/{{$post->id}}/view">--}}
                    {{--@endif--}}
                    {{--@if($post->post_image)--}}
                        {{--<img src="{{ URL::to('/') }}/uploaded/images/{{$post->post_image}}" >--}}
                    {{--@else--}}
                        {{--<img src="{{asset('images/ieee-post-default.png')}}">--}}
                    {{--@endif--}}
                    {{--</a>--}}
                    {{--<div class="description">--}}
                        {{--<a href="#">--}}
                            {{--<h4>{{$post->title}}</h4>--}}
                        {{--</a>--}}
                        {{--<p>{{substr($post->body,0,50)}}.</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--@endif--}}
        {{--</div>--}}

        End last post added -->

        <!-- Start Google Map -->
        <div id="googleMap" class="locat-us"></div>
        <!-- End Google Map -->
    </div>

    <!-- start copy Rights -->
    <div class="copy">
        <div class="content-wrap">
            <p>&copy; IEEE-HELWAN STUDENT BRANCH - All Copy Right Reseved</p>
        </div>
    </div>
    <!-- end copy Rights -->
</footer>
<!-- End Footer -->

<!-- <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script> -->
<!-- Scripts -->
<!-- <script src="{{ asset('js/app.js') }}"></script> -->
<script src="{{ asset('js/published-menu.min.js') }}"></script>
<script src="{{ asset('js/sticky-menu.min.js') }}"></script>
<script src="{{ asset('js/slider-settings.min.js') }}"></script>
<script src="{{ asset('js/map.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBH1AK01Pq4TE5uoNk2fz4WTNxe3PxayOM&callback=map"></script>

</body>

</html>

