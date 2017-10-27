<?php

namespace App\Http\Controllers;

use App\Category;
use App\Image;
use App\Tag;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(5);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request,array(
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'slug' => 'required',
            'category' => 'required',
        ));
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = $request->slug;
        $post->category_id = $request->category;
        $post->save();
        $post->tags()->sync($request->tags,false);
        $i = 0;
        $images = array();

        $imageName = rand().'.'.$request->image1->getClientOriginalExtension();
        $request->image1->move(public_path('images'), $imageName);
        $images[]=array('post_id'=>$post->id,'image'=>'images/'.$imageName);

        $imageName = rand().'.'.$request->image2->getClientOriginalExtension();
        $request->image2->move(public_path('images'), $imageName);
        $images[]=array('post_id'=>$post->id,'image'=>'images/'.$imageName);

        $imageName = rand().'.'.$request->image3->getClientOriginalExtension();
        $request->image3->move(public_path('images'), $imageName);
        $images[]=array('post_id'=>$post->id,'image'=>'images/'.$imageName);

        $image = new Image();
        $image->insert($images);

        Session::flash('success','Post saved successfully');
        return redirect()->route('posts.show',$post->id);
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
        return view('posts.show')->withPost($post);
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
        $cats = Category::select('id','category_name')->get();
        $tags_dumb = Tag::all();
        $tags = array();
        $categories=array();
        foreach ($cats as $category)
            $categories[$category->id]=$category->category_name;
        foreach ($tags_dumb as $tag)
            $tags[$tag->id]=$tag->name;

        return view('posts.edit')->withPost($post)->withCategories($categories)->withTags($tags);
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
        //dd($request);
        $this->validate($request,array(
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ));
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category');
        $post->save();
        $post->tags()->sync($request->tags,true);

        Session::flash('success',$post->title.' Updated successfully');
        return view('posts.show')->withPost($post);
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
        $post->delete($id);
        $post->tags()->detach();
        Session::flash('success',$post->title.' Deleted successfully');
        $posts = Post::orderBy('id','desc')->paginate(5);
        return redirect()->route('posts.index')->withPosts($posts);
    }
}
