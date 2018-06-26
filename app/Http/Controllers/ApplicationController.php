<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
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
      $path = Storage::disk('spaces')->putFileAs('motivation-letters', $request->file('motivation_letter'), $fileNameToStore, 'public');
    } else {
      $fileNameToStore = 'noimage.jpg';
    }

    //handle file uopz_overload
    if ($request->hasFile('cv')) {
      //get filename with the extension
      $cvNameWithExt = $request->file('cv')->getClientOriginalName();
      //get just fileName
      $cvName = pathinfo($cvNameWithExt, PATHINFO_FILENAME);
      //get just ext
      $cvExtension = $request->file('cv')->getClientOriginalExtension();
      //file name to Store
      $cvNameToStore=$cvName.'_'.time().'.'.$cvExtension;
      //upload
      $cvPath = Storage::disk('spaces')->putFileAs('cvs', $request->file('cv'), $cvNameToStore, 'public');
    } else {
      $cvNameToStore = 'noimage.jpg';
    }

    $application = new Application();

    $application->name = $request->name;
    $application->email = $request->email;
    $application->school = $request->school;

    $application->motivation_letter = $fileNameToStore;
    $application->cv = $cvNameToStore;

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
    if ($application->motivation_letter != 'noimage.jpg') {
      //delete de image
      Storage::disk('spaces')->delete('public/motivation-letters/'.$application->motivation_letter);
    }

    if ($application->cv != 'noimage.jpg') {
      Storage::disk('spaces')->delete('public/cvs/'.$application->cv);
    }

    $application->delete();

    return redirect()->route('applications.index')->with('success', 'Vacancy application deleted successfully');
  }
}
