@extends('layouts.app');

@section('content')
    <div class = "container">
        <form action = "edit/{{$post[0]->id}}" method = "POST" >
            <input type = "hidden" name = "_token" value = "{{csrf_token()}}">
            <table class = "table">
                <tr>
                    <th> Title </th>
                    <td>
                        <input  type = "text" name = "title" value = "{{$post[0]->title}}">
                    </td>
                </tr>
                <tr>
                    <th>Body</th>
                    <td>
                        <input type = "text" name = "body" value = {{$post[0]->body}}>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value = "Save">
                    </td>
                </tr>
            </table>
        </form>
        <div class = "container text-right">
            <a href = "/showOwnPost"> Go back </a>
        </div>
    </div>
@endsection