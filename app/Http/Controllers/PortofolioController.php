<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portofolios = Portofolio::all();
        return view('admin.portofolio.index', compact('portofolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portofolio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required',
                'gambar' => 'required|image',
                'deskripsi' => 'required',
            ]);

            $imagePath = $request->file('gambar')->store('portofolio', 'public');

            Portofolio::create([
                'nama' => $request->nama,
                'gambar' => $imagePath,
                'deskripsi' => $request->deskripsi,
            ]);

            return redirect()->route('admin.portofolio')->with('success', 'Portofolio created successfully.');
        } catch (\Exception $e) {
            // Handle the error without logging
            return redirect()->route('admin.portofolio')->with('error', 'An error occurred while creating the content. Please try again later.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portofolio $portofolios)
    {
        // $portofolios = Portofolio::findOrFail($id);
        return view('admin.portofolio.edit', compact('portofolios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portofolio $portofolios)
    {
        try {
            $request->validate([
                'nama' => 'required',
                'gambar' => 'image',
                'deskripsi' => 'required',
            ]);

            if ($request->hasFile('gambar')) {
                // Hapus gambar lama jika ada
                if (Storage::exists('public/' . $portofolios->gambar)) {
                    Storage::delete('public/' . $portofolios->gambar);
                }

                $gambarPath = $request->file('gambar')->store('portofolio', 'public');
                $portofolios->update([
                    'nama' => $request->nama,
                    'gambar' => $gambarPath,
                    'deskripsi' => $request->deskripsi,
                ]);
            } else {
                $portofolios->update([
                    'nama' => $request->nama,
                    'deskripsi' => $request->deskripsi,
                ]);
            }

            return redirect()->route('admin.portofolio')->with('success', 'Content updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.portofolio')->with('error', 'There was an error updating the content.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portofolio $portofolios)
    {
        try {
            // Hapus gambar jika ada
            if (Storage::exists('public/' . $portofolios->gambar)) {
                Storage::delete('public/' . $portofolios->gambar);
            }
            $portofolios->delete();
            return redirect()->route('admin.portofolio')->with('success', 'Content deleted successfully.');
        } catch (\Exception $e) {
            // Log error message and return with error feedback
            return redirect()->route('admin.portofolio')->with('error', 'There was an error
                    deleting the content.');
        }
    }
}
