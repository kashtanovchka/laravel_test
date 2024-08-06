@extends('layouts.main')
@section('content')
    {{$post->title}}
    <div>
        <a href="{{route('post.edit', $post->id)}}">Edit</a>
    </div>
    <div>
        <form action ="{{route('post.delete',$post->id)}}" method="POST">
            @csrf
            @method('delete')
            <input type="submit" value="Delete">
        </form>
    </div>
@endsection
