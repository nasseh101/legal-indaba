<?php

namespace App\Http\Controllers;

use App\Article;
use App\Card;
use App\Column;
use App\Writer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ColumnController extends Controller
{
    public function view_column($column_id,$column_name){

        try{
            $articles = Column::findOrFail($column_id)->articles;
        }catch (ModelNotFoundException $e){
            return redirect('/404');
        }

        //im not abusing th relationship here cause of the error that comes up when a column has no data in it
        $column = Column::where('id', $column_id)
            ->get()
            ->first();

        $latest_message = Card::all()->last();

        if(str_slug($column->name) === $column_name){
            return view('pages.col',compact('articles','column','latest_message'));
        }else{
            return redirect('/404');
        }

    }

    public function index()
    {
        //
    }


    public function create()
    {
        return view('admin.col_create');
    }


    public function store(Request $request)
    {
        $column = new Column();
        $column->name = $request->name;
        $column->col_desc = $request->description;
        $column->category = $request->category;
        $column->save();


        return redirect()->action(
            'AdminController@issues'
        );
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $column = Column::findOrFail($id);
        return view('admin.col_edit', compact('column'));
    }


    public function update(Request $request, $id)
    {
        $column = Column::findOrFail($id);

        $column->name = $request->name;
        $column->col_desc = $request->description;
        $column->category = $request->category;
        $column->update();

        return redirect()->action(
            'AdminController@issues'
        );
    }


    public function destroy($id)
    {
        $column = Column::findOrFail($id);
        $column->forceDelete();

        return redirect()->action(
            'AdminController@issues'
        );
    }
}
