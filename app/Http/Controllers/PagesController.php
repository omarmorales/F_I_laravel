<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Vacancy;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PagesController extends Controller
{
  public function index(){
    if (request()->tag) {
      $posts = Post::with('tags')->whereHas('tags', function($query){
        $query->where('id', request()->tag);
      })->paginate(10);
      $tags = Tag::all();
    } else {
      $tags = Tag::all();
      $posts = Post::orderBy('id', 'asc')->paginate(10);
    }

    return view('pages.index')->withPosts($posts)->withTags($tags);
  }

  public function aboutus()
  {
    $employees = Employee::orderBy('id', 'asc')->paginate(9);
    $vacancies = Vacancy::orderBy('id', 'asc')->paginate(3);
    return view('pages.about_us')->withEmployees($employees)->withVacancies($vacancies);
  }

  public function whatwedo()
  {
    return view('pages.whatwedo');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show(Vacancy $vacancy)
  {
    //return the sigle vacancy as resource
    return view('pages.vacancy')->withVacancy($vacancy);
  }

  public function vacancies()
  {
    $vacancies = Vacancy::orderBy('id', 'asc')->paginate(5);
    return view('pages.vacancies')->withVacancies($vacancies);
  }

  public function search(Request $request)
  {
    $request->validate([
      'query' => 'required|min:3'
    ]);
    $query = $request->input('query');
    $posts = Post::where('title', 'like', "%$query%")->orWhere('title_es', 'like', "%$query%")->orWhere('description', 'like', "%$query%")->orWhere('description_es', 'like', "%$query%")->paginate(10);
    // $posts = Post::search($query)->paginate(10);
    return view('pages.search-results')->with('posts', $posts);
  }
}
