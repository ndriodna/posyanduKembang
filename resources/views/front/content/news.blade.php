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
 </div>
</div>
@endsection
