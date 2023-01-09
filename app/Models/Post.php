<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

//post model where I assign the defining values of a post, allow for easier storage of post information, and allow for searching terms within a post.
class Post extends Model
{
    use HasFactory;
    use Sluggable;

    //a post has the defining properties of: a author_id, category_id, post_title, post_slug, post_content, a featured_image
    protected $fillable = [
        'author_id',
        'category_id',
        'post_title',
        'post_slug',
        'post_content',
        'featured_image',
    ];

    //assigning a slug to every post, this is for easier retrival/display of post information
    public function sluggable(): array
    {
        return [
            'post_slug' => [
                'source' => 'post_title'
            ]
        ];
    }

    //scopeSearch takes a Query, and a Term. Queries are compared to terms, returning terms equal to query.
    public function scopeSearch($query,$term){
        $term = "%$term%";
        $query->where(function($query) use ($term){
            $query->where('post_title','like',$term);
        });
    }
}
