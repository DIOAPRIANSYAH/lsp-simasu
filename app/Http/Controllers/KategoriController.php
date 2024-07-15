<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kategoris = Kategori::when($search, function ($query, $search) {
            return $query->where('nama', 'like', '%'.$search.'%')
                         ->orWhere('keterangan', 'like', '%'.$search.'%');
        })->paginate(10);

        return view('pages.kategori.index', compact('kategoris'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:40',
            'keterangan' => 'required|max:255',
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategori.index')
                         ->with('success', 'Kategori created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($encryptedId)
    {
        $kategori = Kategori::findByEncryptedId($encryptedId);

        if ($kategori === null) {
            return redirect()->route('kategori.index')
                             ->with('error', 'Kategori not found.');
        }

        return view('pages.kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($encryptedId)
    {
        $kategori = Kategori::findByEncryptedId($encryptedId);

        if ($kategori === null) {
            return redirect()->route('kategori.index')
                             ->with('error', 'Kategori not found.');
        }

        return view('pages.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $encryptedId)
    {
        $kategori = Kategori::findByEncryptedId($encryptedId);

        if ($kategori === null) {
            return redirect()->route('kategori.index')
                             ->with('error', 'Kategori not found.');
        }

        $request->validate([
            'nama' => 'required|max:40',
            'keterangan' => 'required|max:255',
        ]);

        $kategori->update($request->all());

        return redirect()->route('kategori.index')
                         ->with('success', 'Kategori updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($encryptedId)
    {
        $kategori = Kategori::findByEncryptedId($encryptedId);

        if ($kategori === null) {
            return redirect()->route('kategori.index')
                             ->with('error', 'Kategori not found.');
        }

        $kategori->delete();

        return redirect()->route('kategori.index')
                         ->with('success', 'Kategori deleted successfully.');
    }
}
