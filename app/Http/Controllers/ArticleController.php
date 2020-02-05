<?php

namespace App\Http\Controllers;

use Auth;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(6);

        return view('articles.showArticles', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createArticleForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
          'title' => 'required|unique:articles',
          'text' => 'required|min:100',
          'image' =>'required'
       ]);

      $article = new Article();
      $article->user_id = Auth::id();
      $article->fill($request->all());
      $article->uploadImage($request->file('image'));
      $article->save();

      return redirect()
          ->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $article = Article::findOrFail($id);

      return view('articles.showArticle', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $article = Article::findOrFail($id);

      return view('updateArticleForm', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $article = Article::findOrFail($id);

      $this->validate($request, [
          'title' => 'required|unique:articles,title' . $article->id,
          'text' => 'required|min:100',
          'image' =>'required',
       ]);

      $article->fill($request->all());
      $article->uploadImage($request->file('image'));
      $article->save();

      return redirect()
          ->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        Storage::delete('images' . $article->image);
        if($article) {
          $article->delete();
        }

        return redirect()
            ->route('articles.index');
    }
}
