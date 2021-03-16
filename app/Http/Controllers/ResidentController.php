<?php

namespace App\Http\Controllers;

use App\Familie;
use App\Resident;
use File;
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
        $families = Familie::all();
        return view('residents.index', compact('residents','families'));
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
      try {
        $img = $request->foto;
        if ($request->file('foto')) {
          $img = $request->foto->getClientOriginalName();
          $request->foto->storeAs('images/foto', $img);
        }
        $residents = Resident::create([
          'nik' => $request->nik,
          'no_kk' => $request->no_kk,
          'nama' => $request->nama,
          'foto' => $img,
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
      } catch (Exception $e) {
        return redirect()->back()->with(['error'=>$e->getMessage()]);

      }

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
      try {
        $img = $resident->foto;
        if ($request->file('image')) {
          File::delete(public_path('storage/images/foto/'.$resident->foto));
          $img1 = $request->foto->getClientOriginalName();
          $request->foto->storeAs('images/foto/', $img);
       }


      $residents->update([
        'nik' => $request->nik,
        'no_kk' => $request->no_kk,
        'nama' => $request->nama,
        'foto' => $img,
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
      } catch (Exception $e) {
        return redirect()->back()->with(['error'=>$e->getMessage()]);
      }
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
        if (!empty($residents->foto)) {
            File::delete(public_path('storage/images/foto/'.$residents->foto));
        }
        $residents->delete();

        return redirect()->route('residents.index')->with('success', 'Data Berhasil di Hapus');
    }
}
