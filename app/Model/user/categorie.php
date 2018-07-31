<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    public function blogposts() {
        return $this->belongsToMany('App\Model\user\blogpost', 'categorie_blogposts')->orderBy('created_at', 'DESC')->paginate(5);
    }

    public function getRouteKeyName() {
        return 'slug';
    }
}
