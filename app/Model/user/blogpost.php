<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class blogpost extends Model
{
    public function tags() {
        return $this->belongsToMany('App\Model\user\tag', 'post_tags')->withTimestamps( );
    }
    public function categorieen() {
        return $this->belongsToMany('App\Model\user\categorie', 'categorie_blogposts')->withTimestamps();
    }
}
