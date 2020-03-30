@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{route('comment.showAddComment',$comments[0]->post->id)}}">New Comment</a>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Comment</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                
                    @foreach ($comments as $comment)
                        <tr>
                            <td>{{$comment->comment}}</td>                          
                            <td><a href="{{route('comment.edit',$comment->id)}}">edit</a></td>
                        </tr>
                    @endforeach
                  
                  
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
