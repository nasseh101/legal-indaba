<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function column(){
        return $this-> belongsTo('App\Column');
    }

    public function issue(){
        return $this-> belongsTo('App\Issue');
    }
}
