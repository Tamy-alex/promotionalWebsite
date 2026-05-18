<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AlexRepo;

class AlexController extends Controller
{


    public function index(AlexRepo $repo)
    {
        return view('alex', [
            'repos' => $repo->getRepos()
        ]);
    }



}
