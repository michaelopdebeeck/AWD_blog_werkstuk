<?php

namespace App\Http\Controllers\User;

use App\Model\user\blogpost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogpostController extends Controller {
    public function index(blogpost $slug) {
        return view('user.blogpost', compact('slug'));
}
}