<?php

namespace App\Http\Controllers;

use App\Comment;
use App\File;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(File $file){
        $comments = Comment::all();
        return view('comment.index', compact('file'));
    }

    
    public function create(File $file){
        
        Request()->validate([
            'comment'=> 'required'
        ]);

        /** @var \App\User $user */
        $user = auth()->user();
        $data = $user->comments()->create([
            'comment'=> Request()->comment,
            'file_id'=> $file->id
        ]);
        // dd($data);

        return redirect('/files/'.$file->id);
    }
}
