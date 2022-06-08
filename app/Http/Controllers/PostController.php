<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postomat;
use App\Models\User;
use App\Models\history;
use App\Models\Card;
use Carbon\Carbon;


class PostController extends Controller
{
    //API Controller
    //Get list all postomat
    public function list()
    {
        $post = Postomat::all();

        return response([
            'message' => 'true',
            'post' => $post,
        ]);
    }

    //Start rent powerbank
    public function startRent(Request $request)
    {       
        $time =  Carbon::now()->format('Y-m-d H:i:s');
        $history = history::create([
            'id_user' => $request->id_user,
            'id_post_first' => $request->id_post_first,
            'time_start' => $time,
            'is_active' => 'true',
            'count' => 1,    
        ]);
        return response([
            'message' => 'true'
        ]);    
    }

    //Finish rent powerbank
    public function endRent(Request $request)
    {

        error_log($request->id_user);
        $second = $request->id_post_first;
        error_log($second);
        $time =  Carbon::now()->format('Y-m-d H:i:s');
        $his = history::where('id_user', '=' , $request->id_user)
            ->where('is_active', '=', 'true')
            ->first();
        $his->id_post_second = $second;
        $his->time_end = $time;
        $his->is_active = 'false';
        $his->update();

        return response([
            'message' => 'true',
            'data' => $his
        ]);

    }

    //Get history about rent is active if true get data else null
    public function getHistoryIsTrue(Request $request)
    {
        $his = history::where('id_user',$request->id_user)
            ->where('is_active', '=', 'true')
            ->first();
        return response([
            'history' => $his,
        ]);
    }

    //Get just list history
    public function getHistoryOnUser(Request $request){
        $his = history::where('id_user',$request->id_user)->get();
        return response([
            'history' => $his,
        ]);
    }

    //
    public function getUser(Request $request)
    {
        $user = User::findOrFail($request->id_user);
        $card = Card::where('id_user', '=',$request->id_user)->first();
        
        return response([
            'message' => 'true',
            'user' => $user,
            'card' => $card ? $card : 'true',
        ]);
    }

    public function editUser(Request $request){
        $user = User::findOrFail($request->id_user);
        $user->name = $request->name;
        $user->update();
        return response([
            'message' => 'true',
        ]);
    }

    
}
