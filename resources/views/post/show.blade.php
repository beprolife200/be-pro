@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <article class="post">
            <h1 class="post__title">{{ $post->title }}</h1>
            <p class="post__description">{!! $post->description !!}</p>
            <div class="post__content">{!! $markdown !!}</div>
        </article>
    </div>
</div>
@endsection
