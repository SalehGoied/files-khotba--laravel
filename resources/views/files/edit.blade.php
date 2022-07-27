@extends('layouts.app')

@section('content')
<div class="container w-500 ">
    <form action="/files/{{ $file->id }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')


        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Edit File</h1>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label ">name</label>
    
                        <input 
                        id="name" 
                        type="text" 
                        class="form-control @error('name') is-invalid @enderror" 
                        name="name" 
                        value="{{ old('name') ?? $file->name }}" autocomplete="name" autofocus>
    
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
        
                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label ">Description</label>
        
                        <input 
                        id="description" 
                        type="text" 
                        class="form-control @error('description') is-invalid @enderror" 
                        name="description" 
                        value="{{ old('description') ?? $file->description }}" autocomplete="description" autofocus>
        
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="row p-4">
                    <div class="col-12 offset-2 d-block">
                        <h5 for="text">تحميل الملف</h5>
                        <input  dir="rtl" type="file" name="file">
                    </div>
                </div>

                <div class="row pt-4">
                    <button class="btn btn-primary">Save Editing</button>
                </div>
    
            </div>
        </div>
    </form>

</div>
@endsection
