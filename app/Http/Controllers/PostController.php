<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view("backend.post.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.type.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|min:3|max:100",
            "context" => "required|min:3",
            'image' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = $request->file('image');
        if($image){
            $name=uniqid().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('image/post'),$name);
            $path='image/post/'.$name;
        }
        Post::Create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'context' => $request->context,
            'image' => $path,
        ]);        
   
        return response()->json(['success'=>'Post saved successfully.']);
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
        //
        $post = Post::find($id);
        return $post;
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
            "edit_title" => "required|min:3|max:100",
            "edit_context" => "required|min:3",
        ]);
        $image = $request->file('image');
        if($image){
            $name=uniqid().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('image/post'),$name);
            $path='image/post/'.$name;
        }else{
            $path = $request->old_image;
        }
        $transportation= Post::find($id);
        $transportation->title=$request->edit_title;
        $transportation->context=$request->edit_context;
        $transportation->image=$path;
        $transportation->save();
        return response()->json(['success'=>'Post updated successfully.']);   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $post = Post::find($id);
            $post->delete();
            return response()->json(['success'=>'Post deleted successfully.']);
    }

    public function getPost(Request $request)
    {
        $posts = Post::all();
        return $posts;
    }
}
