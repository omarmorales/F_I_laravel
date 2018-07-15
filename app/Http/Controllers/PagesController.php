<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Vacancy;
use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
  public function index(){
    $posts = Post::orderBy('id', 'asc')->paginate(10);
    return view('pages.index')->withPosts($posts);
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
}
