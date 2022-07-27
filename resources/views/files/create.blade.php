@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-10">

        <h1 align="center">تحميل الخطبة</h1>

        <form align="right" action="/files" enctype="multipart/form-data" method="POST">
            @csrf
            
            <div class="row p-4">
                <div class="col-12 offset-2 d-flex-block">
                    <h5 for="text">:أسم الخطبة</h5>
                    <input class="w-100"  dir="rtl" type="text" name="name">
                </div>
            </div>

            <div class="row p-4">
                <div class="col-12 offset-2 d-flex-block">
                    
                    <label for="categroy">Choose a Categroy:</label>
                    <select name="category_id" id="categroy">

                        @foreach ($categroies as $categroy)
                            <option value="{{ $categroy->id }}">{{ $categroy->category }}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            
            
            <div class="row p-4">
                <div class="col-12 offset-2 d-flex-block">
                    <h5 for="text">:الوصف</h5> 
                    <textarea class="w-100"  dir="rtl" type="text" name="description"></textarea>
                </div>
            </div>
    
            <div class="row p-4">
                <div class="col-12 offset-2 d-block">
                    <h5 for="text">تحميل الملف</h5>
                    <input  dir="rtl" type="file" name="file">
                </div>
            </div>
    
            <div class="row p-4">
                <div class="col-12 offset-2">
                    <button class="btn btn-primary">تأكيد</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection