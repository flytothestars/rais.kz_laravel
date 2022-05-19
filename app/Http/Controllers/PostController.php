<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postomat;

class PostController extends Controller
{
    //API Controller
    public function list()
    {
        $post = Postomat::all();

        return response([
            'message' => 'true',
            'post' => $post,
        ]);
    }
    
}
