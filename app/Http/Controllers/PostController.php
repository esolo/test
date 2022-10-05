<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Mechanic;
use App\Models\Phone;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $user = User::find(1);
//        dump($user->phone->number);

//        $phone = Phone::find(1);
//        dump($phone->user->name);


//        $post = Post::find(1);
//        dump($post->comment->toArray());

//        $comment = Comment::find(1);
//        dump($comment->post->user->phone->number);

//        $user = User::find(1);
//        $user = User::whereIn('id', [1,2,3])->get();
//        dump($user);
//        $posts = Post::where('user_id', $user->id)->get();
//        $posts = Post::whereBelongsTo($user)->get();
//        dump($posts);

//        $mechanic = Mechanic::find(2);
//        dump($mechanic->carOwner);

//        $category = Category::find(3);
//        dump($category->posts->first());

        $post = Post::find(1);
        dump($post->categories->pluck('id')->toArray());





        echo '<hide></hide>';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
