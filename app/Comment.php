<?php

namespace App;

use Auth;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{

    protected $fillable = ['text'];

    public function article()
    {
      return $this->belongsTo(Article::class);
    }

    public function user ()
    {
      return $this->belongsTo(User::class);
    }

}
