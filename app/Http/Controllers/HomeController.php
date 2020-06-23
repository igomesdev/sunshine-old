<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Intervention\Image\facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = DB::table('posts')->latest()->paginate(9);
        return view('home.index', [
            'posts' => $posts,
        ]);
    }
}
