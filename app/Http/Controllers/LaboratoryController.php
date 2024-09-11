<?php

namespace App\Http\Controllers;
use App\Models\Laboratory; 

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
        // Validasi input
        $request->validate([
            'name' => 'required',
            'capacity' => 'required|integer',
        ]);
    
        // Simpan laboratorium ke database
        Laboratory::create([
            'name' => $request->name,
            'capacity' => $request->capacity,
        ]);
    
        // SweetAlert sukses
        alert()->success('Sukses', 'Laboratorium berhasil ditambahkan!');
    
        // Redirect ke halaman index
        return redirect()->route('laboratories.index');
    }
    
    // Menampilkan form edit laboratorium
    public function edit(Laboratory $laboratory)
    {
        return view('admin.laboratories.edit', compact('laboratory'));
    }

    // Memperbarui laboratorium di database
    public function update(Request $request, Laboratory $laboratory)
{
    // Validasi input
    $request->validate([
        'name' => 'required',
        'capacity' => 'required|integer',
    ]);

    // Update laboratorium di database
    $laboratory->update([
        'name' => $request->name,
        'capacity' => $request->capacity,
    ]);

    // SweetAlert sukses
    alert()->success('Sukses', 'Laboratorium berhasil diperbarui!');

    // Redirect ke halaman index
    return redirect()->route('laboratories.index');
}


    // Menghapus laboratorium dari database
    public function destroy(Laboratory $laboratory)
    {
        $laboratory->delete();
        alert()->success('Sukses', 'Laboratorium berhasil dihapus!');

        return redirect()->route('laboratories.index');
    }
}
