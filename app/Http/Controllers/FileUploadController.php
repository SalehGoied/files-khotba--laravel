<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('upload.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        // dd($req->file);
        $data = $req->validate([
            'name'=> 'required',
            'description'=> '',
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
            ]);
    
            // $fileModel = new File;
            if($req->file()) {
                $name = time().'_'.$req->file->getClientOriginalName();
                $filePath = '/storage/'.$req->file('file')->storeAs('uploads', $name, 'public');
                
                // $data['file'] = $fileModel->file_path;
                // dd($data);
                
                /** @var \App\User $user */
                $user = auth()->user();
                $files = $user->files()->create(array_merge(
                    $data,
                    ['file_path'=> $filePath]
                ));
                // dd($files);
    
                return redirect('/files');
            }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
