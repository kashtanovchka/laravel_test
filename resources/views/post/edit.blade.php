@extends('layouts.main')
@section('content')

    <form action="{{route('post.update', $post)}}" method="POST">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="title" value="{{$post->title}}">
            @error('title')
                <p class="alert alert-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" class="form-control" id="content" placeholder="content">{{$post->content}}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" name="image" class="form-control" id="image" placeholder="image" value="{{$post->image}}">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" aria-label="Category" id="category" name="category_id">
                @foreach($categories as $category)
                    <option
                        {{ $category->id == $post->category->id ? 'selected' : ''}}
                        value="{{ $category->id}}">{{ $category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Tag</label>
            <select class="form-select" multiple aria-label="multiple select example" aria-label="Category" id="tags" name="tags[]">
                @foreach($tags as $tag)
                    <option
                        @foreach($post->tags as $postTag)
                            {{ $tag->id == $postTag->id ? 'selected' : ''}}
                        @endforeach
                        value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
