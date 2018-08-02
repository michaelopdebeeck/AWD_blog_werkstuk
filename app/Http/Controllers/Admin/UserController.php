<?php

namespace App\Http\Controllers\Admin;

use App\Model\admin\admin;
use App\Model\admin\role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
        if (Auth::user()->can('admins.create')) {
            $users = admin::all();
            return view('admin.user.index', compact('users'));
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
        if (Auth::user()->can('admins.create')) {
            $roles = role::all();
            return view('admin.user.user', compact('roles'));
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
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $request['password'] = bcrypt($request->password);
        $user = admin::create($request->all());
        $user->roles()->sync($request->role);
        return redirect(route('user.index'));
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
        if (Auth::user()->can('admins.update')) {
            $user = admin::find($id);
            $roles = role::all();
            return view('admin.user.edit',compact('user','roles'));
    } else {
            return redirect(route('home'));
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
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);
        $request->status? : $request['status']=0;

        $user = admin::where('id', $id)->update($request->except('_token', '_method', 'role'));
        admin::find($id)->roles()->sync($request->role);
        return redirect(route('user.index'))->with('message', 'De gebruiker werd succesvol geupdated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        admin::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Gebruiker is succesvol verwijderd');
    }
}
