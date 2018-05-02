@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">Post Create</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('post-store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="title" name="title" class="form-control" placeholder="Post title">
                        </div>
                        <div class="form-group">
                            <textarea name="content" v-model="markdown.content" class="form-control" cols="30" rows="10" placeholder="Post content."></textarea>
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
