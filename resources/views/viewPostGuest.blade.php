@extends('layouts.app_view_articles_guest')
@section('content')

<div class="content-wrap">
    <article>
        <h1>{{$post->title}}</h1>

        @if($post->post_file)
            <object data="{{ URL::to('/') }}/uploaded/files/{{$post->post_file}}" type="application/pdf" width="100%" height="700px" style="margin-top: 100px;">walking_robots</object>
        @else
            @if($post->post_image)
            <img src="{{ URL::to('/') }}/uploaded/images/{{$post->post_image}}" class="img-thumbnail" alt="{{$post->post_image}}" style="width:50%;height:50%" >
            @else
            <img src="{{asset('images/ieee-post-default.png')}}">
            @endif
        @endif

        

        @if (!\auth::guest())
            @if((auth()->user()->id == $post->user_id) || (auth()->user()->type == 'admin') )
                <div>

                    <a href="edit"><i class="fa fa-edit"></i></a>

                    {!! Form::open(['method'=>'DELETE' , 'route'=>['articles.destroy' , $post->id]]) !!}
                    {!! Form::submit('X' , ['class'=>'btn btn-danger d-inline-block'] ) !!}
                    {!! Form::close() !!}
                </div>
            @endif
        @endif

    </article>
</div>


@endsection
