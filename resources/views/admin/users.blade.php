@extends('layouts.app')
@section('content')
        <div class="content-wrap">
            <div class="users">
                <table>
                    <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created Date</th>
                        <th>Type</th>
                        <th><i class="fa fa-trash" aria-hidden="true"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td><i class="fa fa-user" aria-hidden="true"></i></td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>{{$user->type}}</td>
                                <td>
                                @if(auth()->user()->id != $user->id)
                                <a href="{{"/users/".$user->id}}" onclick="if(!confirm('Do you Delete This User ?')) return false"> <i class="fa fa-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    
@endsection
