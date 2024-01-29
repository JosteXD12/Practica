<!DOCTYPE html>
@extends('layouts.app')



@section('content')
<h1>edith post</h1>
<form method="post" action="/posts/{{$post->id}}">

    {{csrf_field()}}
    <input type="hidden" name="__method__" value="PUT">
    <input type="text" name="titulo" placeholder="Enter titulo" value="{{post ->title}}">


    <input type="submit" name="UPDATE">



</form>


<form method="post" action="/posts/{{$post->id}}">

<input type="hidden" name="__method__" value="DELETE">

<input type="submit" name="DELETE">



</form>



@endsection