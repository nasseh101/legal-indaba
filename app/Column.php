<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Column extends Model
{

//    protected $fillable = ['name', 'col_desc', 'category', 'created_at', 'updated_at'];

    public function articles(){
        return $this->hasMany('App\Article')->orderBy('issue_id','desc');
    }
}
