<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Tag;
use DB;
use Session;
use Hash;
use Input;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth', ['except' => 'showSite']);
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    // $posts = Post::orderBy('id', 'desc')->paginate(10);
    $posts = Post::all();
    return view('manage.posts.index')->withPosts($posts);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $tags = Tag::all();
    return view('manage.posts.create')->withTags($tags);
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
      'title' => 'sometimes',
      'description' => 'sometimes',
      'title_es' => 'required',
      'description_es' => 'sometimes',
      'publication_date' => 'sometimes',
      'thumbnail' => 'sometimes'
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

    if ($request->hasFile('file')) {
      //get filename with the extension
      $file_twoNameWithExt = $request->file('file')->getClientOriginalName();
      //get just fileName
      $filename_two = pathinfo($file_twoNameWithExt, PATHINFO_FILENAME);
      //get just ext
      $extension_two = $request->file('file')->getClientOriginalExtension();
      //file name to Store
      $fileNameToStore_two=$filename_two.'_'.time().'.'.$extension_two;
      //upload
      $path_two = Storage::disk('spaces')->putFileAs('IDEA/files', $request->file('file'), $fileNameToStore_two, 'public');
    } else {
      $fileNameToStore_two = 'noimage.jpg';
    }

    $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );

    $post = new Post();

    $post->title = $request->title;
    $post->description = $request->description;

    $post->title_es = $request->title_es;
    $post->description_es = $request->description_es;
    $post->title_no_accents = strtr( $request->title_es, $unwanted_array );

    $post->publication_date = $request->publication_date;
    $post->thumbnail = $fileNameToStore;
    $post->file = $fileNameToStore_two;
    $post->public = $request->public;

    $post->save();

    if ($request->tags) {
      $post->tags()->sync(explode(',', $request->tags));
    }

    return redirect()->route('posts.show', $post->id)->with('success', 'Post created successfully');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Post  $post
  * @return \Illuminate\Http\Response
  */
  public function show(Post $post)
  {
    return view('manage.posts.show')->withPost($post);
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Post  $post
  * @return \Illuminate\Http\Response
  */
  public function showSite(Post $post)
  {
    //return the sigle vacancy as resource
    return view('pages.post')->withPost($post);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Post  $post
  * @return \Illuminate\Http\Response
  */
  public function edit(Post $post)
  {
    //
    $tags = Tag::all();
    return view('manage.posts.edit')->withPost($post)->withTags($tags);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Post  $post
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Post $post)
  {
    //
    $this->validateWith([
      'title' => 'required|max:255',
      'description' => 'sometimes',
      'title_es' => 'required|max:255',
      'publication_date' => 'sometimes',
      'description_es' => 'sometimes',
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

    if ($request->hasFile('file')) {
      //get filename with the extension
      $file_twoNameWithExt = $request->file('file')->getClientOriginalName();
      //get just fileName
      $filename_two = pathinfo($file_twoNameWithExt, PATHINFO_FILENAME);
      //get just ext
      $extension_two = $request->file('file')->getClientOriginalExtension();
      //file name to Store
      $fileNameToStore_two=$filename_two.'_'.time().'.'.$extension_two;
      //upload
      $path_two = Storage::disk('spaces')->putFileAs('IDEA/files', $request->file('file'), $fileNameToStore_two, 'public');
    } else {
      $fileNameToStore_two = 'noimage.jpg';
    }

    $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );

    $post->title = $request->title;
    $post->description = $request->description;

    $post->title_es = $request->title_es;
    $post->description_es = $request->description_es;
    $post->title_no_accents = strtr( $request->title_es, $unwanted_array );

    $post->publication_date = $request->publication_date;

    if ($request->hasFile('thumbnail')) {
      $post->thumbnail = $fileNameToStore;
    }

    if ($request->hasFile('file')) {
      $post->file = $fileNameToStore_two;
    }
    $post->public = $request->public;

    $post->save();
    $post->tags()->sync(explode(',', $request->tags));

    return redirect()->route('posts.show', $post->id)->with('success', 'Post updated successfully');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Post  $post
  * @return \Illuminate\Http\Response
  */
  public function destroy(Post $post)
  {
    if ($post->thumbnail != 'noimage.jpg') {
      //delete de image
      Storage::delete('public/thumbnails/'.$post->thumbnail);
    }

    if ($post->file != 'noimage.jpg') {
      //delete de image
      Storage::disk('spaces')->delete('/IDEA/files/'.$post->file);
    }

    $post->delete();

    return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
  }
}
