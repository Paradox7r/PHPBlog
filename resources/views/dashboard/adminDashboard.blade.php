@extends('layouts.layoutsForDashboard')


@section('content')
<div class="content1 row no-gutters mt-4">
  <div class="col-12 col-sm-12 col-md-10 offset-md-1">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Статьи</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Пользователи</a>
      </li>

    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active scroll-x" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="mt-4">
          <a href="{{route('articles.create')}}">Создать статью</a>
        </div>
        <table class="table mt-4" style="min-width: 600px">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">title</th>
              <th scope="col">author</th>
              <th scope="col">created_at</th>
              <th scope="col">действия</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($articles as $article)
            <tr>
              <th scope="row">{{$article->id}}</th>
              <td><a href="{{route('articles.show', $article->id)}}">{{$article->title}}</a></td>
              <td>{{$article->author->name}}</td>
              <td>{{$article->created_at}}</td>
              <td>
                <a href="{{route('articles.edit', $article->id)}}">Изменить </a> |
                <a href="{{route('articles.destroy', $article->id)}}"> Удалить</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="center"> {{$articles->links()}} </div>

      </div>

      <div class="tab-pane fade scroll-x" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <table class="table mt-4" style="min-width: 600px">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">name</th>
              <th scope="col">E-mail</th>
              <th scope="col">role</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
              <th scope="row">{{$user->id}}</th>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->role}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="center"> {{$users->links()}} </div>
      </div>

    </div>

  </div>



</div>
@endsection
