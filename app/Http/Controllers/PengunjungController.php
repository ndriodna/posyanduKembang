<?php

namespace App\Http\Controllers;

use App\Data;
use App\Pengunjung;
use File;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengunjungs = Pengunjung::all();
        return view('pengunjung.index', compact('pengunjungs'));
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

    public function buatkk($id)
    {
        $residents = Pengunjung::FindOrFail($id);
        return view('residents.kk',compact('residents'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveFile($name,$img)
    {
      $getName = $name.'.'.$img->getClientOriginalExtension();
      $path = $img->storeAs('images/foto/',$getName);
      return $path;
    }
    public function store(Request $request)
    {
      $this->validate($request,[
        'nik' => 'required|max:20|unique:pengunjungs,nik',
        'nama' => 'required|string|max:50',
        'tgl_lahir' => 'required|date',
        'jenis_kelamin' => 'required',
        'kategori' => 'required',
        'alamat' => 'nullable',
        'rt_rw' => 'nullable',
        'kel_desa' => 'nullable',
        'kecamatan' => 'nullable',
      ]);
        Pengunjung::create($this->PengunjungStore());

        return redirect()->route('pengunjung.index')->with('success', 'Data Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function show(Pengunjung $resident)
    {
        // return view('residents.show', compact('resident'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengunjung $pengunjung)
    {
        return view('pengunjung.edit', compact('pengunjung'));
    }

    public function selectkk($slug)
    {
        $resident = Pengunjung::where('slug',$slug)->first();
        return view('residents.select',compact('resident'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengunjung $pengunjung)
    {
      $this->validate($request,[
        'nik' => 'required|max:20|exists:pengunjungs,nik',
        'nama' => 'required|string|max:50',
        'tgl_lahir' => 'required|date',
        'jenis_kelamin' => 'required',
        'kategori' => 'required',
        'alamat' => 'nullable',
        'rt_rw' => 'nullable',
        'kel_desa' => 'nullable',
        'kecamatan' => 'nullable',
      ]);
      $pengunjung->update($this->PengunjungStore());

      return redirect()->route('pengunjung.index')->with('success', 'Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengunjungs = Pengunjung::FindOrFail($id);
        $pengunjungs->delete();

        return redirect()->route('pengunjung.index')->with('success', 'Data Berhasil di Hapus');
    }

    public function PengunjungStore()
    {
      return[
          'nik' => request('nik'),
          'nama' => request('nama'),
          'tgl_lahir' => request('tgl_lahir'),
          'jenis_kelamin' => request('jenis_kelamin'),
          'kategori' => request('kategori'),
          'alamat' => request('alamat'),
          'rt_rw' => request('rt_rw'),
          'kel_desa' => request('kel_desa'),
          'kecamatan' => request('kecamatan')
      ];
    }
}
