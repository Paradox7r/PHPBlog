<?php

namespace App\Http\Controllers;

use Auth;
use App\Article;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
  public function add(Request $request, $id)
  {
    if(!Auth::check()) {
      return redirect()
          ->route('register');
    }

    $this->validate($request,[
      'text' => 'required',
    ]);

   $comment = new Comment();
   $comment->fill($request->all());
   $comment->user_id = Auth::id();
   $comment->article_id = $id;

   $comment->save();

   return redirect()
      ->route('articles.show', $id);
  }

}
