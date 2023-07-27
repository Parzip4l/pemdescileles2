<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserLevel;

class UserLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leveluser = UserLevel::all();
        return view('pages.auth.usersetting.userlevel',compact('leveluser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $userlevel = new UserLevel();
        $userlevel->nama = $request['nama'];
        $userlevel->level = $request['level'];
        $userlevel->save();

        return redirect()->route('user-level.index')->with('success', 'Level User berhasil ditambahkan.');
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
        //
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
        $request->validate([
            'nama' => 'required',
        ]);

        $level = UserLevel::find($id);
        $level->nama = $request->nama;
        $level->level = $request->level;
        $level->save();

        return redirect()->route('user-level.index')->with('success', 'Data Level berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $level = UserLevel::find($id);
        $level->delete();
        return redirect()->route('user-level.index')->with('success', 'Data User Level berhasil dihapus.');
    }
}
