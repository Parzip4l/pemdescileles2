<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Realisasi;
use Illuminate\Support\Facades\Storage;

class RealisasiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'pengajuan_id' => 'required|exists:sibangenan,id',
            'nominal' => 'required|numeric|min:0',
            'file' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Upload file
        $filePath = $request->file('file')->store('realisasi', 'public');

        // Simpan ke database
        Realisasi::create([
            'pengajuan_id' => $request->pengajuan_id,
            'nominal' => $request->nominal,
            'file_path' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Data realisasi berhasil diupload.');
    }
}
