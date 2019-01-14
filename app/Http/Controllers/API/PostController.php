<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $posts = Post::with('tags')->orderBy('publication_date', 'DESC')->get();
      return $posts;
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

    public function search()
    {
      if ($search = \Request::get('q')) {
        $posts = Post::with('tags')->where(function($query) use ($search){
          $query->where('title_es','LIKE',"%$search%")
          ->orWhere('title','LIKE',"%$search%");
        })->latest()->get();
      }else{
        $posts = User::with('tags')->latest()->get();
      }
      return $posts;
    }

    public function searchpress()
    {
      if ($search = \Request::get('q')) {
        $posts = Post::with('tags')->whereHas('tags',function($query){
          $query->where('name', '=', 'prensa');
        })->where(function($query) use ($search){
          $query->where('title_es','LIKE',"%$search%")
          ->orWhere('title','LIKE',"%$search%");
        })->latest()->get();
      }else{
        $posts = User::with('tags')->latest()->get();
      }
      return $posts;
    }

    public function searchgeneral()
    {
      if ($search = \Request::get('q')) {
        $posts = Post::with('tags')->whereDoesntHave('tags',function($query){
          $query->where('name', '=', 'prensa');
        })->where(function($query) use ($search){
          $query->where('title_es','LIKE',"%$search%")
          ->orWhere('title','LIKE',"%$search%");
        })->latest()->get();
      }else{
        $posts = User::with('tags')->latest()->get();
      }
      return $posts;
    }

    public function general()
    {
      $posts = Post::with('tags')->whereDoesntHave('tags',function($query){
        $query->where('name', '=', 'prensa');
      })->orderBy('publication_date', 'DESC')->get();
      return $posts;
    }

    public function press()
    {
      $posts = Post::with('tags')->whereHas('tags',function($query){
        $query->where('name', '=', 'prensa');
      })->orderBy('publication_date', 'DESC')->get();
      return $posts;
    }

    public function postbytag()
    {
      if ($search = \Request::get('q')) {
        $posts = Post::with('tags')->whereHas('tags', function($query) use ($search){
          $query->where('name','=',"$search");
        })->latest()->get();
      }else{
        $posts = User::with('tags')->latest()->get();
      }
      return $posts;
    }

    public function generalpostbytag()
    {
      if ($search = \Request::get('q')) {
        $posts = Post::with('tags')->whereDoesntHave('tags',function($query){
          $query->where('name', '=', 'prensa');
        })->whereHas('tags', function($query) use ($search){
          $query->where('name','LIKE',"%$search%");
        })->latest()->get();
      }else{
        $posts = User::with('tags')->latest()->get();
      }
      return $posts;
    }

    public function presspostbytag()
    {
      if ($search = \Request::get('q')) {
        $posts = Post::with('tags')->whereHas('tags',function($query){
          $query->where('name', '=', 'prensa');
        })->whereHas('tags', function($query) use ($search){
          $query->where('name','LIKE',"%$search%");
        })->latest()->get();
      }else{
        $posts = User::with('tags')->latest()->get();
      }
      return $posts;
    }
}
