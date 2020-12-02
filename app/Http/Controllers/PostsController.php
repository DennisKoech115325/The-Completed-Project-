<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use DB;
use Illuminate\Support\Facades\Storage;
class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =  Post::orderBy('created_at','desc')->simplePaginate(5);
        //The below is alright
        //$posts = DB::select('SELECT * FROM posts');
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Handle File Upload
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        if($request->hasFile('cover_image')){
            //Get file name with extension
            $fileNameWithExt=$request->file('cover_image')->getClientOriginalName();
            //Get Just File Nmame
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extType = $request->file('cover_image')->getClientOriginalExtension();
            //File Name To store
            $fileNameToStore =$fileName.'_'.time().'.'.$extType;
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noImage.jpg';
        }
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();
        $message = 'Post Created';
        return redirect('/posts')->with('success','Posts Created');
        
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$tid = auth()->user()->id;
        $posts = Post::find($id);
        //The Below is wrong, dont use
        //$posts = DB::select('SELECT * FROM posts WHERE id = '.$id);
        return view('posts.show')->with('posts',$posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $posts = Post::find($id);

        //Check for Correct user
        if(auth()->user()->id !== $posts->user_id){
            return redirect('/posts')->with('danger','Unauthorized Page');
        }else{
            return view('posts.edit')->with('posts',$posts);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    $this->validate($request, [
            'title'=>'required',
            'body'=>'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        if($request->hasFile('cover_image')){
            //Get file name with extension
            $fileNameWithExt=$request->file('cover_image')->getClientOriginalName();
            //Get Just File Nmame
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extType = $request->file('cover_image')->getClientOriginalExtension();
            //File Name To store
            $fileNameToStore =$fileName.'_'.time().'.'.$extType;
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            Storage::delete('public/cover_images/'.$post->cover_image);
            $post->cover_image = $fileNameToStore;
        }
        $post->save();
        return redirect('/posts')->with('success','Posts Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::find($id);
        if(auth()->user()->id == $posts->user_id || auth()->user()->usertype == 'admin'){
            if($posts->cover_image!=='noImage.jpg'){
                Storage::delete('public/cover_images/'.$posts->cover_image);
            }
        $posts->delete();
        return redirect('/posts')->with('success','Post Deleted');
        }else{
            return redirect('/posts')->with('danger','Unauthorized Page');
        }
    }
}

