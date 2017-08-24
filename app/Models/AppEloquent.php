<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppEloquent extends Model
{
    protected $table = "m_app";

    public function tag(){
        return $this->belongsToMany('m_tag');
    }
}
