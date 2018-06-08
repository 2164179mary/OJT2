@extends('layouts.app');

@section('content')
    <div class = "sticky-top">
        <h2 class = "text-center"> Show Own Post </h2>
    </div>
<div class = "container">
    <table  class = "table table-bordered table-striped">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
    <thead class = "thead-dark">
        <tr>
            <th class = "col-md-3"> Title </th>
            <th class = "col-md-5"> Message Body </th>
        </tr>
    </thead>
    <tr>
        @foreach ($ownPost as $post)
            <td> {{$post->title}}</td>
            <td> {{$post->body}}</td>

            <td> <a href = 'delete/{{$post->id}}}'> Delete </a>  </td>
            <td> <a href = 'edit/{{$post->id}}}'> Edit </a></td>
    </tr>
        @endforeach
    </table>
</div>
<div class = "container text-right">
    <a  href = "home"> Go back </a>
</div>
@endsection