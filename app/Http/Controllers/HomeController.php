<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class HomeController extends Controller
{
    public function homepage(){
    	$data=Post::paginate(4);
    	return view('\welcome',['data'=>$data]);
    }
}
