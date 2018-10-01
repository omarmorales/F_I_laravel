<?php

namespace App\Http\Controllers;

use App\files_pst;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilesPstController extends Controller
{
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
      $this->validateWith([
        'file' => 'sometimes'
      ]);

      //handle file uopz_overload
      if ($request->hasFile('file')) {
        //get filename with the extension
        $fileNameWithExt = $request->file('file')->getClientOriginalName();
        //get just fileName
        $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //get just ext
        $extension = $request->file('file')->getClientOriginalExtension();
        //file name to Store
        $fileNameToStore=$filename.'_'.time().'.'.$extension;
        //upload
        $path = Storage::disk('spaces')->putFileAs('IDEA/files', $request->file('file'), $fileNameToStore, 'public');
      } else {
        $fileNameToStore = 'noimage.jpg';
      }

      $new_file = new files_pst();

      $new_file->file = $fileNameToStore;
      $new_file->post_id = $request->post_id;

      $new_file->save();

      return redirect()->back()->with('success', "New file added");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\files_pst  $files_pst
     * @return \Illuminate\Http\Response
     */
    public function show(files_pst $files_pst)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\files_pst  $files_pst
     * @return \Illuminate\Http\Response
     */
    public function edit(files_pst $files_pst)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\files_pst  $files_pst
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, files_pst $files_pst)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\files_pst  $files_pst
     * @return \Illuminate\Http\Response
     */
    public function destroy(files_pst $files_pst)
    {
      Storage::disk('spaces')->delete('/IDEA/files/'. $files_pst->file);
      $files_pst->delete();
      return redirect()->back()->with('success', "File deleted successfully");
    }
}
