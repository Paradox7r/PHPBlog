<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{

   protected $fillable = ['title', 'text', 'image'];


    public function author()
    {
      return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
      return $this->hasMany(Comment::class);
    }

    public function uploadImage($image)
    {

      if($image == null) { return; }
      Storage::delete('images' . $this->image);


      $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
      $filename = str_shuffle($permitted_chars) . '.' . $image->extension();
      Storage::putFileAs('images', $image, $filename);
    	$this->image = $filename;
    	$this->save();
    }
}
