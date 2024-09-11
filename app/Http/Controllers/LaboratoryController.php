<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaboratoryController extends Controller
{
    //
    public function index()
    {
        $laboratories = Laboratory::all();
        return view('admin.laboratories.index', compact('laboratories'));
    }

    // Menampilkan form create laboratorium
    public function create()
    {
        return view('admin.laboratories.create');
    }

    // Menyimpan laboratorium baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'capacity' => 'required|integer',
        ]);

        Laboratory::create($request->all());

        return redirect()->route('laboratories.index')->with('success', 'Laboratorium berhasil ditambahkan.');
    }

    // Menampilkan form edit laboratorium
    public function edit(Laboratory $laboratory)
    {
        return view('admin.laboratories.edit', compact('laboratory'));
    }

    // Memperbarui laboratorium di database
    public function update(Request $request, Laboratory $laboratory)
    {
        $request->validate([
            'name' => 'required',
            'capacity' => 'required|integer',
        ]);

        $laboratory->update($request->all());

        return redirect()->route('laboratories.index')->with('success', 'Laboratorium berhasil diperbarui.');
    }

    // Menghapus laboratorium dari database
    public function destroy(Laboratory $laboratory)
    {
        $laboratory->delete();

        return redirect()->route('laboratories.index')->with('success', 'Laboratorium berhasil dihapus.');
    }
}
