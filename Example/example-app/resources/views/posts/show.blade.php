@extends('layouts.app')

@section('content')

@if ($post)
<h1><a href="{{route('posts.edit',$post->id)}}">{{ $post->title }}</a></h1>
<p>{{ $post->content }}</p>
@else
<p>Post not found.</p>
@endif

@endsection