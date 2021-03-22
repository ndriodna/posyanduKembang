<?php

namespace App\Http\Controllers;

use App\Familie;
use App\Resident;
use File;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function buatkk($id)
    {
        $residents = Resident::FindOrFail($id);
        $families = Familie::all();
        return view('residents.kk',compact('residents','families'));
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
      try {
        if ($request->hasFile('foto')) {
          $img = $this->saveFile($request->nama,$request->file('foto'));
        }
        $residents = Resident::create([
          'nik' => $request->nik,
          'slug' => SlugService::createSlug(Resident::class, 'slug',$request->nik),
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
        // return view('residents.show', compact('resident'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function edit(Resident $resident)
    {
      $families = Familie::all();
      return view('residents.edit', compact('resident','families'));
    }

    public function selectkk($slug)
    {
        $resident = Resident::where('slug',$slug)->first();
        $families = Familie::all();
        return view('residents.select',compact('resident','families'));
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
        if ($request->hasFile('foto')) {
          Storage::delete($img);
          $img = $this->saveFile($request->nama,$request->file('foto'));
       }
      $resident->update([
        'nik' => $request->nik,
        'slug' => null,
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
      $resident->familie()->sync($request->kk);

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
        Storage::delete($residents->foto);
        $residents->delete();

        return redirect()->route('residents.index')->with('success', 'Data Berhasil di Hapus');
    }
}
