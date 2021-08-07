<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
class DashController extends Controller
{
    public function showpost(){
    	$id=Auth::id();
    	$name=Auth::user()->name;
    	session()->put('user',$name);
    	$post=Post::where('user_id',$id)->paginate(5);
    	return view('\dashboard',['post'=>$post]);
    }
}
