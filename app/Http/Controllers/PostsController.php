<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Images;
use App\User;

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
        $postId = $post->id;
        $userId = Post::where('id', $postId)->pluck('user_id');
        $userPost = Post::where('user_id', $userId)->latest()->paginate(9);
        $posts = Post::latest()->paginate(9);

        return view('posts.show', [
            'post' => $post,
            'posts' => $posts,
            'userPost' => $userPost
        ]);
    }

    public function edit(Post $post) {

        //$postId = Post::find($post);
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Post $post) {
        $postId = $post->id;

        $data = request()->validate([
            'description' => 'max:2100',
            'city' => 'required',
            'reception' => '',
            'bathrooms' => '',
            'rooms' => '',
            'price' => 'required',
            'image' => ['required', 'image']
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('uploads', 'public');
            $imageArray = ['image' => $imagePath];
        }

        Post::where('id', $postId)->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect('/p/' . $postId);

        /*
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
        */
    }
}
