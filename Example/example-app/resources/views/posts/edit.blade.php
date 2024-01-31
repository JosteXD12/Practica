@extends('layouts.app')

@section('content')

<h1>Edit Post</h1>

{!! Form::model($post, ['method' => 'PATCH', 'route' => ['posts.update', $post->id], 'enctype' => 'multipart/form-data']) !!}

{{ csrf_field() }}

<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Update Post', ['class' => 'btn btn-info']) !!}
</div>

{!! Form::close() !!}


{!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id], 'enctype' => 'multipart/form-data']) !!}

{!! Form::submit('Delete Post', ['class' => 'btn btn-danger']) !!}

{!! Form::close() !!}
@endsection