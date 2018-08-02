<?php

namespace App\Http\Controllers\Admin;

use App\Model\user\categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategorieController extends Controller
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
    public function index() {
        if (Auth::user()->can('blogposts.categorie')) {
            $categorieen = categorie::all();
            return view('admin.categorie.index', compact('categorieen'));
        } else {
            return redirect(route('admin'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if (Auth::user()->can('blogposts.categorie')) {
            return view('admin.categorie.categorie');
        } else {
            return redirect(route('admin'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required'
        ]);

        $categorie = new categorie();

        $categorie->name = $request->name;
        $categorie->slug = $request->slug;

        $categorie->save();

        return redirect(route('categorie.index'));
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
    public function edit($id) {
        if (Auth::user()->can('blogposts.categorie')) {
            $categorie = categorie::where('id', $id)->first();
            return view('admin.categorie.edit', compact('categorie'));
        } else {
            return redirect(route('admin'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required'
        ]);

        $categorie = categorie::find($id);

        $categorie->name = $request->name;
        $categorie->slug = $request->slug;

        $categorie->save();

        return redirect(route('categorie.index'))->with('message', 'Categorie is succesvol geupdated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        categorie::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Categorie is succesvol verwijderd');;
    }
}
