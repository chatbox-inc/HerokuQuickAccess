<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagEloquent extends Model
{
    protected $table = "m_tag";

    public function app(){
        return $this->belongsToMany('m_app');
    }
}
