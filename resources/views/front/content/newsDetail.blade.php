@extends('front.app')
@section('content')
<style type="text/css">
img {
  max-width: 100%;
  height: auto;
}
</style>
<div class="container mt-2 mb-5 p-3">
 <div class="row">
   <div class="col-lg-10 md-10 sm-12">
     <h4>{{$beritas->title}}</h4>
     <hr>
     @foreach($beritas->tag as $data)
     <span class="badge badge-primary">{{$data->name}}</span>
     @endforeach
     {!!$beritas->desc!!}
   </div>
   <div class="col-lg-2 md-2 sm-12">
     <h5>Tag</h5>
     @foreach($tags as $tag)
     {{-- $tag->slug nda mau klo pake $tag->name mau --}}
     {{-- {{dd($tag->slug)}} --}}
     <a href="{{route('showByTag',$tag->id)}}" class="badge badge-primary ">{{$tag->name}}</a>
     @endforeach
   </div>
 </div>
</div>
@endsection
