@extends('front.app')
@section('content')
<style type="text/css">
img {
  max-width: 100%;
  height: auto;
}
</style>
<div class="p-3">
  <h3 class="text-center">Tag: <span class="badge badge-primary">{{$tag->name}}</span></h3>
</div>
<div class="container ">
  <div class="row my-4 p-3">
    @foreach($tag->blog as $data)
    <div class="col-lg-12 md-12 sm-12">
      <div class="card shadow p-3 mb-5">
        <div class="card-body">
          <h5 class="card-title">{{$data->title}}</h5>
          <hr>
          {!!Str::limit(strip_tags($data->desc),200,'...')!!}
          <hr>
          @foreach($data->tag as $tag)
          <span class="badge badge-primary">{{$tag->name}}</span>
          @endforeach
          <br>
          <span class="text-secondary" style="font-size:14px">{{Carbon\Carbon::parse($data->created_at)->locale('id')->diffForHumans()}}</span>
          <hr>
          <a href="{{route('showNewsDetail',$data->slug)}}" class="btn btn-primary float-right">Baca Selengkapnya <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
