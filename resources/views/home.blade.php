@extends('layouts.app') 
@section('page-name', 'page__home') 
@section('content')
<div class="container">
    <div class="row text-right relative">
        <a href="#" @click.prevent="createPost">新增文章</a>
        <div v-if="newPost" class="new-post-panel">
            <div class="text-right">
                <span class="pointer" @click="cancelNewPost"><i class="fa fa-times"></i></span>
            </div>
            <post-configure objective="create" :post="newPost"></post-configure>
        </div>
    </div>
    <div class="row">
        <h2>我的文章</h2>
        <hr>
        <ul>
            @foreach($posts as $post)
            <li><a href="#" @click.prevent="setActivePost('{{$post->slug}}')">{{$post->title}}</a></li>
            @endforeach
        </ul>
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