@extends('user.layouts.index')
@section('bg-img', asset('public'.Storage::disk('local')->url($slug->image)))
@section('title', $slug->title)
@section('sub-title', $slug->subtitle)

@section('main-content')
    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <small>Created  {{ $slug->created_at->diffForHumans() }}</small>
                    @foreach($slug->categorieen as $categorie)
                        <a href="{{ route('categorie',$categorie->slug) }}"><small class="pull-right" style="margin-right: 20px;">{{ $categorie->name }}</small></a>
                    @endforeach
                    {!!   htmlspecialchars_decode($slug->body) !!}
                    <h3>Tags</h3>
                    @foreach($slug->tags as $tag)
                        <a href="{{ route('tag',$tag->slug) }}"><small class="pull-left" style="margin-right: 20px; border-radius: 5px; border: 0.5px solid #c1c3c3; background-color: #e4e4e4; padding: 5px;">{{ $tag->name }}</small></a>
                    @endforeach
                </div>
            </div>
        </div>
    </article>
    <hr>
@endsection
