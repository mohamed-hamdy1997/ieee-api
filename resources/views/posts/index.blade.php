@extends('layouts.app')
@section('content')

    <div class="content-wrap">
        <h1 class="entry-header">Articles</h1>
        @if(count($posts) >0)
        <div class="posts">
            @foreach($posts as $post)
                <article class="post">
                    <div class="thumb">
                        <a href="articles-dashboard/{{$post->id}}/view">
                            @if($post->post_image)
                                <img src="{{ URL::to('/') }}/uploaded/images/{{$post->post_image}}" alt="{{$post->post_image}}">
                            @else
                                <img src="{{asset('images/ieee-post-default.png')}}" alt="{{$post->post_image}}">
                            @endif
                        </a>
                    </div>
                    
                    <div class="description">
                        <h3>{{$post->title}}</h3>
                        <p>{{substr($post->body,0,50)}}</p>
                    </div>
                    
                    <div class="actions">
                        <p><i class="fa fa-user" aria-hidden="true"></i> {{$post->post_owner}}</p>
                        @if (!\auth::guest())
                            @if((auth()->user()->id == $post->user_id) || (auth()->user()->type == 'admin') )
                                <a href="articles-dashboard/{{$post->id}}/edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="articles-dashboard/{{$post->id}}/destroy" onclick="if(!confirm('Do you Delete This Article ?')) return false"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            @endif
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
        {{$posts->links()}}
        @else
        <div>
            <p>there is no articles to View</p>
        </div>
        @endif
    </div>
@endsection
