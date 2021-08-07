<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
                "title" => "Required",
                "body"  => "Required",
        ]);
        $user=$request->user();
        $post=new post;
        $post->title=$request->title;
        $post->body=$request->body;
        $user->post()->save($post);
        return redirect('/dashboard')->with('status','post created');
    }

    public function createpost(){
        return view('createpost');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post=Post::find($id);
        if($post && $post->user->name == session('user')){
        return view('edit',['post'=>$post]);
    }else{
        return redirect('/dashboard');
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
        $request->validate([
                "title" => "Required",
                "body"  => "Required",
        ]);
        $user=$request->user();
        $post=Post::find($id);
        $post->title=$request->title;
        $post->body=$request->body;
        $user->post()->save($post);
        return redirect('/dashboard')->with('status','post updated');
    }          
        
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        if($post && $post->user->name == session('user')){
        Post::destroy($id);
        return redirect('/dashboard')->with('status','post deleted');
    }else{
        return redirect('/dashboard');
    }
    }
}
