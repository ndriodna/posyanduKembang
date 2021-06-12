<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Tag;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;
class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beritas = Blog::orderBy('created_at','DESC')->limit(3)->get();
        $tag = Tag::all();
        OpenGraph::setDescription('Posyandu Kembang Sepatu didirikan pada tahun 1986 atas prakars warga RT 70,71, dan 72 Jl. sultan Sulaiman Kel. sidodadi kec. samarinda ulu');
        OpenGraph::setUrl('https://posyandu-kembangsepatu.xyz/');
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addImage(asset('assets/logo-new.png'), ['height' => 500, 'width' => 500]);
        return view('front.content.home',compact('beritas','tag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showNews()
    {
        $beritas = Blog::orderBy('created_at','DESC')->get();
        $tag = Tag::all();
        return view('front.content.news',compact('beritas','tag'));
    }
     public function showNewsDetail($slug)
     {
         $beritas = Blog::where('slug', $slug)->first();
         $tags = Tag::get();
         SEOMeta::setTitle($beritas->title);
         $p = strip_tags($beritas->desc);
         OpenGraph::setDescription($p);
         SEOMeta::addMeta('article:section', $beritas->tags);
          SEOMeta::addKeyword(['???', '???', '????']);
         OpenGraph::addProperty('type', 'article');
         OpenGraph::addProperty('locale', 'pt-br');
         OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);
         return view('front.content.newsDetail',compact('beritas','tags'));
     }

     public function showByTag($id)
     {
         $tag = Tag::where('id', $id)->first();
         $berita = Blog::all();
         return view('front.content.tag',compact('tag','berita'));
     }

     public function credits()
     {
         return view('front.content.credits');
     }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
