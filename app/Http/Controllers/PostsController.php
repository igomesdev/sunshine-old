<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Images;
use App\User;
use Intervention\Image\facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');

    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

        return view('posts.index', [
                'posts' => $posts,
            ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'description' => 'max:2100',
            'city' => 'required',
            'reception' => '',
            'bathrooms' => '',
            'rooms' => '',
            'price' => 'required',
            'image' => ['required', 'image']
        ]);

        $imagePath = request('image')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(900, 800);
        $image->save();

        auth()->user()->posts()->create([
            'description' => $data['description'],
            'price' => $data['price'],
            'bathrooms' => $data['bathrooms'],
            'rooms' => $data['rooms'],
            'city' => $data['city'],
            'reception' => $data['reception'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(Post $post)
    {
        $users = DB::table('posts')->pluck('posts.user_id');
        $userPost = Post::where('user_id', $users)->latest()->paginate(9);
        $posts = DB::table('posts')->latest()->paginate(9);

        return view('posts.show', [
           'post' => $post,
           'posts' => $posts,
           'userPost' => $userPost
        ]);
    }

    public function edit($post) {

        $postId = Post::find($post);
        return view('posts.edit', [
            'postId' => $postId
        ]);
    }

    public function update($post, Request $request, $length = 24) {

        $postId = Post::find($post);

        if($request->hasFile('img'))
        {
            $images = $request->file('img');
            if(!empty($images)):
                foreach ($images as $image):
                    $image_size = $image->getSize();
                    $image_ext = $image->getClientOriginalExtension();
                    $image_original_name = $image->getClientOriginalName();
                    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $new_image_name = substr(str_shuffle(str_repeat($pool, $length)), 0, $length).".".$image_ext;
                    $destination_path = public_path("/images");
                    $image->move($destination_path, $new_image_name);

                    $images = new Images;
                    $images->user_id = auth()->user()->id;
                    $images->post_id = $postId->id;
                    $images->name = $new_image_name;
                    $images->original_name = $image_original_name;
                    $images->path = $destination_path;
                    $images->image_size = $image_size;
                    $images->save();
                endforeach;
            endif;

            return redirect('/p/' . $postId->id);
        } else {
            return back()->with('msg', 'Please Choose any image file');
        }
    }
}
