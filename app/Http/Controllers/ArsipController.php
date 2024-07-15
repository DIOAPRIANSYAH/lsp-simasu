<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;
use Dompdf\Options;
use PDF;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $arsips = Arsip::when($search, function ($query, $search) {
            return $query->where('no_surat', 'like', '%'.$search.'%')
                         ->orWhere('judul', 'like', '%'.$search.'%');
        })->with('kategori')->paginate(10);

        return view('pages.arsip.index', compact('arsips'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('pages.arsip.create', compact('kategoris'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required|exists:kategori,id',
            'no_surat' => 'required|max:100',
            'judul' => 'required|max:255',
            'file_surat' => 'required',
        ]);

        $arsip = new Arsip($request->all());

        if ($request->hasFile('file_surat')) {
            $file = $request->file('file_surat');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/surat', $fileName);
            $arsip->file_surat = '/storage/surat/' . $fileName;
        }

        $arsip->save();

        return redirect()->route('arsip.index')
                         ->with('success', 'Arsip created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show($encryptedId)
    {
        $arsip = Arsip::findByEncryptedId($encryptedId);

        if ($arsip === null) {
            return redirect()->route('arsip.index')
                             ->with('error', 'Arsip not found.');
        }

        return view('pages.arsip.show', compact('arsip'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($encryptedId)
    {
        $kategoris = Kategori::all();

        $arsip = Arsip::findByEncryptedId($encryptedId);

        if ($arsip === null) {
            return redirect()->route('arsip.index')
                             ->with('error', 'Arsip not found.');
        }

        return view('pages.arsip.edit', compact('arsip','kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $encryptedId)
    {
        $arsip = Arsip::findByEncryptedId($encryptedId);

        if ($arsip === null) {
            return redirect()->route('arsip.index')
                             ->with('error', 'Arsip not found.');
        }

        $request->validate([
            'id_kategori' => 'required|exists:kategori,id',
            'no_surat' => 'required|max:100',
            'judul' => 'required|max:255',
            'file_surat' => 'required', // Use 'sometimes' to allow file update
        ]);

        // Update the attributes
        $arsip->id_kategori = $request->id_kategori;
        $arsip->no_surat = $request->no_surat;
        $arsip->judul = $request->judul;
        $arsip->waktu_pengarsipan = now();

        if ($request->hasFile('file_surat')) {
            // Delete the old file if it exists
            if ($arsip->file_surat && Storage::disk('public')->exists($arsip->file_surat)) {
                Storage::disk('public')->delete($arsip->file_surat);
            }

            // Store the new file
            $file = $request->file('file_surat');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/surat', $fileName);
            $arsip->file_surat = '/storage/surat/' . $fileName;
        }

        $arsip->save();

        return redirect()->route('arsip.index')
                         ->with('success', 'Arsip updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($encryptedId)
    {
        $arsip = Arsip::findByEncryptedId($encryptedId);

        if ($arsip === null) {
            return redirect()->route('arsip.index')
                             ->with('error', 'Arsip not found.');
        }

        // Delete the file if it exists
        if ($arsip->file_surat && Storage::disk('public')->exists($arsip->file_surat)) {
            Storage::disk('public')->delete($arsip->file_surat);
        }

        $arsip->delete();

        return redirect()->route('arsip.index')
                         ->with('success', 'Arsip deleted successfully.');
    }

    public function about(Request $request)
    {
        return view('pages.about.index');
    }

}
