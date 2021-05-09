<?php

namespace App\Http\Controllers;

use App\Pencatatan;
use App\Pendaftaran;
use Illuminate\Http\Request;

class PencatatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendaftarans = Pendaftaran::all();
        $pencatatans = Pencatatan::all();
        return view('pencatatan.index', compact('pendaftarans','pencatatans'));
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
     * @param  \App\Pencatatan  $pencatatan
     * @return \Illuminate\Http\Response
     */
    public function show(Pencatatan $pencatatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pencatatan  $pencatatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pencatatan $pencatatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pencatatan  $pencatatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pencatatan $pencatatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pencatatan  $pencatatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pencatatan $pencatatan)
    {
        //
    }
}
