<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengurus;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengurus = Pengurus::all();
        return view ('pages.setting-page.pengurus.index', compact('pengurus'));
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
            'nip' => 'required',
            'nama' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $uuid = Str::uuid()->toString();
        
        $pengurus = new Pengurus();
        $pengurus->id = $uuid;
        $pengurus->nama = $request->input('nama');
        $pengurus->nip = $request->input('nip');
        $pengurus->jk = $request->input('jk');
        $pengurus->jabatan = $request->input('jabatan');
        $pengurus->tanggal_lahir = $request->input('tanggal_lahir');
        $pengurus->tempat_lahir = $request->input('tempat_lahir');
        $pengurus->status_perkawinan = $request->input('status_perkawinan');
        
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $filename);
            $pengurus->foto = $filename;
        }
        $pengurus->save();

        return redirect()->route('pengurus.index')->with('success','Data Pengurus Berhasil ditambahkan.');
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
        try {
            $pengurus = Pengurus::findOrFail($id);
            $pengurus->nama = $request->nama;
            $pengurus->jabatan = $request->jabatan;
            $pengurus->nip = $request->nip;
            $pengurus->jk = $request->jk;
            $pengurus->tanggal_lahir = $request->tanggal_lahir;
            $pengurus->tempat_lahir = $request->tempat_lahir;
            $pengurus->status_perkawinan = $request->status_perkawinan;
            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/files');
                $image->move($destinationPath, $filename);
                $pengurus->foto = $filename;
            }
            $pengurus->save();
            return redirect()->route('pengurus.index')->with('success', 'Data Pengurus Berhasil Diupdate.');
        } catch (ModelNotFoundException $e) {
            // Handle the case where the record with the specified $id is not found
            return redirect()->back()->withErrors('Data not found.');
        } catch (ValidationException $e) {
            // Handle the case where validation fails
            return redirect()->back()->withErrors($e->errors());
        } catch (\Exception $e) {
            // Handle other unexpected errors
            return redirect()->back()->withErrors('An error occurred while updating the data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengurus = Pengurus::find($id);
        $pengurus->delete();
        return redirect()->route('pengurus.index')->with('success', 'Data Pengurus berhasil dihapus.');
    }
}
