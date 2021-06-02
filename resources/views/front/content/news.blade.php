@extends('front.app')
@section('content')
<style type="text/css">
img {
  max-width: 100%;
  height: 400px;
}
</style>
<div class="container mt-2 mb-5 p-3">
 <div class="row">
  @foreach($beritas as $berita)
  <div class="col-lg-4 md-4 sm-12">
   <div class="card shadow p-3 mb-5">
     <div class="card-body">
       <h4>{{$berita->title}}</h4>
       <hr>
         @foreach($berita->tag as $data)
         <span class="badge badge-primary">{{$data->name}}</span>
         @endforeach
         <br>
        <span class="text-secondary" style="font-size:14px">{{Carbon\Carbon::parse($berita->created_at)->locale('id')->diffForHumans()}}</span> <hr>
       {!!Str::limit(strip_tags($berita->desc),200,'...')!!}
       <br>
        <a href="{{route('showNewsDetail',$berita->slug)}}" class="btn btn-primary float-right mt-2">Baca Selengkapnya <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
     </div>
   </div>
 </div>
 @endforeach
</div>
</div>
@endsection
