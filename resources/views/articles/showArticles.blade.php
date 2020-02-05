@extends('layouts.layoutsMain')

@section('content')
  @foreach ($articles as $article)
    <div class="row no-gutters pb-5">
      <div class="col-auto mb-4 center-img float-left">
        <img style="width: 270px;" class=" float-left" src="/images/{{$article->image}}" alt="Картинка">
      </div>
  <!-- col-12 col-sm-12 col-md-8 col-lg-8 col-xl-9 -->
      <div class=" col-sm-6 col-md-6 col-lg-7 col-xl-8 px-4">
      <div class="h4 font-weight-bold " style="word-wrap: break-word;">{{$article->title}}</div>
        <div style="word-wrap: break-word;">{{Str::limit($article->text, 300)}}</div>
        <a href="articles/{{$article->id}}" ><button type="button" class="btn btn-outline-primary mt-3">Читать</button></a>
      </div>

    </div>
    <hr>


  @endforeach
  <div class="center"> {{$articles->links()}} </div>
@endsection
