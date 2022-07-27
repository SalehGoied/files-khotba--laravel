<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];


    public function profileImage(){
        $image = $this->image ?$this->image: 'https://khutabaa.com/storage/users/default.png';
        return $image;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
