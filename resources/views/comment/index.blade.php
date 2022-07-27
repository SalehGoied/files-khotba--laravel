@extends('layouts.app')

@section('content')
<div class="container w-500 ">
    
    <form action="/comment/{{ $file->id }}" method="post">
        @csrf

        <div class="row">
            <div class="col-8 offset-2">
                
                <div class="row">
                    <h1>Add Comment</h1>
                </div>
        
                <div class="form-group row">
                    <label for="comment" class="col-md-4 col-form-label ">Comment</label>
        
                        <input 
                        id="comment" 
                        type="text" 
                        class="form-control @error('comment') is-invalid @enderror" 
                        name="comment" 
                        value="{{ old('comment') }}" autocomplete="comment" autofocus>
        
                        @error('comment')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
    
                <div class="row pt-4">
                    <button class="btn btn-primary">Save Editing</button>
                </div>
    
            </div>
        </div>
    </form>

</div>
@endsection
