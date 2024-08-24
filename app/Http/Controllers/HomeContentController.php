<?php

namespace App\Http\Controllers;

use Log;
use Exception;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;

class HomeContentController extends Controller
{
    public function index()
    {
        $homes = Home::all();
        return view('admin.home.index', compact('homes'));
    }

    public function create()
    {
        return view('admin.home.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'image' => 'required|image',
                'description' => 'required',
            ]);

            $imagePath = $request->file('image')->store('homeImage', 'public');

            Home::create([
                'title' => $request->title,
                'image' => $imagePath,
                'description' => $request->description,
            ]);

            return redirect()->route('admin.home.index')->with('success', 'Content created successfully.');
        } catch (\Exception $e) {
            // Handle the error without logging
            return redirect()->route('admin.home.create')->with('error', 'An error occurred while creating the content. Please try again later.');
        }
    }


    public function edit(Home $homes)
    {
        // $homes = Home::findOrFail($id);
        return view('admin.home.edit', compact('homes'));
    }

    public function update(Request $request, Home $homes)
    {
        try {
            $request->validate([
                'title' => 'required',
                'image' => 'image',
                'description' => 'required',
            ]);

            if ($request->hasFile('image')) {
                // Hapus gambar lama jika ada
                if (Storage::exists('public/' . $homes->image)) {
                    Storage::delete('public/' . $homes->image);
                }

                $imagePath = $request->file('image')->store('homeImage', 'public');
                $homes->update([
                    'title' => $request->title,
                    'image' => $imagePath,
                    'description' => $request->description,
                ]);
            } else {
                $homes->update([
                    'title' => $request->title,
                    'description' => $request->description,
                ]);
            }

            return redirect()->route('admin.home.index')->with('success', 'Content updated successfully.');
        } catch (\Exception $e) {
            // Log error message and return with error feedback

            return redirect()->route('admin.home.index')->with('error', 'There was an error updating the content.');
        }
    }


    public function destroy(Home $homes)
    {
        try {
            // Hapus file gambar dari storage
            if (Storage::exists('public/' . $homes->image)) {
                Storage::delete('public/' . $homes->image);
            }

            // Hapus data dari database
            $homes->delete();

            return redirect()->route('admin.home.index')->with('success', 'Content deleted successfully.');
        } catch (Exception $e) {
            // Tangani error dan berikan pesan kepada pengguna

            return redirect()->route('admin.home.index')->with('error', 'There was an error deleting the content.');
        }
        // Hapus data yang bergantung terlebih dahulu
        // Hapus gambar dari storage jika ada
        // if ($homes->image) {
        //     Storage::disk('public')->delete($homes->image);
        // }

        // $homes->delete();

        // return redirect()->route('admin.home.index')->with('success', 'Content deleted successfully.');
    }
}
