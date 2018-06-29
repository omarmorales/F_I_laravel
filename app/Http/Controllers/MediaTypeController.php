<?php

namespace App\Http\Controllers;

use App\Media_Type;
use Illuminate\Http\Request;

class MediaTypeController extends Controller
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $this->validateWith([
        'name' => 'required|max:255',
      ]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Media_Type  $media_Type
     * @return \Illuminate\Http\Response
     */
    public function show(Media_Type $media_Type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Media_Type  $media_Type
     * @return \Illuminate\Http\Response
     */
    public function edit(Media_Type $media_Type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Media_Type  $media_Type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media_Type $media_Type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Media_Type  $media_Type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media_Type $media_Type)
    {
        //
    }
}
