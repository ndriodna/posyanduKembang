<?php

namespace App\Http\Controllers;

use App\Familie;
use App\Resident;
use App\User;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Spatie\Permission\Models\Role;

class FamilieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $families = Familie::all();
      $residents = Resident::all();
      $users = User::all();
      return view('families.index', compact('families','residents','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $residents = Resident::all();
      return view('families.create', compact('resident'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $users = User::create([
          'name' => $request->name,
          'email' => $request->name.'.'."@mail.com",
          'password' => bcrypt('secret'),
        ]);
        $users->assignRole('warga');

        $families = Familie::create([
          'no_kk' => $request->no_kk,
          'slug' => SlugService::createSlug(Familie::class, 'slug',$request->no_kk),
          'kepala_keluarga' => $request->kepala_keluarga,
          'alamat' => $request->alamat,
          'rt_rw' => $request->rt_rw,
          'kode_pos' => $request->kode_pos,
          'kel_desa' => $request->kel_desa,
          'kecamatan' => $request->kecamatan,
          'kab_kota' => $request->kab_kota,
          'provinsi' => $request->provinsi,
        ]);
        $families->user()->attach($users);
        $families->resident()->attach($request->kk);
        return redirect()->route('families.index')->with('success', 'Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Familie  $familie
     * @return \Illuminate\Http\Response
     */
    public function show(Familie $familie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Familie  $familie
     * @return \Illuminate\Http\Response
     */
    public function edit(Familie $familie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Familie  $familie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Familie $familie)
    {
      $familie->update([
        'no_kk' => $request->no_kk,
        'slug' => null,
        'kepala_keluarga' => $request->kepala_keluarga,
        'alamat' => $request->alamat,
        'rt_rw' => $request->rt_rw,
        'kode_pos' => $request->kode_pos,
        'kel_desa' => $request->kel_desa,
        'kecamatan' => $request->kecamatan,
        'kab_kota' => $request->kab_kota,
        'provinsi' => $request->provinsi,
      ]);
      $families->resident()->attach($request->anggota);
      return redirect()->route('families.index')->with('success', 'Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Familie  $familie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $families = Familie::FindOrFail($id);
      $families->resident()->detach();
      $families->user()->detach();
      $families->delete();
        return redirect()->route('families.index');
    }
}
