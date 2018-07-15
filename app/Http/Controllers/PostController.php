<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Post;
use Illuminate\Http\Request;

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
    $posts = Post::orderBy('id', 'desc')->paginate(10);
    return view('manage.posts.index')->withPosts($posts);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('manage.posts.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $this->validateWith([
      'title' => 'required|max:255',
      'description' => 'sometimes',
      'title_es' => 'required|max:255',
      'description_es' => 'sometimes',
      'thumbnail' => 'required'
    ]);

    //handle file uopz_overload
    if ($request->hasFile('thumbnail')) {
      //get filename with the extension
      $fileNameWithExt = $request->file('thumbnail')->getClientOriginalName();
      //get just fileName
      $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
      //get just ext
      $extension = $request->file('thumbnail')->getClientOriginalExtension();
      //file name to Store
      $fileNameToStore=$filename.'_'.time().'.'.$extension;
      //upload
      $path = $request->file('thumbnail')->storeAs('public/thumbnails', $fileNameToStore);
    } else {
      $fileNameToStore = 'noimage.jpg';
    }

    $post = new Post();

    $post->title = $request->title;
    $post->description = $request->description;

    $post->title_es = $request->title_es;
    $post->description_es = $request->description_es;

    $post->thumbnail = $fileNameToStore;
    $post->public = $request->public;

    $post->save();

    return redirect()->route('posts.index')->with('success', 'Post created successfully');
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
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    //
  }
}
