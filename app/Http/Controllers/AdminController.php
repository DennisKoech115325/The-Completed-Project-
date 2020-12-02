<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth'); 
    }
    public function user_list(){
        $users = User::all();
        return view('admin.list_user')->with('users',$users);
    }
    public function post_list(){
        $posts = Post::all();
        return view('admin.list_posts')->with('posts',$posts);
    }
}
