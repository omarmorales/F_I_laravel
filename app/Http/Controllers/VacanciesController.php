<?php

namespace App\Http\Controllers;

use App\Vacancy;
use Illuminate\Http\Request;

class VacanciesController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('permission:delete-vacancy|update-vacancy|read-vacancy|create-vacancy')->except(['showSite']);
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    //get vacancies
    $vacancies = Vacancy::orderBy('id', 'desc')->paginate(10);
    // return vacancies in index view
    return view('manage.vacancies.index')->withVacancies($vacancies);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
    return view('manage.vacancies.create');
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
    $this->validateWith([
      'name' => 'required|max:255',
      'requirements' => 'required',
      'description' => 'sometimes'
    ]);

    $vacancy = new Vacancy();

    $vacancy->name = $request->name;
    $vacancy->requirements = $request->requirements;
    $vacancy->description = $request->description;

    $vacancy->name_es = $request->name_es;
    $vacancy->requirements_es = $request->requirements_es;
    $vacancy->description_es = $request->description_es;

    $vacancy->public = $request->public;

    $vacancy->save();

    return redirect()->route('vacancies.index')->with('success', 'Vacancy created successfully');
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
    return view('manage.vacancies.show')->withVacancy($vacancy);
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function showSite(Vacancy $vacancy)
  {
    //return the sigle vacancy as resource
    return view('pages.vacancy')->withVacancy($vacancy);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit(Vacancy $vacancy)
  {
    //
    return view('manage.vacancies.edit')->withVacancy($vacancy);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Vacancy $vacancy)
  {
    //
    $this->validateWith([
      'name' => 'required|max:255',
      'requirements' => 'required',
      'description' => 'sometimes'
    ]);

    $vacancy->name = $request->name;
    $vacancy->requirements = $request->requirements;
    $vacancy->description = $request->description;

    $vacancy->name_es = $request->name_es;
    $vacancy->requirements_es = $request->requirements_es;
    $vacancy->description_es = $request->description_es;

    $vacancy->public = $request->public;

    $vacancy->save();

    return redirect()->route('vacancies.index')->with('success', 'Vacancy updated successfully');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy(Vacancy $vacancy)
  {
    $vacancy->delete();

    return redirect()->route('vacancies.index')->with('success', 'Vacancy deleted successfully');
  }
}
