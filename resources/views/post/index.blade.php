@extends('layouts.main')
@section('content')
    <div>
        <div>
            <a class="btn btn-success m-3" href="{{route('post.create')}}">Add Post</a>
        </div>
        @foreach($posts as $post)
            <div><a href="{{route('post.show', $post->id)}}">{{$post->id}}.{{$post->title}}</a></div>
        @endforeach
        <div class="m-3">
            {{$posts->withQueryString()->links()}}
        </div>
    </div>
@endsection
