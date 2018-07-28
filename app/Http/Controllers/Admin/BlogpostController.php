<?php

namespace App\Http\Controllers\Admin;

use App\Model\user\blogpost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogpostController extends Controller
{
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
        return view('admin.blogpost.blogpost');
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
            'body' => 'required'
        ]);

        $blogpost = new blogpost();

        $blogpost->title = $request->titel;
        $blogpost->subtitle = $request->subtitel;
        $blogpost->slug = $request->slug;
        $blogpost->body = $request->body;

        $blogpost->save();

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
        $blogpost = blogpost::where('id', $id)->first();
        return view('admin.blogpost.edit', compact('blogpost'));
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
            'body' => 'required'
        ]);

        $blogpost = blogpost::find($id);

        $blogpost->title = $request->titel;
        $blogpost->subtitle = $request->subtitel;
        $blogpost->slug = $request->slug;
        $blogpost->body = $request->body;

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
