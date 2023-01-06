<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'thread_name',
        'thread_email',
        'thread_description',
        'thread_logo',
        'thread_favicon',
    ];

    public function getBlogLogoAttribute($value){
        return asset('back/dist/img/logo-favicon/'.$value);
    }
}
