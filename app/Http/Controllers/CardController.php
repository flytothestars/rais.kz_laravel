<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;

class CardController extends Controller
{
    public function addCard(Request $request){
        $card = Card::create([
            'id_user' => $request->id_user,
            'number_card' => $request->number_card,
            'name_user' => $request->name_user,
            'expiry_date' => $request->expiryDate,
            'code_cvc' => $request->code_cvc,
        ]);
        return response([
            'message' => 'true'
        ]);
    }

    public function deleteCard(Request $request){
        $card = Card::where('id_user', '=', $request->id_user)->delete();
        return response([
            'message' => 'true'
        ]);
    }
}
