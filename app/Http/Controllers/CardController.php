<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function post(Request $request){
        $card = new Card();
        $card->message = $request->message;

        $card->save();
        return redirect('/admin-section/');
    }
}
