<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnggotaRequest;
use App\Models\Anggota;
use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['anggotas'] = Anggota::paginate(4); //data_anggota untuk ditampilkan ke view
        return view('app', $data);
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
    public function store(AnggotaRequest $request)
    {
        Anggota::create($request->all());

        return redirect()->route('anggota.index')->with('success', 'Data Anggota berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['anggotas'] = Anggota::findOrFail($id);
        return view('edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnggotaRequest $request, $id)
    {
        $data['anggotas'] = Anggota::findOrFail($id);
        $data['anggotas']->update($request->all());

        return redirect()->route('anggota.index')->with('success', 'Data Anggota berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Anggota::findOrFail($id);
        $data->delete();

        return redirect()->route('anggota.index')->with('succes', 'Data Anggota berhasil dihapus!');
    }
}
