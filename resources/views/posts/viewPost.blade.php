@extends('layouts.app')
@section('content')
<div class="content-wrap">
    {{--control--}}
    <div class="actions">
        <p><i class="fa fa-user" aria-hidden="true"></i> {{$post->post_owner}}</p>
        @if (!\auth::guest())
            @if((auth()->user()->id == $post->user_id) || (auth()->user()->type == 'admin') )

                    <a href="edit"><i class="fa fa-pencil"></i></a>
                    {!! Form::open(['method'=>'DELETE' , 'route'=>['articles-dashboard.destroy' , $post->id]]) !!}
                    {!! Form::submit('X' , ['class'=>'button'] ) !!}
                    {!! Form::close() !!}
            @endif
        @endif
    </div>
    

    <div class="article">
        {{--title--}}
        <h3 class="entry-header">{{$post->title}}</h3>

        @if($post->post_file)
            <object data="{{ URL::to('/') }}/uploaded/files/{{$post->post_file}}" type="application/pdf" width="100%" height="700px" style="margin-top: 100px;">{{$post->title}}</object>
        @elseif($post->post_image)
            <img src="{{ URL::to('/') }}/uploaded/images/{{$post->post_image}}" alt="{{$post->post_image}}">
        @elseif($post->post_video)
            <video width="320" height="240" controls>
                <source src="{{ URL::to('/') }}/uploaded/videos/{{$post->post_video}}" type="video/mp4">
                <source src="{{ URL::to('/') }}/uploaded/videos/{{$post->post_video}}" type="video/ogg">
                Your browser does not support the video tag.
            </video>
        @else
            <img src="{{asset('images/ieee-post-default.png')}}" alt="{{$post->post_image}}">
        @endif

        @if($post->body)
            <p>{{$post->body}}</p>
        @endif

    </div>
</div>

    
@endsection
