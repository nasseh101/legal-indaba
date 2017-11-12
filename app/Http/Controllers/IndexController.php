<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Article;
use App\Card;
use App\Issue;
use App\Magazine;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function load_index(){

        $latest_issue = Issue::all()->last();

        $articles = Issue::find($latest_issue->id)->articles;

        $latest_message = Card::all()->last();

        return view('index',compact('articles','latest_issue','latest_message'));
    }


}
