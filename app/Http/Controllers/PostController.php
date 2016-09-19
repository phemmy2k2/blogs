<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\post;
use App\Tag;
use Session;
use App\Category;
use Purifier;

class PostController extends Controller
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
        //
        $posts = Post::orderBy('id','desc')->paginate(10);

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
        $tag2 =[];
        foreach ($tags as $tag) {
            $tag2[$tag->id]=$tag->name;
        }
        return view('posts.create')->withCategories($categories)->withTags($tag2);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data input
        $this->validate($request, [
            'title'=>'required | max:255',
            'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug', 
            'category_id' => 'required|integer',
            'body'=>'required'
            ]);

        //store data into DB
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id =$request->category_id;
        $post->body = Purifier::clean($request->body);

        $post ->save();

        $post->tags()->sync((array)$request->tags, false);

        Session::flash('success','Post successfully created!');
        //redirect to posts.show
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
        //
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
        $categories = Category::all();
        $cats =[];
        foreach ($categories as $category) {
            $cats[$category->id]=$category->name;
        }
        $tags = Tag::all();
        $tag2 =[];
        foreach ($tags as $tag) {
            $tag2[$tag->id]=$tag->name;
        }
        $post = Post::find($id);
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tag2);
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
        $post = Post::find($id);
        
        $this->validate($request, [
            'title' =>'required | max:255',
            'slug'=>"required|alpha_dash|min:5|max:255|unique:posts,slug,$id", 
            'category_id' => 'required|integer',
            'body' =>'required'
            ]);
        
        //save to DB
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->slug = $request->slug;
        $post->category_id =$request->category_id;
        $post->body = $request->input('body');
        $post->save();

        $post->tags()->sync((array)$request->tags);

        Session::flash('success','Post successfully Updated!');
        //redirect to index
        return redirect()->route('posts.show',$post->id);
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
        $post->tags()->detach();
        $post -> delete();

        return redirect()->route('posts.index');
    }
}
