<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | IEEE Helwan Student Chapter</title>
    <meta name="author" content="Mohamed Emad">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.min.css')}}">

</head>
<body>
<!-- header -->
<header>
    <!-- menu button in mobile view -->
    <button id="menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
        <i class="fa fa-bars" aria-hidden="true"></i>
    </button>
    <!-- site branding -->
    <div class="site-branding">
        <a href="/" title="IEEE-Helwan Student Branch"> <img src="{{asset('images/logo.png')}}" alt="IEEE Helwan Student Branch"></a>
    </div><!-- .site-branding -->
</header>
    
<aside>
    <nav>
        <ul>
            <li>
                <a href="/articles-dashboard"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Articles </a>
            </li>
            <li>
                <a href="/articles-dashboard/create"><i class="fa fa-pencil" aria-hidden="true"></i> Add Article</a>
            </li>
            @if (!\auth::guest())
                @if(\auth()->user()->type == 'admin')
                <li>
                    <a href="/users"><i class="fa fa-users" aria-hidden="true"></i> users</a>
                </li>
                <li>
                    <a href="/adduser"><i class="fa fa-user-plus" aria-hidden="true"></i> add user</a>
                </li>
                @endif
            @endif
            @if (Auth::guest())
                <li>
                    <a href="{{ route('login') }}"  aria-hidden="true">  <i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                </li>
                {{--<li><a href="{{ route('register') }}">Register</a></li>--}}
            @else
            {{--logout--}}
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            @endif
        </ul>
    </nav>
</aside>
<main>


    @include('messages')
    @yield('content')


</main>

<div class="copy">
    <div class="content-wrap">
        <p>&copy; IEEE-HELWAN STUDENT BRANCH - All Copy Right Reseved</p>
    </div>
</div>

<!-- <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script> -->
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/add-post.min.js') }}"></script>
<script src="{{ asset('js/dashboard-menu.min.js') }}"></script>
<script src="{{ asset('js/sticky-menu.min.js') }}"></script>
<script src="{{ asset('js/del.js') }}"></script>




</body>

</html>
