<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class UserEloquent extends Model implements Authenticatable
{
    protected $table = "m_user";

    protected $guarded = [];

    public function getId(){
        if($this->heroku_id){
            return $this->heroku_id;
        }else{
            throw new \Exception("no heroku_id supplied");
        }
    }

    public function findById($id){
        $heroku_id = $id;
        return $this->where("heroku_id",$heroku_id)->first();
    }

    public function getAuthIdentifierName() {
        return $this->heroku_id;
    }

    public function getAuthIdentifier() {
        return $this->heroku_id;
    }

    public function getAuthPassword() {
        return $this->getToken();
    }

    public function getRememberToken() {
        return $this->heroku_id;
    }

    public function setRememberToken( $value ) {
        return $this->heroku_id;
    }

    public function getRememberTokenName() {
        return $this->heroku_id;
    }

}
