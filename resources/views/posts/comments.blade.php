@extends('layout')

@section('content')


<!-- Button trigger modal -->
<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#commentModal">
Add Comment
</button>
<!-- Modal -->
<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form action="/comments" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <input type="hidden" name="post_id" value="{{$post->id}}">
         <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
         </div>
         <div class="modal-body">
            <div class="form-group">
                <label>Comment Description</label>
                <textarea class="form-control" placeholder="Comment Description"name="body"></textarea>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add comment</button>
         </div>
      </div>
      </form>
   </div>
</div>

    @if(count($post->comments))
    <table class = "table table-condensed table-striped table-bordered table-hover">
        <tr>
            <th>#</th>
            <th>Created</th>
            <th>Created by</th> 
            <th>Body</th>
            <th colspan="2">Actions</th>
        </tr>
        @foreach($post->comments as $comment)
        <tr>
            <td>{{ $comment->id }}</td>
            <td>{{ $comment->created_at->toFormattedDateString() }}</td>
            <td>{{ Auth::user()->name }}</td>
            <td>{{$comment->body}}</td>
            <td> 
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $comment->id}}">
            Edit
            </button>

            <!-- Modal -->
            <div class="modal fade" id="editModal{{ $comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <form class="form-horizontal" action="/comments/{{ $comment->id}}" method="POST">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Comment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="form-group">
                    <textarea class="form-control" name="body">{{ $comment->body}}</textarea> 
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </form>
            </div>
            </div>
            </td>
            <td> 
            <form class="form-horizontal" action="/comments/{{ $comment->id}}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button type="submit" class="btn btn-danger" >Delete</button>
            </form>
            </td>
        </tr>
        @endforeach
    </table>
    @endif

@endsection