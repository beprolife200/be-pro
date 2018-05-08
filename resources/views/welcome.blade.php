@extends('layouts.app') 
@section('page-name', 'page__post-create') 
@section('content')
<div class="container">
    <div class="row">

        <div class="row">
            <div class="offset-3 col-6">
                <ul class="list-group list-group-flush">
                    @foreach ($posts as $post)
                    <li class="list-group-item d-flex justify-content-between mb-2">
                        <a href="{{ $post->path() }}">{{$post->title}}</a>
                        <span>
                            <small>created at {{ $post->created_at->diffForHumans() }}</small>
                            <a href="{{ $post->edit() }}">
                                <i class="ml-2 fas fa-edit"></i>
                            </a>
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection