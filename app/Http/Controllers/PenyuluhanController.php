<?php

namespace App\Http\Controllers;

use App\Penyuluhan;
use Illuminate\Http\Request;

class PenyuluhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penyuluhans = Penyuluhan::all();
        return view('penyuluhan.index',compact('penyuluhans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'waktu_tempat' => 'required|string',
            'materi' => 'required|string',
            'peserta' => 'required|string',
        ]);
        Penyuluhan::create([
            'waktu_tempat' => $request->waktu_tempat,
            'materi' => $request->materi,
            'peserta' => $request->peserta
        ]);
        return redirect()->route('penyuluhan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penyuluhan  $penyuluhan
     * @return \Illuminate\Http\Response
     */
    public function show(Penyuluhan $penyuluhan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penyuluhan  $penyuluhan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penyuluhan $penyuluhan)
    {
        return view('penyuluhan.edit',compact('penyuluhan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penyuluhan  $penyuluhan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penyuluhan $penyuluhan)
    {
        $penyuluhan->update([
            'waktu_tempat' => $request->waktu_tempat,
            'materi' => $request->materi,
            'peserta' => $request->peserta
        ]);
        return redirect()->route('penyuluhan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penyuluhan  $penyuluhan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penyuluhan $penyuluhan)
    {
        $penyuluhan->delete();
        return redirect()->route('penyuluhan.index');
    }
}
