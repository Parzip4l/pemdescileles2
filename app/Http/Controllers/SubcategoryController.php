<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Urusansibangenan;
use App\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubcategoryController extends Controller
{
    public function getSubcategories(Request $request)
    {
        $category_id = $request->input('category_id');
        $subcategories = Subcategory::where('category_id', $category_id)->get();
        return response()->json($subcategories);
    }

    public function index()
    {
        $kategori = Urusansibangenan::all();
        $suburusan = Subcategory::all();

        return view('pages.setting-page.sibangenan.subkategori', compact('kategori','suburusan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $urusan = new Subcategory();
        $urusan->category_id = $request['category_id'];
        $urusan->name = $request['name'];
        $urusan->save();

        return redirect()->route('suburusan.index')->with('success', 'Sub Kategori berhasil ditambahkan.');
    }
}
