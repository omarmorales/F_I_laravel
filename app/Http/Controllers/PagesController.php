<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Vacancy;
use Illuminate\Http\Request;

class PagesController extends Controller
{
  public function index(){
    return view('pages.index');
  }

  public function aboutus()
  {
    $employees = Employee::all();
    $vacancies = Vacancy::all();
    return view('pages.about_us')->withEmployees($employees)->withVacancies($vacancies);
  }
}
