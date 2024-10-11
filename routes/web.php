<?php

use App\Models\Address;
use App\Models\Post;
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
    // Post::insert([
    //     [
    //         'user_id' => 1,
    //         'name'=> 'how to cook noodles',
    //     ],
    //     [
    //         'user_id'=>1,
    //         'name' => 'learn karate'
    //     ],
    //     [
    //         'user_id'=>2,
    //         'name'=>'how to make shoes'
    //     ]
    // ]);
    $posts = Post::all();
    return view('posts', compact('posts'));
});

Route::get('/users', function(){
    $users = User::all();
    return view('users', compact('users'));
});