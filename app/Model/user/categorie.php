<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    public function blogposts() {
        return $this->belongsToMany('App\Model\user\blogpost', 'categorie_blogposts');
    }}
