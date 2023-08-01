<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Warga;
use Illuminate\Support\Str;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warga = Warga::all();
        return view('pages.warga-data.index', compact('warga'));
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
        try{
            //validate form
            $this->validate($request, [
                'nik'     => 'required|unique:warga',
                'nokk'     => 'required|max:16'
            ]);

            $uuid = Str::uuid()->toString();
    
            //create post
            Warga::create([
                'id' => $uuid,
                'nik'     => $request->nik,
                'nokk'   => $request->nokk,
                'hubungankk'   => $request->hubungankk,
                'rt'     => $request->rt,
                'rw'   => $request->rw,
                'nama'     => $request->nama,
                'jk'   => $request->jk,
                'agama'     => $request->agama,
                'pendidikan'   => $request->pendidikan,
                'pekerjaan'     => $request->pekerjaan,
                'tanggal_lahir'   => $request->tanggal_lahir,
                'tempat_lahir'     => $request->tempat_lahir,
                'statusperkawinan'   => $request->statusperkawinan,
                'nomortelepon'   => $request->nomortelepon,
                'nama_ayah'     => $request->nama_ayah,
                'nama_ibu'     => $request->nama_ibu
            ]);
            
            //redirect to index
            return redirect()->route('warga.index')->with(['success' => 'Data Berhasil Disimpan!']);
            }catch (ValidationException $exception) {
                $errorMessage = $exception->validator->errors()->first(); // ambil pesan error pertama dari validator
                redirect()->route('warga.index')->with('error', 'Gagal menyimpan data. ' . $errorMessage); // tambahkan alert error
            }
    }

    public function autocomplete(Request $request)
    {
        $term = $request->input('term');
        $warga = Warga::where('nik', 'LIKE', '%'.$term.'%')->get();
        $data = array();
        foreach ($warga as $user) {
            $data[] = array('value' => $user->nik, 'id' => $user->id);
        }
        return response()->json($data);
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
        $warga = Warga::find($id);
        $warga->delete();
        return redirect()->route('warga.index')->with('success', 'Data Warga berhasil dihapus.');
    }
}
