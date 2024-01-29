<!DOCTYPE html>
@extends('layouts.app')



@section('content')
<h1>Create post</h1>
<form method="post"  action="/posts">
    <input type="text" name="titulo" placeholder="Enter titulo">


    <input type="submit" name="submit">



</form>






@yield('footer')