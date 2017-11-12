<?php

namespace App\Http\Controllers;
ini_set('max_execution_time',600);
use App\Article;
use App\Card;
use App\Column;
use App\Issue;
use App\Yumpu\Yumpu;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ArticleController extends Controller
{

    public function add_article($issue_id, $column_id){

        $column = Column::find($column_id);

        return view('admin.add_article',compact('column','issue_id'));
    }

    public function preview($issue_id, $column_name, $article_id, $article_name){

        $latest_message = Card::all()->last();

        try{
            $article = Article::findOrFail($article_id);
        }catch (ModelNotFoundException $e){
            return redirect('/404');
        }

        if((str_slug($article->article_title) === $article_name) && (str_slug($article->column->name) === $column_name) && ($article->issue_id == $issue_id)){
            return view('pages.preview',compact('article','latest_message'));
        }else{
            return redirect('/404');
        }

    }

    public function full_article($issue_id, $column_name, $article_id, $article_name){

        $latest_message = Card::all()->last();

        try{
            $article = Article::findOrFail($article_id);
        }catch (ModelNotFoundException $e){
            return redirect('/404');
        }

        $articles = Article::where('issue_id',$issue_id)
            ->take(3)
            ->get();


        if($issue_id > 1){
            $prev_article = Article::where('issue_id',($issue_id - 1))
                ->where('column_id',$article->column->id)
                ->get()
                ->first();
        }else{
            $prev_article = null;
        }

        $latest_issue = Issue::all()->last();

        if($issue_id < $latest_issue->id){
            $next_article = Article::where('issue_id',($issue_id + 1))
                ->where('column_id',$article->column->id)
                ->get()
                ->first();
        }else{
            $next_article = null;
        }

        $older_articles = Article::where('column_id',$article->column->id)
            ->take(2)
            ->get();

        if((str_slug($article->article_title) === $article_name) && (str_slug($article->column->name) === $column_name) && ($article->issue_id == $issue_id)){
            return view('pages.full',compact('article','articles','next_article','prev_article','older_articles','latest_message'));
        }else{
            return redirect('/404');
        }

    }

    public function store_article(Request $request){
        if(Input::hasFile('my_article')){

            $extension = Input::file('my_article')->getClientOriginalExtension();
            $filename = 'article.' . $extension;

            if(Input::file('my_article')->move('articles/'. $request->col_id . '/' . $request->issue_id , $filename)){
                $file = 'articles/'. $request->col_id . '/' . $request->issue_id . '/' . $filename;

                $yumpu = new Yumpu();

                $data = array(
                    'title' => $request->article_title,
                    'file' => $file
                );

                if($newDocument = $yumpu->postDocumentFile($data)){

                    $prog_id = $newDocument['progress_id'];

                    $article_progress = $yumpu->getDocumentProgress($prog_id);

                    while(sizeof($article_progress['document']) == 3){
                        $article_progress = $yumpu->getDocumentProgress($prog_id);
                    }

                    $article = new Article();

                    $article->article_title = $request->article_title;

                    $article->admin_id = 1;

                    $article->column_id = $request->col_id;


                    $article->writer_info = $request->writer_info;

                    if($request->writer_name == null){
                        $article->writer_name = "Anonymous";
                    }else{
                        $article->writer_name = $request->writer_name;
                    }

                    $article->yumpu_id = $article_progress['document']['0']['id'];

                    $article->issue_id = $request->issue_id;

                    $article->article_desc = $request->article_desc;

                    $article->article_text = null;

                    if(Input::hasFile('writer_img')){
                        $img_name = 'w'. str_slug($request->article_title) . '.jpg';
                        Input::file('writer_img')->move('articles/'. $request->col_id . '/' . $request->issue_id , $img_name);
                        $article->has_image = true;
                    }else{
                        $article->has_image = false;
                    }


                    if(Input::hasFile('article_img')){
                        $img_name = str_slug($request->article_title) . '.jpg';
                        Input::file('article_img')->move('articles/'. $request->col_id . '/' . $request->issue_id , $img_name);
                        $article->has_subj_image = true;
                    }else{
                        $article->has_subj_image = false;
                    }
                    $article->save();

                    return redirect()->action(
                        'IssueController@manage_issue', ['issue_id' => $request->issue_id]
                    );
                }else{
                    echo "Yumpu Error!";
                }

            }else{
                echo "There was an error uploading the fire. Please try again.";
            }


        }else{
            if($request->article_text != null){

                $article = new Article();

                $article->article_title = $request->article_title;

                $article->admin_id = 1;

                $article->column_id = $request->col_id;

                if($request->writer_name == null){
                    $article->writer_name = "Anonymous";
                }else{
                    $article->writer_name = $request->writer_name;
                }

                $article->writer_info = $request->writer_info;

                $article->yumpu_id = null;

                $article->issue_id = $request->issue_id;

                $article->article_desc = $request->article_desc;

                $article->article_text = $request->article_text;

                if(Input::hasFile('writer_img')){
                    $img_name = 'w'. str_slug($request->article_title) . '.jpg';
                    Input::file('writer_img')->move('articles/'. $request->col_id . '/' . $request->issue_id , $img_name);
                    $article->has_image = true;
                }else{
                    $article->has_image = false;
                }


                if(Input::hasFile('article_img')){
                    $img_name = str_slug($request->article_title) . '.jpg';
                    Input::file('article_img')->move('articles/'. $request->col_id . '/' . $request->issue_id , $img_name);
                    $article->has_subj_image = true;
                }else{
                    $article->has_subj_image = false;
                }

                $article->save();

                return redirect()->action(
                    'IssueController@manage_issue', ['issue_id' => $request->issue_id]
                );
            }else{

            }
        }
        return redirect()->action(
            'IssueController@manage_issue', ['issue_id' => $request->issue_id]
        );
    }

    public function edit_article($article_id){
        $article = Article::findOrFail($article_id);
        return view('admin.edit_article',compact('article'));
    }

    public function update_article(Request $request, $id){
        $article = Article::findOrFail($id);

        $article->article_title = $request->article_title;
        $article->article_desc = $request->article_desc;
        $article->writer_name = $request->writer_name;
        $article->writer_info = $request->writer_info;

        if(Input::hasFile('writer_img')){
            $img_name = 'w'. str_slug($request->article_title) . '.jpg';
            Input::file('writer_img')->move('articles/'. $article->column_id . '/' . $article->issue_id , $img_name);
            $article->has_image = true;
        }else{
            $article->has_image = false;
        }


        if($article->yumpu_id == null){
            $article->article_text = $request->article_text;
        }

        if(Input::hasFile('article_img')){
            $img_name = str_slug($request->article_title) . '.jpg';
            Input::file('article_img')->move('articles/'. $article->column_id . '/' . $article->issue_id , $img_name);
            $article->has_subj_image = true;
        }else{
            $article->has_subj_image = false;
        }

        $article->update();

        return redirect()->action(
            'IssueController@manage_issue', ['issue_id' => $article->issue_id]
        );
    }

    public function delete_article($id){
        $article = Article::findOrFail($id);
        $issue_id = $article->issue_id;
        $article->forceDelete();

        return redirect()->action(
            'IssueController@manage_issue', ['issue_id' => $issue_id]
        );
    }
}
