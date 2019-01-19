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
        <!-- add posts form -->
        <form action="/create" method="post" enctype="multipart/form-data" id="form">
            <h3>Add New Article</h3>
            {{csrf_field()}}
                <!-- Post Title -->
            <div class="field-wrap">
                <label>
                    Title<span class="req">*</span>
                </label>
                <input type="text" id="title" name="title" required autocomplete="on"  value="{{Request::old('title')}}">
            </div>
            <!-- post Description -->
            <div class="field-wrap">
                <label>
                    Description
                </label>
                <textarea name="body" id="description" cols="20" rows="10">
                    {{Request::old('body')}}
                </textarea>
            </div>
            <!-- file uploader -->
            {{--<div class="field-wrap">--}}
                {{--<input type="file" accept="image/*,video/*,.pdf,.csv,.docx,.doc,.ppt,.pptx,.xls,.xlxs" id="fileSelect"--}} {{--multiple />--}}
            {{--</div>--}}
            <label>Choose image</label>
            <div class="field-wrap">
                <input type="file" name="post_image" accept="jpg,png,jpeg,svg">
            </div>
            <label>Choose Video</label>
            <div class="field-wrap">
                <input type="file" name="post_video" accept="mp4,3pg,flv,mkv,weba">
            </div>
            <label>Choose file</label>
            <div class="field-wrap">
                <input type="file" name="post_file"  accept="pdf,txt,docx,doc,pptx,ppt,xls">
            </div>
            <!-- login button -->
            <input type="submit" class="button"  value="Add Article">
        </form>
    </div>

@endsection
