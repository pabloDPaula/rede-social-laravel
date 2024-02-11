<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $with = ['comments', 'user'];

    protected $fillable = [
        'content',
        'likes',
        'user_id',
        'media'
    ];

    protected $casts = [
        'media' => AsCollection::class
    ];

    protected $withCount = ['likes'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Retorna todos os usuários que deram like nesse post
    public function likes()
    {
        return $this->belongsToMany(User::class, 'post_like');
    }

    public function scopeSearch($query, $search = '')
    {
        $query->where('content', 'like', "%" . $search . "%");
    }

    public function getImageURL($media)
    {
        return url("storage/post/media/$media");
    }
}
