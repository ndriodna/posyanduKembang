<?php

namespace App\Http\Controllers;

use App\Rekap;
use App\Pendaftaran;
use App\Pencatatan;
use App\Pelayanan;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendaftaran = Pendaftaran::all();
        $pencatatan = Pencatatan::all();
        $pelayanan = Pelayanan::all();
        return view('rekap.index',compact('pendaftaran','pencatatan','pelayanan'));
    }

    public function rekapDetail($id)
    {
        $detail = Pencatatan::find($id)->first();
        return response()->json($detail);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function show(Rekap $rekap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function edit(Rekap $rekap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rekap $rekap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rekap $rekap)
    {
        //
    }
}
