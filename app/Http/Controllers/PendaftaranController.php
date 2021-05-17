<?php

namespace App\Http\Controllers;
use App\Pendaftaran;
use App\Pencatatan;
use App\Http\Requests\PendaftaranValidate;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendaftarans = Pendaftaran::all();
        return view('pendaftaran.index', compact('pendaftarans'));
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

    public function addNote($id)
    {
        $pendaftaran = Pendaftaran::findorFail($id);
        $pencatatans = Pencatatan::all();
        return view('pencatatan.create', compact('pendaftaran','pencatatans'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PendaftaranValidate $request)
    {
        $request->validated();
        Pendaftaran::create($this->PendaftaranStore());
        return redirect()->route('pendaftaran.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftaran $pendaftaran)
    {
        return view('pendaftaran.show',compact('pendaftaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        return view('pendaftaran.edit',compact('pendaftaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        $pendaftaran->update($this->PendaftaranStore());
        return redirect()->route('pendaftaran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();
        return redirect()->route('pendaftaran.index');
    }

    public function PendaftaranStore()
    {
        return[
          'no_bpjs' => request('no_bpjs'),
          'nama' => request('nama'),
          'nama_bpk' => request('nama_bpk'),
          'nama_ibu' => request('nama_ibu'),
          'tgl_lahir' => request('tgl_lahir'),
          'jenis_kelamin' => request('jenis_kelamin'),
          'alamat' => request('alamat'),
          'rt_rw' => request('rt_rw'),
          'berat_badan_lahir' => request('berat_badan_lahir'),
          'panjang_badan_lahir' => request('panjang_badan_lahir')
      ];
    }
}
