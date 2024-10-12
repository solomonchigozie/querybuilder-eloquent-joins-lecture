<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','name'
    ];

    function user(){
        return $this->belongsTo(User::class);
    }

    function tag(){
        /**
         * always create a pivot table to be able to use belongsToMany
         * in this file the pivot table is the post_tag table and it should follow 
         * an alphabetical order
         * 
         */
        /**
         * when you dont follow laravel's convention of creating 
         * pivot tables, you need to specify the folllowing
         */
        // return $this->belongsToMany(Tag::class, 'post_tag','post_id','tag_id');
        
        /**
         * when we follow the convention, then we don't need to bother about
         * pivot table and foreignkeys 
         */
        return $this->belongsToMany(Tag::class);
    }

    function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
    
}
