<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;
//use Faker\Provider\Image;      ---> this is the wrong method
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create(){
        return view('posts.create ');
    }

    public function index(){
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(3);
//        $posts = Post::whereIn('user_id', $users)->latest()->get();
//        $posts = Post::whereIn('user_id', $users)->orderby('created_at', 'DESC')->get();
//        dd($posts);
        return view('posts.index', compact('posts'));
    }

    public function store(){

        $data = request()->validate([
//            'another' => '',
             'caption' => 'Required',
//            'image' => 'required|image',
            'image' => ['Required', 'image'],

        ]);
        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);
//        \App\Models\Post::create($data);
//        dd(request()->all());
        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(\App\Models\Post $post){
//        dd($post);
        $image = Image::make(public_path("storage/{$post->image}"))->fit(500,500);
        $image->save();

        return view('posts.show', compact('post'));

    }
}
