<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class ClientItemController extends Controller
{
    public function index(Client $client){

        $posts = $client->posts()->with(['client'])->paginate(20);
        return view('clients.items.index', [
            'posts' => $posts
        ]);
    }

    // function to display preview
    public function preview()
    {
        $client  = Client::all();
        $posts = $client->posts()->with(['client'])->paginate(20);
        return view('preview')->with(['posts' => $posts]);
    }

    public function generatePDF(Client $client)
    {
        $posts = $client->posts()->with(['client'])->paginate(20);
        $pdf = PDF::loadView('preview')->with(['posts' => $posts]);
        return $pdf->download('demo.pdf');
    }
}
