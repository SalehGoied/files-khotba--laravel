@extends('layouts.app')

@section('content')
<div class="container">

    @foreach ($files as $file)
        <div class="row h-300 pb-10" align="right">
            <div class="col-8 offset-2">
                <a class="text-dark" href="/files/{{$file->id}}">
                    <h1>{{ $file->name }}</h1>
                </a>
                <p>{{ $file->description }}</p>
            </div>
        </div>
        <h6 align="right" dir="rtl">Auther: <a href="/profile/{{ $file->user->id }}">{{ $file->user->name}}</a></h6>
        
        <hr>
    @endforeach

    <div class="row"  align="center">
        <div align="center" class="col-12 d-flex justfay-align-center">
            {{ $files->links() }}
        </div>
    </div>
</div>
@endsection