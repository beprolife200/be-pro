@extends('layouts.app')
@section('page-name', 'page__post-create') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">New Post</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form ref="createPostForm" action="{{ route('post-store') }}" method="post" @submit.prevent="submitPost">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="title" name="title" class="form-control" placeholder="Post title">
                        </div>
                        <div class="form-group">
                            <paper v-model="markdown.content"></paper>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-6">
            <markdown-parser v-model="markdown.content"></markdown-parser>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/post-create.js') }}"></script>
@endsection
