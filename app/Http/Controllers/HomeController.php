<?php

namespace App\Http\Controllers;
use App\Pendaftaran;
use App\Pencatatan;
use App\Blog;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $pendaftaran = Pendaftaran::all();
        $pencatatan = Pencatatan::all();
        $blog = Blog::all();
        $user = User::all();
        // dd($pendaftaran->count());
        return view('dashboard',compact('pendaftaran','pencatatan','blog','user'));
    }

    public function index2()
    {
        return view('dashboard2');
    }

    public function helpPage()
    {
        return view('help');
    }
}
