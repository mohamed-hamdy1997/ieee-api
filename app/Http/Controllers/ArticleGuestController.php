<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class ArticleGuestController extends Controller
{
    public function index()
    {
        $posts =   Post::orderBy('created_at','desc')->paginate(5);
//        return PostCollection::collection($posts);
        return view('/welcome' , compact('posts'));
    }

    public function home()
    {
        $posts =   Post::orderBy('created_at','desc')->paginate(1);
//        return PostCollection::collection($posts);
        return view('/layouts/app_home_articles' , compact('posts'));
    }


}
