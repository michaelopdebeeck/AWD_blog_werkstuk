<?php

namespace App\Http\Controllers\User;

use App\Model\user\blogpost;
use App\Model\user\categorie;
use App\Model\user\tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller {

    public function index() {
        $blogposts = blogpost::where('status', 1)->orderBy('created_at', 'DESC')->paginate(5);
        return view('user.blog', compact('blogposts'));
    }

    public function categorie(categorie $categorie) {
        $blogposts =  $categorie->blogposts();
        return view('user.blog', compact('blogposts'));
    }

    public function tag(tag $tag) {
        $blogposts = $tag->blogposts();
        return view('user.blog', compact('blogposts'));
    }
}
