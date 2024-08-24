<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\About;
use App\Models\Contact;
use App\Models\Portofolio;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }


    public function destroy($id)
    {
        try {
            $contact = Contact::findOrFail($id);
            $contact->delete();

            return redirect()->route('admin.contact.index')->with('success', 'Contact deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.contact.index')->with('error', 'There was an error deleting the contact.');
        }
    }
}
