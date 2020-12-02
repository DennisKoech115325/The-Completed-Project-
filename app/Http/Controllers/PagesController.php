<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index(){
        return 'INDEX';
    }
    public function Home(){
        return view('pages.child');
    }
}
