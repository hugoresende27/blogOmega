<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;



class Post extends Model
{
    use HasFactory;
    use Sluggable;


    protected $fillable = ['title','slug','description','image','user_id','movie_rate'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sluggable():array   //forçar return array
    {
        return[
            'slug'=> [
                'source'=>'title',
                ]
            ];
    }

    /**
     * Get all of the comments for the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()//: HasMany
    {
        return $this->hasMany(Comment::class, 'id', 'post_id');
    }
}
