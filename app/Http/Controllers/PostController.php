<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();       
        return view('welcome',compact('posts'));
    }
    
    public function showAddPost(){
        return view('post.showNewPost');
    }

    //todo
    public function addPost(Request $request){
        
        Post::create([
            'title'=>$request->title,
            'body'=>$request->body
        ]);
       
        return redirect('/');
    }

    //todo
    public function showComments($id){
        $post = Post::find($id);
        $comments = $post->comments;              
        return view('comment.comments',compact('comments'));
    }
}
