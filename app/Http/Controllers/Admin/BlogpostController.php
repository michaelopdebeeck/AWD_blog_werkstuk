<?php

namespace App\Http\Controllers\Admin;

use App\Model\user\blogpost;
use App\Model\user\categorie;
use App\Model\user\tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogpostController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogposts = blogpost::all();
        return view('admin.blogpost.index', compact('blogposts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorieen = categorie::all();
        $tags = tag::all();
        return view('admin.blogpost.blogpost', compact('categorieen', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titel' => 'required',
            'subtitel' => 'required',
            'slug' => 'required',
            'image' => 'required',
            'body' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $imageNaam = $request->image->store('public');
        }else{
            return 'No';
        }
        $blogpost = new blogpost();

        $blogpost->title = $request->titel;
        $blogpost->subtitle = $request->subtitel;
        $blogpost->slug = $request->slug;
        $blogpost->image = $imageNaam;
        $blogpost->status = $request->status;
        $blogpost->body = $request->body;
        $blogpost->save();
        $blogpost->tags()->sync($request->tags);
        $blogpost->categorieen()->sync($request->categorieen);

        return redirect(route('blogpost.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogpost = blogpost::with('tags', 'categorieen')->where('id', $id)->first();
        $categorieen = categorie::all();
        $tags = tag::all();
        return view('admin.blogpost.edit', compact('blogpost','categorieen', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'titel' => 'required',
            'subtitel' => 'required',
            'slug' => 'required',
            'image' => 'required',
            'body' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $imageNaam = $request->image->store('public');
        }
        $blogpost = blogpost::find($id);
        $blogpost->image = $imageNaam;
        $blogpost->title = $request->titel;
        $blogpost->subtitle = $request->subtitel;
        $blogpost->slug = $request->slug;
        $blogpost->status = $request->status;
        $blogpost->body = $request->body;
        $blogpost->tags()->sync($request->tags);
        $blogpost->categorieen()->sync($request->categorieen);

        $blogpost->save();

        return redirect(route('blogpost.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        blogpost::where('id', $id)->delete();
        return redirect()->back();
    }
}
