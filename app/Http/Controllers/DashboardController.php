<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\About;
use App\Models\Contact;
use App\Models\Portofolio;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $homes = Home::all();
        $portofolios = Portofolio::all();
        $abouts = About::all();
        return view('front-end.layouts.master', compact('homes', 'portofolios', 'abouts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        try {
            Contact::create($request->all());

            return redirect()->route('dashboard')->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('error', 'There was an error sending your message.');
        }
    }
}
