@extends('layouts.layoutsMain')

<?php
function tags($string)
{

$patterns = array();
$patterns[0] = '~&lt;~';
$patterns[1] = '~&gt;~';
$replacements = array();
$replacements[0] = '<';
$replacements[1] = '>';

echo preg_replace($patterns, $replacements, $string);
}
?>

@section('content')
    <div class="px-2">
      <div class="col-12 col-sm-12 col-md-12 col-lg-10 offset-lg-1">
      <div> <img style="width: 85%;" class="mb-4 center-img" src="/images/{{$article->image}}" alt="Картинка"> </div>
        <div class="h4 font-weight-bold " style="word-wrap: break-word;">{{$article->title}}</div>
        <div style="word-wrap: break-word; width: 99%;"><p style="white-space: pre-wrap;">{{tags($article->text)}}</p></div>
        <h5 class="float-right mr-5"> Автор: {{$article->author->name}}</h5>
      <br>
      <br>
      <br>
      <br>






    <div class="form-group">
    <label for="exampleFormControlTextarea1" class="h5 font-weight-bold">Комментарий</label>
    <form action="{{ route('comment.add', $article->id) }}" method="post">
       @csrf
      <textarea class="col-md-8 col-sm-12 form-control  @error('text') is-invalid @enderror" id="text" rows="6" name="text"></textarea>
      @error('text')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      <button type="submit" class="btn btn-primary mt-3">Отправить</button>
      </form>
    </div>


    <hr>
    <div class="mx-3 mb-4">
      @foreach ($article->comments->all() as $comment)
        @if($comment->user->role == 1)
        <h5 style="color:red"> {{$comment->user->name}}</h5>
        @else
        <h5 style="color:blue"> {{$comment->user->name}}</h5>
      @endif

        <p class="" style="white-space: pre-wrap; word-wrap: break-word;"> {{$comment->text}}</p>
      @endforeach
    </div>
  </div>
    </div>
@endsection
