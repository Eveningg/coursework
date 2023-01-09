<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'picture',
        'biography',
        'type',
        'blocked',
        'direct_publish'
    ];

    /**
     * Hidden values for serialization.
     *
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * A Author Type (admin/standard) has an ID.
     */
    public function authorType(){
        return $this->belongsTo(Type::class,'type','id');
    }

    /**
     * If a user has no profile picture, 
     * assignened the default profile picture (a dog)
     * otherwise assign them their personal pfp.
     */
    public function getPictureAttribute($value){
        if($value){
            return asset('back/dist/img/authors/'.$value);
        }else{
            return asset('back/dist/img/authors/default-img.png');
        }
    }

    public function scopeSearch($query, $term){
         $term = "%$term%";
         $query->where(function($query) use ($term){
             $query->where('name','like',$term)
                 ->orWhere('email','like',$term);
         });
    }

    //Authors can 'have many' posts assigned to them.
    public function posts(){
        return $this->hasMany(Post::class,'author_id','id');
    }
}
