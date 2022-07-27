<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\File;
use Illuminate\Http\Request;

class FilesController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::latest()->paginate(5);
        return view('files.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categroies = Category::all();
        // dd($categroies);
        return view('files.create', compact('categroies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        // dd($req);
        $data = $req->validate([
            'name'=> 'required',
            'category_id'=> 'required',
            'description'=> '',
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
            ]);
        // dd($data);
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
    
                return redirect('/profile/'.$user->id.'/files');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        $comments = Comment::where('file_id' , '=', $file->id)->get();
        return view('files.show', compact('file', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        $this->authorize('update', $file);

        return view('files.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,File $file)
    {
        $this->authorize('update', $file);

        $data = $request->validate([
            'name'=> 'required',
            'description'=> 'required',
            'file'=> 'mimes:csv,txt,xlx,xls,pdf|max:2048'
        ]);
        // dd(gettype($data));

        $filepath = $file->file_path;
        // dd($request->file);
        
        if(array_key_exists('file', $data)) {
            $name = time().'_'.$request->file->getClientOriginalName();
            $filepath = '/storage/'.$request->file('file')->storeAs('uploads', $name, 'public');
        }

        $file->update(array_merge(
            $data,
            ['file_path'=> $filepath]
        ));

        return redirect('/files/'.$file->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $this->authorize('update', $file);
        // dd($file);
        $user_id = $file->user->id;
        $file->delete();
        return redirect('/profile/'.$user_id.'/files');
    }
}
