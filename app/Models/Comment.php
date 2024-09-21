<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
  use HasFactory;

  protected $fillable = ['id', 'account_id', 'comment_id', 'post_id', 'comment_content', 'change_password_at'];

  public function account()
  {
    return $this->belongsTo(Account::class);
  }

  public function replies()
  {

    return $this->hasMany(Comment::class);
  }

  public function getNumberAttribute()
  {

    return $this->replies()->count();
  }

  public function count($id)
  {
    $count = Comment::where('post_id', $id)
      ->where('comment_id', NULL)
      ->get()
      ->count();

    return $count;
  }

  public function getLikeAttribute()
  {
    return $this->hasMany(Like::class)
      ->where('comment_id', $this->id)
      ->count();
  }

  public function likes()
  {

    return $this->hasMany(Like::class);
  }

  public function post()
  {
    return $this->belongsTo(Post::class);
  }

  public function getCheckAttribute()
  {
    $likes =$this->likes;
    $check = 0;
    foreach ($likes as $like) {
        if ($like->account_id == Auth::id() && $like->post_id == $this->post_id) {}
      $check = 1;
       break;
    }
    return $check;
  }
}
