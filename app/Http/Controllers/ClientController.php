<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Post;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::latest()->with(['client'])->paginate(20);
        return view('clients.index',[
            'posts' => $posts
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'address' => 'required|max:255',
            'email' => 'required|max:255',
            'type_of_client' => 'required|max:255',
        ]);

        Client::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'address' => $request->address,
            'email' => $request->email,
            'type_of_client' => $request->type_of_client,
        ]);

//        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('dashboard');
    }
}
