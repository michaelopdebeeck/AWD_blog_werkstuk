<?php

namespace App\Http\Controllers\Admin;

use App\Model\admin\admin;
use App\Model\user\blogpost;
use App\Model\user\categorie;
use App\Model\user\tag;
use App\Model\user\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {
        $blogposts = blogpost::all();
        $categorieen = categorie::all();
        $tags = tag::all();
        $admins = admin::all();
        return view('admin.admin', compact('blogposts', 'categorieen', 'tags', 'admins'));
    }
}
