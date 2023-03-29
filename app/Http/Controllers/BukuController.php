<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Buku::paginate(4);
        return view('app', [
            'bukus' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'Kode_Buku' => 'required',
            'Nama_Buku' => 'required',
            'Kategori' => 'required',
            'Deskripsi' => 'required',
            'Penerbit' => 'required',
            'Tanggal_Terbit' => 'required',
        ]);
        Buku::create($request->all());  

        return redirect()->route('buku.index')->with('success', 'Data Buku berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        $data = Buku::findOrFail($buku->id);
        return view('edit', [
            'buku' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    {
        $data['buku'] = Buku::findOrFail($buku->id);
        $data['buku']->update($request->all());

        return redirect()->route('buku.index')->with('success', 'Data Buku berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        $data['buku'] = Buku::findOrFail($buku->id);
        $data['buku']->delete();

        return redirect()->route('buku.index')->with('success', 'Data Buku berhasil dihapus!');
    }
}
