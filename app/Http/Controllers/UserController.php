<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;

class UserController extends Controller
{
    public function dashboard()
    {
      $articles = Article::orderBy('created_at', 'desc')->paginate(20);
      $users = User::orderBy('created_at', 'desc')->paginate(20);

      return view('dashboard.adminDashboard', compact('articles','users'));
    }
}
