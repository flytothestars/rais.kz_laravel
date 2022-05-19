<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postomat;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post = Postomat::all()->count();
        $user = User::all()->count();
        return view('admin.index', [
            'post_count' => $post, 
            'user_count' => $user
        ]);
    }

}
