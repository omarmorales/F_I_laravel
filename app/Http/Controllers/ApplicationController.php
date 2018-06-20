<?php

namespace App\Http\Controllers;

use App\Application;
use App\Vacancy;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
  public function __construct()
  {
    $this->middleware('role:superadministrator|administrator');
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    //
    $applications = Application::orderBy('id', 'desc')->paginate(10);
    return view('manage.applications.index')->withApplications($applications);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
    $vacancies = Vacancy::all();
    return view('manage.applications.create')->withVacancies($vacancies);
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
      'email' => 'required|email',
      'school' => 'required|max:255',
      'vacancy_id' => 'required',
      'motivation_letter' => 'required|max:10000'
    ]);

    //handle file uopz_overload
    if ($request->hasFile('motivation_letter')) {
      //get filename with the extension
      $fileNameWithExt = $request->file('motivation_letter')->getClientOriginalName();
      //get just fileName
      $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
      //get just ext
      $extension = $request->file('motivation_letter')->getClientOriginalExtension();
      //file name to Store
      $fileNameToStore=$filename.'_'.time().'.'.$extension;
      //upload
      $path = $request->file('motivation_letter')->storeAs('public/ml', $fileNameToStore);
    } else {
      $fileNameToStore = 'noimage.jpg';
    }

    $application = new Application();

    $application->name = $request->name;
    $application->email = $request->email;
    $application->school = $request->school;

    $application->motivation_letter = $fileNameToStore;

    $application->vacancy_id = $request->vacancy_id;

    $application->save();

    return redirect()->route('applications.index')->with('success', 'Your application has been successful');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Application  $application
  * @return \Illuminate\Http\Response
  */
  public function show(Application $application)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Application  $application
  * @return \Illuminate\Http\Response
  */
  public function edit(Application $application)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Application  $application
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Application $application)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Application  $application
  * @return \Illuminate\Http\Response
  */
  public function destroy(Application $application)
  {
    //
  }
}
