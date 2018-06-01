<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Vacancy;
use App\Http\Resources\Vacancy as VacancyResource;

class VacanciesController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    //get vacancies
    $vacancies = Vacancy::paginate(5);

    // return the collection of vacancies as a resource
    return VacancyResource::collection($vacancies);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
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
    $vacancy = $request->isMethod('put') ? Vacancy::findOrFail($request->vacancy_id) : new Vacancy;

    $vacancy->id = $request->input('vacancy_id');
    $vacancy->name = $request->input('name');
    $vacancy->requirements = $request->input('requirements');
    $vacancy->description = $request->input('description');
    $vacancy->name_es = $request->input('name_es');
    $vacancy->requirements_es = $request->input('requirements_es');
    $vacancy->description_es = $request->input('description_es');

    if ($vacancy->save()) {
      return new VacancyResource($vacancy);
    }
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    // get Vacancy
    $vacancy = Vacancy::findOrFail($id);

    //return the sigle vacancy as resource
    return new VacancyResource($vacancy);
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
    // get Vacancy
    $vacancy = Vacancy::findOrFail($id);

    //return the sigle vacancy as resource
    if ($vacancy->delete()) {
      return new VacancyResource($vacancy);
    }
  }
}
