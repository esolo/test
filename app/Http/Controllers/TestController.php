<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $post = Post::find(5);
        dump($post->getAttributes());

        dump($post->videos);
        dump($post->audios);

        return 1;
    }
}
