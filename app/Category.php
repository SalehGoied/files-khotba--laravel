<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    public function files(){
        return $this->hasMany(File::class);
    }
}
