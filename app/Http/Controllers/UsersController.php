<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use DB;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users=User::orderBy('created_at','desc')->simplePaginate(5);
        return view('users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);;
        return view('users.show')
        ->with('users',$user)
        ->with('posts',$user->posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);

        //Check for Correct user
        if(auth()->user()->id !== $users->id){
            return redirect('/home')->with('danger','Unauthorized Page');
        }else{
            return view('users.edit')->with('users',$users);
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
            'name'=>'required',
            'email'=>'required',
            'user_img' => 'image|nullable|max:1999',
            
        ]);
        if($request->hasFile('user_img')){
            //Get file name with extension
            $fileNameWithExt=$request->file('user_img')->getClientOriginalName();
            //Get Just File Nmame
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extType = $request->file('user_img')->getClientOriginalExtension();
            //File Name To store
            $fileNameToStore =$fileName.'_'.time().'.'.$extType;
            $path = $request->file('user_img')->storeAs('public/user_images',$fileNameToStore);
        }
        $users = User::find($id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->about = $request->input('about');
        if($request->hasFile('user_img')){
            Storage::delete('public/user_images/'.$users->user_img);
            $users->user_img = $fileNameToStore;
        }
        $users->save();
        return redirect('/home')->with('success','Account Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        if(auth()->user()->usertype == 'admin'){
            if($users->user_images!=='noImage.jpg'){
                Storage::delete('public/cover_images/'.$users->user_images);
            }
        $users->delete();
        return redirect('/dashboard')->with('success','User Deleted');
        }else{
            return redirect('/home')->with('danger','Unauthorized Page');
        }
    }
}
