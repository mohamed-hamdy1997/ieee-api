@extends('layouts.app')
@section('content')
    <div class="login-form add-user">
        <div class="content-wrap">
            <!-- if errors found -->
            {{--@if(count($errors)>0)--}}
                {{--<div class="alert alert-danger">--}}
                    {{--<ul>--}}
                        {{--@foreach($errors->all() as $error)--}}
                            {{--<li>{{$error}}</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--@endif--}}
            <!-- add user form -->
            <form action="/adduser" method="post" enctype="multipart/form-data" id="form">
                <h3>Add Admin || user</h3>
                    {{csrf_field()}}
                <!-- User Name -->
                <div class="field-wrap">
                    <label>
                        Name<span class="req">*</span>
                    </label>
                    <input id="name" name="name" type="text" required autocomplete="on" value="{{Request::old('name')}}" />
                </div>
                <!-- email input -->
                <div class="field-wrap">
                    <label>
                        Email Address<span class="req">*</span>
                    </label>
                    <input id="email" type="email" name="email"  required autocomplete="on"  value="{{Request::old('email')}}"/>
                </div>
                <!-- position select -->
                <div class="field-wrap">
                    <select name="user-type" id="position">
                        <option value="admin" disabled selected>Role <span class="req">*</span></option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <!-- password input -->
                <div class="field-wrap">
                    <label>
                        Password<span class="req">*</span>
                    </label>
                    <input id="pass" type="password" name="password" required autocomplete="off" />
                </div>
                <!-- Re-password input -->
                <div class="field-wrap">
                    <label>
                        Re-Password<span class="req">*</span>
                    </label>
                    <input id="re_password" type="password" name="password_confirmation" required autocomplete="off" />
                </div>

                <!-- login button -->
                <input type="submit" class="button" value="Add User">
            </form>
        </div>
    </div>
@endsection
