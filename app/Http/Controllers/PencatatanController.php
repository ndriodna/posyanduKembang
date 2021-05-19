<?php

namespace App\Http\Controllers;

use App\Pencatatan;
use App\Pendaftaran;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
        if (empty($request->tgl)) {
            $request->tgl = Carbon::now();
        }
        $pencatatan = pencatatan::create([
          'pendaftaran_id' => $request->pendaftaran_id,
          'bb_kg' => $request->bb_kg,
          'tb_cm' => $request->tb_cm,
          'lingkar_kepala' => $request->lingkar_kepala,
          'ntob' => $request->ntob,
          'tgl' => $request->tgl,
          'keterangan' => $request->keterangan,
        ]);
        $pencatatan->pendaftaran()->attach($request->pendaftaran_id);
        return redirect()->route('pencatatan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pencatatan  $pencatatan
     * @return \Illuminate\Http\Response
     */
    public function show(Pencatatan $pencatatan)
    {
      $pendaftaran = Pendaftaran::find($pencatatan);
      return view('pencatatan.show', compact('pendaftaran','pencatatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pencatatan  $pencatatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pencatatan $pencatatan)
    {
        $pendaftaran = Pendaftaran::all();
        return view('pencatatan.edit',compact('pencatatan','pendaftaran'));
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
        $pencatatan->update([
          'pendaftaran_id' => $request->pendaftaran_id,
          'bb_kg' => $request->bb_kg,
          'tb_cm' => $request->tb_cm,
          'lingkar_kepala' => $request->lingkar_kepala,
          'ntob' => $request->ntob,
          'tgl' => $request->tgl,
          'keterangan' => $request->keterangan,
        ]);
        $pencatatan->pendaftaran()->sync($request->pendaftaran_id);
        return redirect()->route('pencatatan.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pencatatan  $pencatatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pencatatan $pencatatan)
    {
        $pencatatan->delete();
        return redirect()->route('pencatatan.index');

    }
}
