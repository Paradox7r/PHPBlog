@extends('layouts.layoutsMain')

@section('content')




<form enctype="multipart/form-data" class="px-4 mb-4 mt-4" method="post" action="{{ route('articles.store') }}" >
  @csrf
  <div class="form-group">
    <label class="h4 font-weight-bold">Заголовок</label>
    <input id="title" type="text" class="form-control  @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
    @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>


  <div class="form-group">
    <label for="exampleFormControlTextarea1" class="h4 font-weight-bold">Текст</label>
    <textarea class="form-control  @error('text') is-invalid @enderror" id="text" rows="18" name="text"> {{ old('text') }} </textarea>
    @error('text')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
    <div class="form-group">
    <input style="border: none; " id="image" name="image" type="file" class="btn btn-primary @error('image') is-invalid @enderror">
    @error('image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
    <button type="submit" class="btn btn-primary">Создать</button>
</form>
@endsection
