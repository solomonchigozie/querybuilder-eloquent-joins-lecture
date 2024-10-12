<?php

use App\Models\Address;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/**
 * JOINS WITH QUERY BUILDER
 */
Route::get('/joins', function(){
    /**
     * inner joins will ommit the rows that are not avaialable in the relative table 
     * to be joined with.
     * 
     * that means the data must exist in both of the tables for it to be displayed
     */
    $innerJoins = DB::table('users')
        ->join('orders','users.id','=','orders.user_id')
        ->select('users.*','orders.*')
        ->get();
    // dd($innerJoins);

    $leftJoins = DB::table('users')
        ->leftJoin('orders','users.id','=','orders.user_id')
        ->select('users.name','orders.product_name')
        ->get();
    // dd($leftJoins);

    $rightJoins = DB::table('orders')
        ->rightJoin('users','users.id','=','orders.user_id')
        ->select('orders.product_name','users.name')
        ->get();

    // dd($rightJoins);

    $fullOuterJoins = DB::table('users')
    ->leftJoin('orders','users.id','=','orders.user_id')
    ->select('users.name','orders.product_name')
    ->unionAll(
        DB::table('orders')
        ->rightJoin('users','users.id','=','orders.user_id')
        ->select('orders.product_name','users.name')
    )
    ->get();

    dd($fullOuterJoins);
});

Route::get('/relations', function(){
    $users = User::all();
    $addresses = Address::all();
    return view('relations', compact('users','addresses'));
});

Route::get('/posts', function() {
    // Tag::insert([
    //     [
    //         'name'=> 'Javascript',
    //     ],
    //     [
    //         'name' => 'PHP'
    //     ],
    //     [
    //         'name'=>'Laravel'
    //     ]
    // ]);

    //give tags to post
    // $post = Post::find(2);
    // $post = Post::first();
    // $tag = Tag::first();

    /**
     * the tags you will be assigning to the post will be stored in the
     * pivot table post_tag
     */
    // $post->tag()->attach($tag);
    // $post->tag()->attach([2,3]);
    //detach to remove
    // $post->tag()->detach([2]);
    /**
     * sync() automatically attach and detach tags
     */
    // $post->tag()->sync([3,2]);
    
    $posts = Post::all();
    return view('posts', compact('posts'));
});

Route::get('/tags', function(){
    $tags = Tag::all();
    return view('tag', compact('tags'));
});

Route::get('/users', function(){
    $users = User::all();
    return view('users', compact('users'));
});