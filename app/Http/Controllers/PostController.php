<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postomat;
use App\Models\User;
use App\Models\history;
use App\Models\Card;
use App\Models\Tarif;
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
        $tarif = Tarif::findOrFail(1);
        $history = history::create([
            'id_user' => $request->id_user,
            'id_post_first' => $request->id_post_first,
            'time_start' => $time,
            'is_active' => 'true',
            'count' => 1,   
            'money' => '200', 
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
        $time =  Carbon::now()->format('Y-m-d H:i:s');
        $tarif = Tarif::all();
        $money = "";

        $his = history::where('id_user', '=' , $request->id_user)
            ->where('is_active', '=', 'true')
            ->first();
            
        $sth = (int)substr($his->time_start, 11, 2);
        $stm = (int)substr($his->time_start, 14, 2);
        error_log($sth . " : ". $stm);
        $nth = (int)substr($time, 11, 2);
        if(!($nth == 0 && $sth == 0)){
            $nth = 24;
        }
        $ntm = (int)substr($time, 14, 2);
        error_log($nth . " : ". $ntm);
        if((abs($sth - $nth)) < 1){
            $money = '200';
        }
        else if(abs($sth - $nth) >= 1 && abs($sth - $nth) < 6){
            $money = '500';
        }
        else {
            $money = '700';
        }


        $his->id_post_second = $second;
        $his->time_end = $time;
        $his->is_active = 'false';
        $his->money = $money;
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
        //error_log($request->id_user);
        $his = history::where('id_user', '=', $request->id_user)->orderBy('time_start', 'desc')->get();
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
