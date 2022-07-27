@extends('layouts.app')

@section('content')
<div class="container w-500 ">
    <div class="container mt-4 mb-4 p-3 d-flex justify-content-center w-500" style="width: 100%"> 
        <div class="card w-100 p-3"> 
            <div class=" image d-flex flex-column justify-content-center align-items-center"> 
            
                <button  class="btn btn-secondary"> 
                    <img src="{{ $user->profile->profileImage() }}" height="200" width="200" />
                </button> 

                <span class="name mt-3">{{ $user->name }}</span> 
                <span class="idd">{{ $user->profile->address }}</span> 

                {{-- <div class="d-flex flex-row justify-content-center align-items-center gap-2"> 
                    <span class="idd1">Oxc4c16a645_b21a</span> 
                    <span>
                        <i class="fa fa-copy"></i>
                    </span> 
                </div>  --}}

                <div class="d-flex flex-row justify-content-center align-items-center mt-3">
                    <a href="/profile/{{ $user->id }}/files">
                        <span class="number">{{ $user->files->count() }} <span class="follow"> Khutab</span></span> 
                    </a>
                    </div> 

                @can('update', $user->profile)

                    <div class=" d-flex mt-2 pb-4"> 
                        <button class="btn1 btn-dark">
                            <a class="text-white" href="/profile/{{ $user->id }}/edit">Edit Profile</a>
                        </button> 
                    </div>
        
                    <div align="right" class="pb-5">
                        <a href="/files/create" class="btn btn-primary">تحميل خطبة</a>
                    </div>
                    
                @endcan

                <div class="text mt-3"> 
                    <span>{{ $user->profile->description }}</span> 
                </div> 
                
                <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"> 
                    <span><i class="fa fa-twitter"></i></span> 
                    <span><i class="fa fa-facebook-f"></i></span> 
                    <span><i class="fa fa-instagram"></i></span> 
                    <span><i class="fa fa-linkedin"></i></span> 
                </div> 
                
                <div class=" px-2 rounded mt-4 date "> 
                    <span class="join">Joined {{ $user->created_at->format('Y-m-d') }}</span> 
                </div> 

            </div> 
        </div>
    </div>
</div>
@endsection
