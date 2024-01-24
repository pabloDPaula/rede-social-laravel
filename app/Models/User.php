<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class)->latest();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function getImageURL()
    {
        if ($this->image) {
            return url("storage/$this->image");
        }

        return "https://api.dicebear.com/6.x/fun-emoji/svg?seed={$this->name}";
    }

    // Quem estamos seguindo
    // follower_id = nosso id
    // user_id = id dos outros
    public function followings(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follower_user', 'follower_id', 'user_id');
    }

    // Quem está nos seguindo
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follower_user', 'user_id', 'follower_id');
    }

    // Verifica se a pessoa está nos seguindo ou não, true ou false
    public function follows(User $user)
    {
        return $this->followings()->where('user_id', $user->id)->exists();
    }

    // Retorna todos os posts que o usuário deu like
    public function likes()
    {
        return $this->belongsToMany(Post::class, 'post_like');
    }

    // Verifica se o usuário deu like em um post em específico
    public function likePost(Post $post)
    {
        return $this->likes()->where('post_id', $post->id)->exists();
    }
}
