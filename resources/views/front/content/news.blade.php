@extends('front.app')
@section('content')
<div class="container">
	<div class="p-2">
		<h3 class="text-center">Berita</h3>
	</div>
		<div class="row mt-5">
			@foreach($beritas as $berita)
			<div class="col-lg-4 md-4 sm-12">
				<div class="card shadow p-3 mb-5">
					<div class="card-body">
						<h5 class="card-title">{{$berita->title}}</h5>
						@foreach($berita->tag as $tag)
						<span class="badge badge-primary p-2">{{$tag->name}}</span>
						@endforeach
						<hr>
						{!!Str::limit($berita->desc,200)!!}
						<br>
						<a href="{{route('showNewsDetail',$berita->slug)}}" class="btn btn-primary float-right mt-2">Baca Selengkapnya <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
			@endforeach
			
		</div>
	</div>
	@endsection
