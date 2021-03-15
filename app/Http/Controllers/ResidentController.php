<?php

namespace App\Http\Controllers;

use App\Resident;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $residents = Resident::all();
        return view('residents.index', compact('residents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('residents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $residents = Resident::create([
          'nik' => $request->nik,
          'nama' => $request->nama,
          'tempat_tgl_lahir' => $request->tempat_tgl_lahir,
          'jenis_kelamin' => $request->jenis_kelamin,
          'alamat' => $request->alamat,
          'rt_rw' => $request->rt_rw,
          'kel_desa' => $request->kel_desa,
          'kecamatan' => $request->kecamatan,
          'agama' => $request->agama,
          'status_perkawinan' => $request->status_perkawinan,
          'pekerjaan' => $request->pekerjaan,
        ]);
        return redirect()->route('residents.index')->with('success', 'Data Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function show(Resident $resident)
    {
        return view('residents.show', compact('resident'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function edit(Resident $resident)
    {
      return view('residents.edit', compact('resident'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resident $resident)
    {
      $residents->update([
        'nik' => $request->nik,
        'nama' => $request->nama,
        'tempat_tgl_lahir' => $request->tempat_tgl_lahir,
        'jenis_kelamin' => $request->jenis_kelamin,
        'alamat' => $request->alamat,
        'rt_rw' => $request->rt_rw,
        'kel_desa' => $request->kel_desa,
        'kecamatan' => $request->kecamatan,
        'agama' => $request->agama,
        'status_perkawinan' => $request->status_perkawinan,
        'pekerjaan' => $request->pekerjaan,
      ]);
      return redirect()->route('residents.index')->with('success', 'Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $residents = Resident::FindOrFail($id);
        $residents->delete();

        return redirect()->route('residents.index')->with('success', 'Data Berhasil di Hapus');
    }
}
