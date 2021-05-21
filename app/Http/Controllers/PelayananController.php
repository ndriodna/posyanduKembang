<?php

namespace App\Http\Controllers;

use App\Pelayanan;
use App\Pendaftaran;
use App\Pencatatan;
use Illuminate\Http\Request;

class PelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelayanans = Pelayanan::all();
        $pendaftarans = Pendaftaran::all();
        $pencatatans = Pencatatan::all();
        return view('pelayanan.index',compact('pelayanans','pendaftarans','pencatatans'));
    }

    public function pendaftaranDetail($id)
    {
        $detail = Pencatatan::find($id);
        return response()->json($detail);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function listPelayanan()
    {
        $pelayanan = Pelayanan::all();
        return view('pelayanan.list',compact('pelayanan'));
    }
    
    public function addPelayanan($id)
    {
      $pendaftaran = Pendaftaran::findorfail($id);
        $pencatatan = Pencatatan::all();
        return view('pelayanan.create',compact('pendaftaran','pencatatan'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pelayanan = Pelayanan::create([
          'pendaftaran_id' => $request->pendaftaran_id,
          'jenis_pelayanan' => $request->jenis_pelayanan,
          'keterangan' => $request->keterangan,
        ]);
        return redirect()->route('pelayanan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pelayanan  $pelayanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelayanan $pelayanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pelayanan  $pelayanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelayanan $pelayanan)
    {
      $pendaftaran = Pendaftaran::first();
        $pencatatan = Pencatatan::first();
        return view('pelayanan.edit',compact('pelayanan','pendaftaran','pencatatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pelayanan  $pelayanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelayanan $pelayanan)
    {
      $pelayanan->update([
        'pendaftaran_id' => $request->pendaftaran_id,
        'jenis_pelayanan' => $request->jenis_pelayanan,
        'keterangan' => $request->keterangan,
      ]);
      return redirect()->route('pelayanan.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pelayanan  $pelayanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelayanan $pelayanan)
    {
        //
    }
}
