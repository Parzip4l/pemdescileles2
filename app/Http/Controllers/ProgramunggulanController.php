<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProgramUnggulan;
use App\UserActivity;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class ProgramunggulanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programunggulan = ProgramUnggulan::all();
        return view('pages.setting-page.programunggulan.index', compact('programunggulan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

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
            'deskripsi' => 'required',
            'icon' => 'required|max:2048'
        ]);

        $uuid = Str::uuid()->toString();
        
        $program = new ProgramUnggulan();
        $program->id = $uuid;
        $program->nama = $request->input('nama');
        $program->deskripsi = $request->input('deskripsi');

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $filename = time() . '.' . $icon->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $icon->move($destinationPath, $filename);
            $program->icon = $filename;
        }
        
        $program->save();
        $new_value = $program->attributesToArray(); 
        $namauser = Auth::user()->name;
        UserActivity::create([
            'action' => 'Create',
            'model' => 'Program Unggulan',
            'user_id' => auth()->id(),
            'user_name' => $namauser,
            'new_values' => json_encode($new_value)
        ]);
        return redirect()->route('program-unggulan.index')->with('success', 'Program Unggulan Berhasil Dibuat');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
