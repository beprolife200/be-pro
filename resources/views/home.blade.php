@extends('layouts.app') 
@section('page-name', 'page__home') 
@section('content')
<div class="container">
    <div class="row text-right relative">
        <div v-if="newPost" class="new-post-panel">
            <div class="text-right">
                <span class="pointer" @click="cancelNewPost"><i class="fa fa-times"></i></span>
            </div>
            <post-configure objective="create" :post="newPost"></post-configure>
        </div>
    </div>
    <div class="row">
        <div class="d-flex align-items-end">
            <h2 class="mb-0" style="flex:auto;">我的文章</h2>
            <div>
                <a href="#" @click.prevent="createPost">新增文章</a>
                <span class="ml-1 mr-1">|</span>
                <form class="d-inline" action="{{ route('logout') }}" method="POST">
                    {{ csrf_field() }}
                    <button class="link" type="submit">登出</button>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            <ul>
                @foreach($posts as $post)
                <li><a href="#" @click.prevent="setActivePost('{{$post->slug}}')">{{$post->title}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

    <transition enter-active-class="fadeIn" leave-active-class="fadeOut" :duration="300">
        <div ref="PostEditorContainer" class="editor-container animated" v-show="activePost">
            <div class="row" v-if="activePost">
                <post-editor :post="activePost" @close="closeEditor"></post-editor>
            </div>
        </div>
    </transition>
</div>
@endsection
 
@section('script')
<script src="{{ asset('js/home.js') }}"></script>
@endsection