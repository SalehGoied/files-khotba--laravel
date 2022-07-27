@extends('layouts.app')

@section('content')
<div class="container">
        <h1 align="center">{{ $file->name }}</h1>
        <p class="col-8 offset-2" align="right">{{$file->description}}</p>
        <br>

        @can('update', $file)

            <div>

            <div align="right" class="pb-1 col-8 offset-2">
                <button class="btn btn-primary" ><a class="text-white" href="/files/{{ $file->id }}/edit">Edit File</a></button>
            </div>
            
            <form action="/files/{{ $file->id }}/delete"  method="POST">
                @method('DELETE')
                @csrf

                <div align="right" class="pb-5 col-8 offset-2">
                    <button class="btn btn-danger text-white" >Delete File</button>
                </div>

            </form>

        </div>
            
        @endcan

        <div class="row h-300 pb-10">
            <div class="col-8 offset-2">
                
                <iframe 
                    src="{{ $file->file_path}}"
                    frameborder="0"
                    scrolling="auto"
                    height="500px"
                    width="100%"

                ></iframe>
            </div>
        </div>
        <hr>

        <div align="right" class="pb-5 col-8 offset-2">
            <button class="btn btn-primary" ><a class="text-white" href="/comment/{{ $file->id }}">write Comment</a></button>
        </div>


        <h2 align="center">Comments</h2>
        @foreach ($comments as $comment)

            <table dir="rtl" class="table table-bordered">
                <tbody>
                    <tr align="right">
                        <td class="col-2" scope="row"><a class="text-dark" href="/profile/{{ $comment->user->id }}">{{ $comment->user->name }}</a></td>
                        <td scope="col-10">{{ $comment->comment }}</td>
                    </tr>
                </tbody>
            </table>

        @endforeach
</div>
@endsection
