<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Majors;

class MajorController extends Controller
{
    // Menampilkan daftar semua jurusan
    public function index()
    {
        $majors = Majors::all();
        return view('majors.index', compact('majors'));
    }

    // Menampilkan form untuk menambahkan jurusan baru
    public function create()
    {
        return view('majors.create');
    }

    // Menyimpan jurusan baru ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:majors|max:255',
            'code' => 'required|string|max:10',
            'description' => 'nullable|string|max:500',
        ]);

        Majors::create([
            'name' => $validated['name'],
            'code' => $validated['code'],
            'description' => $validated['description'] ,
        ]);

        return redirect()->route('majors.index')->with('success', 'Major created successfully');
    }

    // Menampilkan detail dari satu jurusan
    public function show(string $id)
    {
        $major = Majors::findOrFail($id);
        return view('majors.show', compact('major'));
    }

    // Menampilkan form untuk mengedit jurusan
    public function edit(string $id)
    {
        $major = Majors::findOrFail($id);
        return view('majors.edit', compact('major'));
    }

    // Menyimpan perubahan jurusan
    public function update(Request $request, string $major)
    {
        $validated = $request->validate([
            'name' => "required|unique:majors,name,$major|max:255",
            'code' => 'required|string|max:10',
            'description' => 'nullable|string|max:500',
        ]);

        $major = Majors::findOrFail($major);

        $major->update([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()->route('majors.index')->with('success', 'Major updated successfully');
    }

    // Menghapus jurusan dari database
    public function destroy(string $id)
    {
        $major = Majors::findOrFail($id);
        $major->delete();

        return redirect()->route('majors.index')->with('success', 'Major deleted successfully');
    }
}
