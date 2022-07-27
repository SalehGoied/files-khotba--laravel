{{-- @extends('layouts.app')

@section('content')
<div class="container w-500 ">
    
    <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')


        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Edit Profile</h1>
                </div>

                <div class="form-group row">
                    <label for="Image" class="col-md-4 col-form-label ">Image</label>
        
                    <input type="file" class="form-control-file" id="image" name="image">
        
                    @error('image')
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
                        value="{{ old('description') ?? $user->profile->description }}" autocomplete="description" autofocus>
        
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label ">Address</label>
    
                        <input 
                        id="address" 
                        type="text" 
                        class="form-control @error('address') is-invalid @enderror" 
                        name="address" 
                        value="{{ old('address') ?? $user->profile->address }}" autocomplete="address" autofocus>
    
                        @error('address')
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
@endsection --}}
