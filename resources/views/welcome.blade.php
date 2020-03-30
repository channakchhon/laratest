@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{route('showAddPost')}}">New Post</a>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Body</th>                  
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                
                    @foreach ($posts as $post)
                        <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>{{$post->title}}</td>
                            <td>{{$post->body}}</td>                          
                            <td><a href="{{route('post.comments',$post->id)}}">comment</a></td>
                        </tr>
                    @endforeach
                  
                  
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
