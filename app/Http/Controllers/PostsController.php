<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth',['except' =>['index','show']]); //except web routes index and show 
    }

    public function index()
    {
         $posts = Post::orderBy('created_at','desc')->paginate(1);
        return view('posts.index')->with('posts',$posts);
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
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'cover_image'=>'image|nullable|max:1999',
        ]);

        //check for image if its being uploaded
        if($request->hasFile('cover_image')){
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);//gets filename without extension
            $ext = $request->file('cover_image')->getClientOriginalExtension();//gets extension of file
            $fileNameToStore = $filename.'_'.time().'.'.$ext;
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
            }else{
            $fileNameToStore="noimage.jpg";
        }
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();
        return redirect('/posts')->with('success',"Post successfully created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if($post){
            return view('posts.singlepost')->with('post',$post);
        }
        else{
            return redirect('/posts')->with('error','Unauthorized Access');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if($post){
            if(auth()->user()->id !== $post->user_id){
                return redirect('/posts')->with('error','Unauthorized Access');
            }
            return view('posts.edit')->with('post',$post);
        }
        else{
            return redirect('/posts')->with('error','Unauthorized Access');
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
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'cover_image'=>'image|nullable|max:1999',
        ]);
        if($request->hasFile('cover_image')){
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);//gets filename without extension
            $ext = $request->file('cover_image')->getClientOriginalExtension();//gets extension of file
            $fileNameToStore = $filename.'_'.time().'.'.$ext;
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
            
        }
        
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
        $post->cover_image = $fileNameToStore;
        }

        $post->save();
        return redirect('/posts')->with('success',"Post successfully updated");
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
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error','Unauthorized Access');
        }
        if($post->cover_image != 'noimage.jpg'){
           Storage::delete('public/cover_images/'.$post->cover_image); 
        }

        $post->delete();
        return redirect('/posts')->with('success',"Post successfully deleted");
    }
}
