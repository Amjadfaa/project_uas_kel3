<?php

namespace App\Http\Controllers;

use App\Models\Consule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    // Menampilkan daftar semua film
    public function index()
    {
        $consules = Consule::all();
        return view('consules.index', compact('consules'));
    }

    // Menampilkan form tambah film baru
    public function create()
    {
        return view('consules.create');
    }

    // Menyimpan data film baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'semester' => 'nullable|string',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $consule = new Consule();
        $consule->nama = $request->nama;
        $consule->npm = $request->npm;
        $consule->semester = $request->semester;

        // Membuat slug yang unik
        $slug = Str::slug($request->consule);
        $count = Consule::where('slug', $slug)->count();

        if ($count > 0) {
            $slug .= '-' . ($count + 1); // Menambahkan angka jika slug sudah ada
        }

        $consule->slug = $slug; // Menggunakan slug yang sudah dipastikan unik

        // Upload gambar cover
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public'); // Menyimpan di storage/app/public/covers
            $consule->cover = $coverPath;
        }
    
       if ($consule->save()) {
            return redirect()->route('consules.index')->with('success', 'Consule berhasil ditambahkan');
       } else {
            return back()->withErrors('Gagal menyimpan consule');
       }
    }

    // Menampilkan detail consule tertentu
    public function show($slug)
    {
        $consule = Consule::where('slug', $slug)->firstOrFail(); // Mencari film berdasarkan slug
        return view('consules.show', compact('consule')); // Mengembalikan view
    }

    // Menampilkan form edit film yang sudah ada
    public function edit($slug)
    {
        $consule = Consule::where('slug', $slug)->firstOrFail(); // Mencari film berdasarkan slug
        return view('consules.edit', compact('consule'));
    }

    // Update data film yang ada
    public function update(Request $request, $slug)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'semester' => 'nullable|string',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $consule = Consule::where('slug', $slug)->firstOrFail(); // Mencari film berdasarkan slug
        $consule->nama = $request->nama;
        $consule->npm = $request->npm;
        $consule->semester = $request->semester;

        // Upload cover baru jika ada
        if ($request->hasFile('cover')) {
            // Hapus cover lama jika ada
            if ($consule->cover) {
                Storage::delete($consule->cover);
            }
            $coverPath = $request->file('cover')->store('covers');
            $consule->cover = $coverPath;
        }

        $consule->save();

        return redirect()->route('consules.index')->with('success', 'Consule berhasil diperbarui');
    }

    // Menghapus film
    public function destroy($slug)
    {
        $consule = Consule::where('slug', $slug)->firstOrFail(); // Mencari consule berdasarkan slug

        // Hapus file cover dari storage jika ada
        if ($consule->cover) {
            Storage::delete($consule->cover);
        }

        $consule->delete();
        return redirect()->route('consule.index')->with('success', 'Consule berhasil dihapus');
    }
}
