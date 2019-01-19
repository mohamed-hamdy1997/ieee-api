
 {{--{!! Form::open(['action' => ['PostsController@update',$post->id], 'method'=>'POST','enctype'=>'multipart/form-data']) !!}--}}

@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="login-form add-user">
        <!-- intro to form -->
        <div class="intro" >
            
        </div>
        <!-- add posts form -->
        <form action="{{action('PostsController@update',$post->id)}}" method="post" enctype="multipart/form-data" id="form" style="display: inline-block;width: 70%">
        <h3>Edit {{$post->name}}</h3>
        {{csrf_field()}}
        <!-- Post Title -->
            <div class="field-wrap">
                <label>
                    Title<span class="req">*</span>
                </label>
                <input type="text" id="title" name="title" required autocomplete="on"  value="{{$post->title}}">
            </div>
            <!-- post Description -->
            <div class="field-wrap">
                <label>
                    Description
                </label>
                <textarea name="body" id="description" cols="20" rows="10">{{$post->body}}</textarea>
            </div>

            <div class="field-wrap">
                <label>Image</label>
                <input type="file" name="post_image" value="{{$post->post_image}}">
            </div>

            <div class="field-wrap">
                <label>Video</label>
                <input type="file" name="post_video" value="{{$post->post_video}}">
            </div>

            <div class="field-wrap">
                <label>File</label>
                <input type="file" name="post_file" value="{{$post->post_file}}">
            </div>
            <!-- login button -->
            <input type="submit" class="button" value="Update">
        </form>
        <div class="">
            @if($post->post_image)
                    <h3>Image</h3>
                    <img src="{{ URL::to('/') }}/uploaded/images/{{$post->post_image}}" class="img-thumbnail " alt="{{$post->post_image}}" style="width:50%;height:50%" >
            @endif

            @if($post->post_video)
                    <h3>Video</h3>
                <video width="320" height="240" controls>
                    <source src="{{ URL::to('/') }}/uploaded/videos/{{$post->post_video}}" type="video/mp4">
                    <source src="{{ URL::to('/') }}/uploaded/videos/{{$post->post_video}}" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
            @endif

            @if($post->post_file)
                <h3>File</h3>
                <a href="{{ URL::to('/') }}/uploaded/files/{{$post->post_file}}">{{$post->post_file}}</a>
            @endif

        </div>
    </div>

@endsection





