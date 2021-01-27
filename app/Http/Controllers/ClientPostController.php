<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class ClientPostController extends Controller
{
    public function index(Client $client){

        $posts = $client->posts()->with(['user', 'likes'])->paginate(20);
        return view('users.posts.index', [
            'client' => $client,
            'posts' => $posts
        ]);
    }
}
