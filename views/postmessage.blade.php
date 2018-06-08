@extends('layouts.app');

@section('content')
<div class = "container">
    <form action = "/insert"  method = "POST">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <table>
            <tr>
                <td>User ID: </td>
                <td>
                    <input type = "text" name = "user_id" value= "{{Auth::user()->id}}" hidden>
                    {{ $user = Auth()->user()->id}}
                </td>
            </tr>
            <tr>
                <td> Title: </td>
                <td>
                    <input type = "text" name = "title" required>
                </td>
            </tr>
            <tr>
                <td> Message: </td>
                <td>
                    <input type = "text" name = "body" required>
                </td>
            </tr>
            <tr>
                <td>
                    <input type  = "submit" name = "submit" value="POST" >
                </td>
            </tr>
        </table>
    </form>
</div>
<div class = "container">
    <form action = "upload" method = "post" enctype = "multipart/form-data">
        <label> Choose image :</label>
        <input type = "file" name = "file" id="file"> <br>
        <input type = "submit" value = "Upload" name = "submit">
        <input type = "hidden" value = "{{csrf_token()}}" name = "_token">
    </form>
</div>

<div class = "container text-right">
    <a href = "home"> Go back </a>
</div>

@endsection