<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class PagesController extends Controller
{
  public function index(){
    return view('pages.index');
  }

  public function aboutus()
  {
    $employees = Employee::all();
    return view('pages.about_us')->withEmployees($employees);
  }
}
