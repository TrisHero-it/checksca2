<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'category_id',
        'username',
        'linkfb',
        'fullname',
        'numberphone',
        'numberbank',
        'namebank',
        'content',
        'images',
        'account_id',
        'status_id',
        'moneys_scam',
        'removed'
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function views()
    {
        return $this->hasMany(Viewer::class);
    }

    public function getCheckRequestAttribute()
    {
        $request = JobRemovePost::query()->where('post_id', $this->id)->first();
        if (isset($request)) {
            if ($request->account_id == Auth::id()) {
                return 1;
            }else {
                return 0;
            }
        }
        return 0;
    }

    public function getCountViewsAttribute() {
        return $this->views()->count();
    }

        public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function getNumberCommentsAttribute()
    {
        return $this->comments()->count();
    }

    public function getCountReportAttribute()
    {
        $posts = Post::query()->get();
        $numberPhone = $this->numberphone  ?? 'Không có';
        $numberBank = $this->numberbank  ?? 'Không có';
        $count = 0;
        foreach ($posts as $post) {
            if ($post->numberphone == $numberPhone || $post->numberbank == $numberBank) {
                $count++;
            }
        }

        return $count;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)
            ->where('comment_id', Null)
            ->orderBy('created_at', 'desc');
    }

   public static function searchPost($query)
   {
        $posts = Post::query()->whereRaw("MATCH(fullname) AGAINST('$query' IN NATURAL LANGUAGE MODE)")
            ->where('status_id', 3)
            ->paginate(10);

       if (count($posts) == 0) {
           $posts = Post::query()->whereRaw("MATCH(numberphone) AGAINST('$query*' IN BOOLEAN MODE)")
               ->where('status_id', 3)
               ->paginate(10);
       }

        return $posts;
   }

}
