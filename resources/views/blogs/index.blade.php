@extends('layouts.dashboard.dashboard')

@section('title', 'Research Blogs | CodeMate')

@section('styles')

    <!-- Load Main CSS
    =====================================-->
    <link rel="stylesheet" href="{{asset('blogs/main/main.css')}}">
    <link rel="stylesheet" href="{{asset('blogs/main/setting.css')}}">
    <link rel="stylesheet" href="{{asset('blogs/main/hover.css')}}">


    <link rel="stylesheet" href="{{asset('blogs/color/pasific.css')}}">
    <link rel="stylesheet" href="{{asset('blogs/icon/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('blogs/icon/et-line-font.css')}}">

@endsection

@section('content')
    <div class="row">
        @foreach ($posts as $post )
            <div class="col-md-3 justify-content-between card bg-gray">
                <h4 class="blog-title">
                </h4>
                <div class="blog-three-attrib">
                    <span class="fas fa-pencil-square-o"></span>
                    <a href="#">{{$post->author->name}}</a>
                </div>
                <img src="{{asset($post->image_path)}}" class="img-responsive" alt="post-image" width="200px" >
                <p class="mt25">{{$post->excerpt}}</p>
                <p class="mt25">{{$post->content}}</p>
            </div>
        @endforeach
    </div>
@endsection

