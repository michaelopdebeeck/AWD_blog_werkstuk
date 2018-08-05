@extends('user.layouts.index')

@section('bg-img', asset('public/user/img/home-bg.jpg'))
@section('title', "Mic's blog")
@section('sub-title', 'the daily life of a student')

@section('main-content')
    <!-- Main Content -->
    <div class="container">
        <div class="row" id="app">
            <div class="col-lg-8 col-md-10 mx-auto">
                @foreach($blogposts as $blogpost)
                    <div class="post-preview">
                        <a href="{{ route('blogpost', $blogpost->slug) }}">
                            <h2 class="post-title">{{ $blogpost->title }}</h2>
                            <h3 class="post-subtitle">{{ $blogpost->subtitle }}</h3>
                        </a>
                        <p class="post-meta">Posted by {{ $blogpost->posted_by }} </a>{{ $blogpost->created_at->diffForHumans() }}
                        </p>
                    </div>
                @endforeach
                <hr>
                <!-- Pager -->
                <div class="clearfix">
                    {{ $blogposts->links() }}
                </div>
            </div>
        </div>
    </div>

    <hr>
@endsection