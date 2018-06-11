<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
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
    $employees = Employee::orderBy('id', 'desc')->paginate(10);
    return view('manage.employees.index')->withEmployees($employees);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
    return view('manage.employees.create');
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
      'job_title' => 'required|max:255',
      'description' => 'sometimes|max:255'
    ]);

    //handle file uopz_overload
    if ($request->hasFile('thumbnail')) {
      //get filename with the extension
      $fileNameWithExt = $request->file('thumbnail')->getClientOriginalName();
      //get just fileName
      $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
      //get just ext
      $extension = $request->file('thumbnail')->getClientOriginalExtension();
      //file name to Store
      $fileNameToStore=$filename.'_'.time().'.'.$extension;
      //upload
      $path = $request->file('thumbnail')->storeAs('public/thumbnails', $fileNameToStore);
    } else {
      $fileNameToStore = 'noimage.jpg';
    }

    $employee = new Employee();

    $employee->name = $request->name;
    $employee->job_title = $request->job_title;
    $employee->description = $request->description;

    $employee->puesto = $request->puesto;
    $employee->descripcion = $request->descripcion;

    $employee->thumbnail = $fileNameToStore;
    $employee->public = $request->public;

    $employee->save();

    return redirect()->route('employees.index')->with('success', 'Employee created successfully');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Employee  $employee
  * @return \Illuminate\Http\Response
  */
  public function show(Employee $employee)
  {
    //
    return view('manage.employees.show')->withEmployee($employee);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Employee  $employee
  * @return \Illuminate\Http\Response
  */
  public function edit(Employee $employee)
  {
    //
    return view('manage.employees.edit')->withEmployee($employee);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Employee  $employee
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Employee $employee)
  {
    //
    $this->validateWith([
      'name' => 'required|max:255',
      'job_title' => 'required|max:255',
      'description' => 'sometimes|max:255'
    ]);

    //handle file uopz_overload
    if ($request->hasFile('thumbnail')) {
      //get filename with the extension
      $fileNameWithExt = $request->file('thumbnail')->getClientOriginalName();
      //get just fileName
      $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
      //get just ext
      $extension = $request->file('thumbnail')->getClientOriginalExtension();
      //file name to Store
      $fileNameToStore=$filename.'_'.time().'.'.$extension;
      //upload
      $path = $request->file('thumbnail')->storeAs('public/thumbnails', $fileNameToStore);
    } else {
      $fileNameToStore = 'noimage.jpg';
    }

    $employee->name = $request->name;
    $employee->job_title = $request->job_title;
    $employee->description = $request->description;

    $employee->puesto = $request->puesto;
    $employee->descripcion = $request->descripcion;

    if ($request->hasFile('thumbnail')) {
      $employee->thumbnail = $fileNameToStore;
    }
    $employee->public = $request->public;

    $employee->save();

    return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Employee  $employee
  * @return \Illuminate\Http\Response
  */
  public function destroy(Employee $employee)
  {
    //
  }
}
