@extends('layouts.app_home_articles')
@section('content')
<div class="content-wrap" style="position: relative; top: 60px; margin-bottom: 100px;">
    <h3 class="entry-header">
        Articles
    </h3>
    <div class="posts">
        @if(count($posts) >0)
            @foreach($posts as $post)
            <article class="post">
                <div class="thumb">
                    <a href="articles/{{$post->id}}/view" title="{{$post->title}}">
                        @if($post->post_image)
                            <img src="{{ URL::to('/') }}/uploaded/images/{{$post->post_image}}" alt="{{$post->title}}">
                        @else
                            <img src="{{asset('images/ieee-post-default.png')}}" alt="{{$post->title}}">
                        @endif
                    </a>
                </div>
                <div class="description">
                    <a href="articles/{{$post->id}}/view" title="{{$post->title}}">
                        <h3>{{$post->title}}</h3>
                    </a>
                    <p>{{substr($post->body,0,50)}}</p>
                </div>
            </article>
            @endforeach
            <div class="clear-fix"></div>
        {{$posts->links()}}
        @else
            <div>
                <p>there is no posts to view</p>
            </div>
        @endif
        
    </div>
    
</div>

@endsection
