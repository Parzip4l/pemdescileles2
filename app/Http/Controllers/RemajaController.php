<?php

namespace App\Http\Controllers;

use App\Remaja;
use App\Bumil;
use Illuminate\Http\Request;

class RemajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $remaja = Remaja::all();
        $bumil = Bumil::all();
        return view('pages.sijamil.index', compact('remaja','bumil'));
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
            'nik' => 'required',
            'nomorkk' => 'required',
            'nama' => 'required',
            'usia' => 'required|numeric',
            'jenis_kelamin' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'nomor_telepon' => 'required',
        ]);

        $remaja = new Remaja();
        $remaja->nik = $request['nik'];
        $remaja->nomorkk = $request['nomorkk'];
        $remaja->nama = $request['nama'];
        $remaja->usia = $request['usia'];
        $remaja->jenis_kelamin = $request['jenis_kelamin'];
        $remaja->rt = $request['rt'];
        $remaja->rw = $request['rw'];
        $remaja->nama_ayah = $request['nama_ayah'];
        $remaja->nama_ibu = $request['nama_ibu'];
        $remaja->nomor_telepon = $request['nomor_telepon'];
        $remaja->save();

        return redirect()->route('sijamil.index')->with('success', 'Data remaja berhasil ditambahkan.');
    }

    // Filter Data
    public function getRemajaData(Request $request)
    {
        $query = Remaja::query();

        if ($request->has('usia')) {
            $query->where('usia', $request->usia);
        }

        if ($request->has('jenis_kelamin')) {
            $query->where('jenis_kelamin', $request->jenis_kelamin);
        }

        if ($request->has('rw')) {
            $query->where('rw', 'like', '%' . $request->rw . '%');
        }

        if ($request->has('rt')) {
            $query->where('rt', 'like', '%' . $request->rt . '%');
        }

        return DataTables::of($query)
            ->addColumn('DT_RowIndex', function($data) {
                return '';
            })
            ->addColumn('action', function($data) {
                return '<div class="dropdown">
                            <button class="btn btn-link p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item d-flex align-items-center" href="' . route('sijamil.edit', $data->id) . '"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                                <a class="dropdown-item d-flex align-items-center" href=""><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View Detail</span></a>
                                <form action="' . route('sijamil.destroy', $data->id) . '" method="POST" id="delete_remaja" class="hapusremaja">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                    <a class="dropdown-item d-flex align-items-center" href="#" onClick="showDeleteDataDialog()"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                                </form>
                            </div>
                        </div>';
            })
            ->rawColumns(['DT_RowIndex', 'action'])
            ->make(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('remaja.show', compact('remaja'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $remaja = Remaja::find($id);
        return view('pages.sijamil.editremaja', compact('remaja'));
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
            'usia' => 'required|numeric',
            'jenis_kelamin' => 'required',
        ]);

        $remaja = Remaja::find($id);
        $remaja->nik = $request->nik;
        $remaja->nomorkk = $request->nomorkk;
        $remaja->nama = $request->nama;
        $remaja->usia = $request->usia;
        $remaja->jenis_kelamin = $request->jenis_kelamin;
        $remaja->rt = $request->rt;
        $remaja->rw = $request->rw;
        $remaja->nama_ayah = $request->nama_ayah;
        $remaja->nama_ibu = $request->nama_ibu;
        $remaja->nomor_telepon = $request->nomor_telepon;
        $remaja->save();

        return redirect()->route('sijamil.index')->with('success', 'Data remaja berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $remaja = Remaja::find($id);
        $remaja->delete();
        return redirect()->route('sijamil.index')->with('success', 'Data remaja berhasil dihapus.');
    }
}
