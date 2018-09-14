@extends('layout')

@section('content')
<div class="row">
    <div class="col-md-8">
        <a href='/posts/create' class="btn btn-warning">New Post<a>
        <table class = "table table-condensed table-striped table-bordered table-hover">
            <tr>
                <th>#</th>
                <th>Category Name</th>
                <th>Title</th>
                <th>Created</th>
                <th>Created By</th>
                <!-- <th>Body</th> -->
                <th colspan="3">Actions</th>
            </tr>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td> {{ $post->category->category_name }} </td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->created_at->toFormattedDateString() }}</td>
                <td>{{ Auth::user()->name }}</td>
                <!-- <td>{{$post->body}}</td> -->
                <td> <a href='/posts/edit/{{ $post->id }}' class="btn btn-primary">Edit</a></td>
                <td> <a href='/posts/comments/{{ $post->id }}' class="btn btn-success">Comments</a></td>
                <td> <a href='/posts/delete/{{ $post->id }}'onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a></td>
            </tr>
            @endforeach
        </table>
    </div>
<div class="col-md-4">
   @include('layouts.sidebar')
</div>
</div>

@endsection