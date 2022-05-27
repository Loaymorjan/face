<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
         $this->middleware('auth');
     }
    public function index()
    {
        $posts=Post::latest()->paginate(5);
        return view('posts.index')->with('posts',$posts);
    }

    public function postTrashed()
    {
        $posts=Post::onlyTrashed()->get();
        return view('posts.trashed')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create'); //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=> 'required',
            'content'=> 'required',
            'photo'=> 'required|image',
        ]);
         $photo=$request->photo;
         $newphoto=time().$photo->getClientOriginalName();
         $photo->move('upload/post',$newphoto);
         $post=Post::create([
            'user_id'=>Auth::id(),
            'title'=>$request->title,
            'content'=>$request->content,
            'photo'=>'upload/post/'.$newphoto,
            'slug'=>str::slug($request->title),
         ]);
         return redirect()->back();
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Responses
     */
    public function show($slug)
    {
        $post=Post::where('slug',$slug)->first();
        return view('posts.show')->with('post',$post);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        return view('posts.edit')->with('post',$post);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$id)
    {
        $post=Post::find($id);
        $this->validate($request,[
            'title'=> 'required',
            'content'=> 'required',
            'photo'=> 'required|image',
        ]);
        if($request->has('photo')){
         $photo=$request->photo;
         $newphoto=time().$photo->getClientOriginalName();
         $photo->move('upload/post/',$newphoto);
         $post->photo='upload/post/'.$newphoto;
        }
        $post->title=$request->title;
        $post->content=$request->content;
        $post->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        return redirect()->back();
    }

    public function hdelete(Post $post)
    {
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        return redirect()->back();
    }

    public function restor($id)
    {
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->restor();
        return redirect()->back();
    }
}
