<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Application;
use App\Mail\ApplicationCreated;
use App\Vacancy;
use Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
  public function __construct()
  {
    $this->middleware('permission:delete-application|create-application|read-application|update-application')->except(['store']);
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
      'motivation_letter' => 'required|max:10000',
      'cv' => 'required|max:10000',
      'how_hear_aboutus' => 'required',
      'situation' => 'required',
      'average' => 'required',
      'themes' => 'required',
      'stata' => 'required',
      'future' => 'required',
      'whyinterested' => 'required',
      'whyhireyou' => 'required',
      'comments' => 'required',
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
      $path = $request->file('motivation_letter')->storeAs('public/motivation_letters', $fileNameToStore);
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
      $path = $request->file('cv')->storeAs('public/cvs', $cvNameToStore);
    } else {
      $cvNameToStore = 'noimage.jpg';
    }

    $application = new Application();

    $application->name = $request->name;
    $application->email = $request->email;
    $application->school = $request->school;

    $application->motivation_letter = $fileNameToStore;
    $application->cv = $cvNameToStore;

    $application->how_hear_aboutus = $request->how_hear_aboutus;
    $application->situation = $request->situation;
    $application->average = $request->average;
    $application->themes = $request->themes;
    $application->stata = $request->stata;
    $application->future = $request->future;
    $application->whyinterested = $request->whyinterested;
    $application->whyhireyou = $request->whyhireyou;
    $application->comments = $request->comments;

    $application->vacancy_id = $request->vacancy_id;

    $application->save();

    Mail::send(new ApplicationCreated($application));

    return redirect()->back()->with('success', "Your application to ". $application->vacancy->name .  "has been posted successfully");
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Application  $application
  * @return \Illuminate\Http\Response
  */
  public function show(Application $application)
  {
    return view('manage.applications.show')->withApplication($application);
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
      Storage::delete( public_path('/motivation_letters/' . $application->motivation_letter));
    }

    if ($application->cv != 'noimage.jpg') {
      Storage::delete( public_path('/cvs/' . $application->cv));
    }

    $application->delete();

    return redirect()->route('applications.index')->with('success', 'Vacancy application deleted successfully');
  }
}
