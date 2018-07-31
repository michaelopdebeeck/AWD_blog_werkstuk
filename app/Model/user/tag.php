<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    public function blogposts() {
        return $this->belongsToMany('App\Model\user\blogpost', 'post_tags')->orderBy('created_at', 'DESC')->paginate(5);
    }

    public function getRouteKeyName() {
        return 'slug';
    }
}
