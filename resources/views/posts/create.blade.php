@extends('layout')

@section('content')
<form action="/posts" method="POST">
{{csrf_field() }}

<div class="form-group">
        <label for="Parent">Category</label>
        <select class="form-control" name="category_id" id="parent">
             @foreach ($categories as $category) 
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endforeach
        </select>
    </div>
<div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" id="title" name="title"  placeholder="Enter Post Title">
</div>
<div class="form-group">
    <label for="body">Post Body</label>
    <textarea class="form-control" name="body" id="body" placeholder="Enter Post Body"></textarea>
</div>
<div class="form-group">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>

@endsection