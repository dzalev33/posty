<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {  $clients = Client::all();
        $posts = Post::latest()->with(['user', 'likes'])->paginate(20);
        return view('posts.index',[
            'posts' => $posts,
            'clients' => $clients
        ]);
    }

    public function show(Post $post){
        return view('posts.show', [
            'post' =>$post
        ]);
    }


    public function store(Request $request){

     $this->validate($request, [
            'client_id' => 'required',
            'item_npn' => 'required',
            'item_receiver' => 'required',
            'item_status' => 'required',
            'package_id' => 'required',
            'item_delivery_date' => 'required',
            'item_body' => 'required',

     ]);
        Post::create([

            'user_id' =>  auth()->id(),
            'client_id' => $request->client_id,
            'item_npn' => $request->item_npn,
            'item_receiver' => $request->item_receiver,
            'item_status' => $request->item_status,
            'item_delivery_date' => $request->item_delivery_date,
            'item_body' => $request->item_body,
            'package_id' => $request->package_id

        ]);
//       $request->user()->posts()->create($request->all());

       return back();
    }

    public function destroy(Post $post){
//        $this->authorize('delete', $post);
        $post->delete();
        return back();
    }
}
