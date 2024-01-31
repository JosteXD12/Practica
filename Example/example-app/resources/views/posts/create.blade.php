<!DOCTYPE html>
@extends('layouts.app')

@section('content')
@csrf
<h1>Create post</h1>

<!-- <form method="post"  action="/posts"> -->
{!! Form::open(['method'=>'POST', 'route'=>'posts.store', 'enctype'=>'multipart/form-data']) !!}
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}

</div>

<div class="form-group">
    {!! Form::submit('Create Post', ['class'=>'btn btn-prymary']) !!}
</div>

{!! Form::close() !!}

@if(count($errors)>0)

<div class="alert alert-danger">

    <ul>

        @foreach($errors ->all() as $error)

        <li>
            {{$error}}
        </li>

        @endforeach

    </ul>

</div>

@endif

@endsection
@yield('footer')