<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Post;
use Auth;
class UserController extends Controller
{
    public function showProfile(){

        $user = User::find(1);

        $user->profile()->create([
            'phone'=>'9999999',
            'address'=>'phnom penh'
        ]);
   
        // $user->profile()->delete();

        return "profile added....";
      
    }

    public function showProfiles(){

        $users = User::all();      

        return view('user.users',compact('users'));
      
    }

    public function showEdit($id){
        $user = User::find($id);
        return view('user.showedit',compact('user'));
    }

    public function updateUser(Request $request,$id){        
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;        
        $user->profile()->update(['phone'=>$request->phone,'address'=>$request->address]);
        $user->save();
        return redirect('profiles');
    }

    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        return redirect('profiles');
    }

    public function showAddPost(){
        return view('post.showNewPost');
    }

    public function addPost(Request $request){
        
        Auth::user()->posts()->create([
            'title'=>$request->title,
            'body'=>$request->body
        ]);
       
        return redirect('posts');
    }

    public function showAllPosts(){

        $posts = Auth::user()->posts;
        return view('post.posts',compact('posts'));
    }

    public function showEditpost($id){
        $post = Post::find($id);
        return view('post.showEditPost',compact('post'));
    }
    public function updatePost($id,Request $request){
        Auth::user()->posts()->whereId($id)->update([
            'title'=>$request->title,
            'body'=>$request->body
        ]);
        return redirect('posts');
    }

    public function deletePost($id){
        Auth::user()->posts()->whereId($id)->delete();
        return redirect('posts');
       
    }

    public function openAttachedFile($file){
        $whatYouWant = "";
        switch ($file) {
            case 'Group.txt':
                $whatYouWant = "Who are/is my pair?";
                break;
            case 'Project Description.docx':
                $whatYouWant = "What is the project we are going to develop?";
                break;
            case 'Project Evaluation Grid.docx':
                $whatYouWant = "How is this project scored?";
                break;            
            default:
                $whatYouWant = "I don't understand :)";
                break;
        }
    }
}
