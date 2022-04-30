@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{$user->profile->profileImage()}}" class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex" style="align-items: center;">
                <div class="h4">{{ $user->username }}</div>
                <follow-button></follow-button>
                
            </div>

                @can('update', $user->profile)
                    <a href="/p/create" style="display: flex; justify-content: right;">Add New Post</a>
                @endcan

                

                @can('update', $user->profile)
                    <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
                @endcan

            <div class="d-flex p-1">
                <div style="padding-right: 5px;"><strong>{{$user->posts->count()}} </strong>posts</div>
                <div style="padding-right: 5px;"><strong>151 </strong>followers</div>
                <div style="padding-right: 5px;"><strong>8 </strong>following</div>
            </div>
            <div style="padding-top:4px; font-weight:bold;">{{$user->profile->title}}</div>
            <div> {{$user->profile->description}}</div>
            <div><a href="#">{{$user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{$post->id}}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
            </div>
        @endforeach
        
    </div>
</div>
@endsection
