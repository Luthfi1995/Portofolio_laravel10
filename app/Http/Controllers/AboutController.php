<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        return view('admin.abouts.index', compact('abouts'));
    }

    public function create()
    {
        return view('admin.abouts.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'tentang1' => 'required',
                'tentang2' => 'required',
            ]);

            About::create($request->all());

            return redirect()->route('admin.about.index')->with('success', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            // Handle the error without logging
            return redirect()->route('admin.about.index')->with('error', 'Terjadi kesalahan saat menambahkan data. Silakan coba lagi.');
        }
    }
    public function edit(About $abouts)
    {
        return view('admin.abouts.edit', compact('abouts'));
    }

    public function update(Request $request, About $abouts)
    {
        try {
            $request->validate([
                'tentang1' => 'required',
                'tentang2' => 'required',
            ]);

            $abouts->update($request->all());

            return redirect()->route('admin.about.index')->with('success', 'Data Berhasil Diupdate');
        } catch (\Exception $e) {
            // Handle the error without logging
            return redirect()->route('admin.about.index')->with('error', 'Terjadi kesalahan saat update');
        }
    }

    public function destroy(About $abouts)
    {
        try {
            $abouts->delete();
            return redirect()->route('admin.about.index')->with('success', 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            // Handle the error without logging
            return redirect()->route('admin.about.index')->with('error', 'Terjadi kesalahan saat Menghapus');
        }
    }
}
