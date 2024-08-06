<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
{{--        <link rel="stylesheet" href="{{asset('css/app.css')}}">--}}
        <title>Document</title>
        @vite([
        'resources/sass/_variables.scss',
        'resources/sass/app.scss',
        'resources/css/app.css',
        'resources/js/bootstrap.js',
        'resources/js/app.js'])
    </head>
    <body>
        <div class="container">
{{--            @if ($errors->any())--}}
{{--                <div class="alert alert-danger">--}}
{{--                    <ul>--}}
{{--                        @foreach ($errors->all() as $error)--}}
{{--                            <li>{{ $error }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @endif--}}
            <div class="row">

                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-link" aria-current="page" href="{{route('main.index')}}">Home</a>
                                <a class="nav-link" href="{{route('post.index')}}">Posts</a>
                                <a class="nav-link" href="{{route('about.index')}}">About</a>
                                <a class="nav-link" href="{{route('contact.index')}}" tabindex="-1" aria-disabled="true">Contacts</a>
                                @can('view', auth()->user())
                                <a class="nav-link" href="{{route('admin.post.index')}}" tabindex="-1" aria-disabled="true">Admin</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            @yield('content')
        </div>
    </body>
</html>
