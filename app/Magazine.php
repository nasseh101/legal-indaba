<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    public function issues(){
        return $this->hasMany('App\Issue')->orderBy('issue_num','desc');
    }
}
