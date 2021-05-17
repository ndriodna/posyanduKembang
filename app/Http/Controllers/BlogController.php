<?php

namespace App\Http\Controllers;

use App\Blog;
use App\User;
use App\Tag;
use Auth;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        $users = User::find(Auth::user()->id);
        return view('blog.index', compact('blogs','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $blogs = Blog::all();
      $tags = Tag::all();
        return view('blog.create', compact('blogs','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = Blog::create([
          'user_id' => auth::id(),
          'title' => $request->title,
          'slug' => SlugService::createSlug(Blog::class, 'slug',$request->title),
          'desc' => $request->desc,
        ]);
        $blog->tag()->attach($request->tags_input);

        if($blog){
        $tagNames = explode(',',$request->get('tags'));
        $tagIds = [];
        foreach($tagNames as $tagName)
        {
            //$blog->tags()->create(['name'=>$tagName]);
            //Or to take care of avoiding duplication of Tag
            //you could substitute the above line as
            $tag = Tag::firstOrCreate(['name'=>$tagName]);
            if($tag)
            {
              $tagIds[] = $tag->id;
            }

        }
        $blog->tag()->attach($tagIds);
        }

        return redirect()->route('blog.index')->with('success', 'Berhasil');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $tags = Tag::all();
        return view('blog.edit',compact('tags','blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
      $blog->update([
        'title' => $request->title,
        'slug' => null,
        'desc' => $request->desc,
      ]);
      $blog->tag()->sync($request->tagss);

                  if($blog){
      $tagNames = explode(',',$request->get('tags'));
      $tagIds = [];
      foreach($tagNames as $tagName)
      {
          //$blog->tags()->create(['name'=>$tagName]);
          //Or to take care of avoiding duplication of Tag
          //you could substitute the above line as
          $tag = Tag::firstOrCreate(['name'=>$tagName]);
          if($tag)
          {
            $tagIds[] = $tag->id;
          }

      }
      $blog->tag()->attach($tagIds);
      }
      return redirect()->route('blog.index')->with('success', 'Berhasil');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogs = Blog::findorfail($id);
        $blogs->tag()->detach();
        $blogs->delete();
        return redirect()->route('blog.index');
    }
}
