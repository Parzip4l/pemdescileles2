<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sibangenan;
use App\Berita;
use App\InformasiPublik;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = InformasiPublik::orderBy('created_at', 'desc')->get();
        return view('pages.user-pages.informasi', compact('data'));
    }

    public function viewinformasi()
    {
        $data = InformasiPublik::all();
        return view('pages.publikasi-data.index', compact('data'));
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
        try {
            $request->validate([
                'judul' => 'required',
                'file' => 'required|max:5048|mimes:pdf', // Only allow PDF files
            ]);
    
            $uuid = Str::uuid()->toString();
            $informasi = new InformasiPublik();
            $informasi->id = $uuid;
            $informasi->judul = $request->input('judul');
    
            if ($request->hasFile('file')) {
                $file = $request->file('file');
    
                // Check if the uploaded file is a PDF
                if ($file->getClientOriginalExtension() !== 'pdf') {
                    throw ValidationException::withMessages(['file' => 'Hanya file PDF yang diizinkan.']);
                }
    
                $path = $file->store('public/files');
                $informasi->file = $path;
            }
    
            $informasi->save();
            return redirect()->route('informasi.data')->with('success', 'Pengajuan Berhasil Dibuat');
        } catch (ValidationException $exception) {
            $errorMessage = $exception->validator->errors()->first(); // Get the first validation error message
            return redirect()->back()->with('error', $errorMessage);
        }
    }

    public function download($id)
    {
        $informasi = InformasiPublik::findOrFail($id);

        $file_path = storage_path('app/' .$informasi->file);

        return response()->download($file_path);
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
        $informasi = InformasiPublik::find($id);
        $informasi->delete();
        return redirect()->route('informasi.data')->with('success', 'Data berhasil dihapus!');
    }
}
