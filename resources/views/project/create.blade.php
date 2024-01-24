@extends('layouts.app')

@section('title', '- إنشاء مشروع جديد')

@section('content')
<div class="row justify-content-center  text-right">
    <div class="col-10 col-xl-7 card p-5 mt-5">
        <h3 class="text-center pb-5 font-weight-bold">مشروع جديد</h3>
        <form method="post" action="/projects" dir="rtl">
            @csrf
   
            
    <div class="form-group">
        <label for="title">عنوان المشروع</label>
        <input name="title" type="text" class="form-control @error('title') is-invalid @enderror>
        @error('title')
            <div class="text-danger mt-2"><small>{{ $message }}</small></div>
        @enderror
    </div>
    <input type="hidden" name="user_id">
    <div class="form-group mt-4">
        <label for="title">وصف المشروع</label>
        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5"></textarea>
        @error('description')
            <div class="text-danger mt-2"><small>{{ $message }}</small></div>
        @enderror
    </div>
            <div class="form-group mt-5">
                <button type="submit" class="btn btn-primary px-4 px-sm-5">إنشاء</button>
                <a href="/projects" class="btn btn-light px-4 px-sm-5">إلغاء</a>
            </div>

        </form>
    </div>
</div>
@endsection
