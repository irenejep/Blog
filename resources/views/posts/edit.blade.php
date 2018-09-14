@extends('layout')

@section('content')
<form action="/posts/{{ $post->id }}" method="POST">
{{csrf_field() }}
{{method_field('PATCH') }}

<div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" id="title" name="title" value = "{{ $post->title}}">
</div>
<div class="form-group">
    <label for="body">Post Body</label>
    <textarea class="form-control" name="body" id="body">{{ $post->body}}</textarea>
</div>
<a href='/posts' class="btn btn-warning">Back</a>
<button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection