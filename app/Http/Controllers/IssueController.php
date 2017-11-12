<?php

namespace App\Http\Controllers;

use App\Article;
use App\Card;
use App\Issue;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function view_issue($issue_id){
        if(is_numeric($issue_id)){
            try{
                $articles = Issue::findOrFail($issue_id)->articles;
            }catch (ModelNotFoundException $e){
                return redirect('/404');
            }

            $latest_message = Card::all()->last();
            $issue = Issue::findOrFail($issue_id);

            if(sizeof($articles) != 0){
                if($articles[0]->issue_id == $issue_id){
                    return view('pages.issue',compact('articles','issue_id','latest_message','issue'));
                }else{
                    return redirect('/404');
                }
            }

            return view('pages.issue',compact('articles','issue_id','latest_message','issue'));
        }else{
            return redirect('/404');
        }
    }

    public function new_issue(){
        return view('admin.issue_create');
    }

    public function store_issue(Request $request){
        $issue = new Issue();
        $issue->admin_id = 1;
        $issue->issue_name = $request->name;
        $issue->save();

        return redirect()->action(
            'AdminController@issues'
        );

    }

    public function manage_issue($issue_id){
        $articles = Article::where('issue_id',$issue_id)->get();
        return view('admin.issue_manage', compact('issue_id','articles'));
    }
}
