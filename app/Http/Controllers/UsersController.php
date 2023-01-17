<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users['users'] = Users::all();
        return view('users.index', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'jabatan' => 'required'
        ]);
        $user = new Users();
        // $pass = password_hash($request->password, PASSWORD_DEFAULT);
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->notelp = $request->notelp;
        $user->email = $request->email;
        $user->jabatan = $request->jabatan;
        Session::flash('addUser', $user->save());
        return redirect()->route("users.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Users::find($id);
        return view('users.edit', ['users' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'jabatan' => 'required'
        ]);
        $user = Users::find($id);
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->notelp = $request->notelp;
        $user->email = $request->email;
        $user->jabatan = $request->jabatan;
        $user->save();
        return redirect()->route("users.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Users::destroy($id);
        return redirect()->route('users.index')->with('success','Data Berhasil Dihapus');
    }
}
