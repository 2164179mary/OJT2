@extends('layouts.app');

@section('content')
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
<div class = "sticky-top">
    <h2 class = "text-center"> List of Post </h2>
</div>
<div class = "container">
    <table class = "table table-bordered table-striped">
        <tr>
            <th> Title </th>
            <th> Message Body </th>
            <th> User ID </th>
        </tr>
        <tr>
            @foreach ($queryPost as $post)
                <td> {{$post->title}}</td>
                <td> {{$post->body}}</td>
                <td> {{$post->user_id}}</td>
        </tr>
        @endforeach
    </table>

    <div class = "container text-right">
        <a href = "home"> Go back </a>
    </div>
</div>

@endsection