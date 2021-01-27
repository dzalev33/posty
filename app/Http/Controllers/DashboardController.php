<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){

        $clients = Client::paginate(20);
        return view('dashboard', [
            'clients' => $clients,


        ]);
    }
}
