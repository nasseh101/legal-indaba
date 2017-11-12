<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Article;
use App\Card;
use App\Issue;
use App\Req;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dash(){
        $latest_issue = Issue::all()->last();

        $latest_message = Card::all()->last();

        $reqs = Req::all();

        $users = User::where('is_active',0)->get();

        $articles = null;

        if($latest_issue != null){
            $articles = Issue::find($latest_issue->id)->articles;
        }

        return view('admin.dash',compact('articles','reqs','users','latest_message'));
    }

    public function issues(){
        return view('admin.issues');
    }


    public function users(){
        $users = User::orderBy('id','desc')->take(7)->get();
        $sus_users = User::where('is_active',0)->get();
        $reqs = Req::all();
        return view('admin.users',compact('users','reqs','sus_users'));
    }

    public function all_users(){
        $users = User::orderBy('first_name')->get();
        return view('admin.all_users',compact('users'));
    }

    public function create_column(){
        return view('admin.issues');
    }
}
