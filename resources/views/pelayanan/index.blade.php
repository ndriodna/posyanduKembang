@extends('layouts.app')

@section('content')

<div class="container-fluid mt-8">
  <div class="mb-3">
    <h3 class="mb-3">Pelayanan</h3>
    <form action="#">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Cari" id="myInput">
      </div>
    </form>
  </div>
  <div class="row row-cols-1 row-cols-md-12 g-4 p-1" >
  <ul class="list-group list-group-horizontal" id="myList">
    @foreach($pendaftarans as $pendaftaran)
    <li class="list-group">
      <div class="col-auto">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{$pendaftaran->nama}}</h3>
          </div>
          <div class="card-body">
            <div class="row mb-3">
           <div class="col-6">No BPJS</div>
           <div class="col-6">{{$pendaftaran->no_bpjs}}</div>
            </div>
            <div class="row mb-3">
           <div class="col-6">Jenis Kelamin</div>
           <div class="col-6">{{$pendaftaran->jenis_kelamin}}</div>
            </div>
            <div class="row mb-3">
           <div class="col-6">Nama orang tua</div>
           <div class="col-6">
            {{!empty($pendaftaran->nama_bpk) ? $pendaftaran->nama_bpk : "-"}} & {{!empty($pendaftaran->nama_ibu) == true ?$pendaftaran->nama_ibu : "-"}}
          </div>
            </div>
            <div class="row mb-3">
           <div class="col-6">Umur</div>
           <div class="col-6">{{Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($pendaftaran->tgl_lahir))}} Bulan</div>
            </div>
            @foreach($pendaftaran->pencatatan as $data)
            @if ($data->pendaftaran_id == null)
              <p>Belum ada Catatan</p>
            @else
              <div class="row mb-3">
             <div class="col-6">Tgl terakhir timbang</div>
             <div class="col-6">
               {{$data->tgl}}
             </div>
              </div>
              <div class="row mb-3">
             <div class="col-6">NTOB</div>
             <div class="col-6">{{$data->ntob}}</div>
              </div>
              <div class="row mb-3">
             <div class="col-6">Berat Badan terakhir</div>
             <div class="col-6">{{$data->bb_kg}}</div>
              </div>
              <div class="row mb-3">
             <div class="col-6">Tinggi Badan terakhir</div>
             <div class="col-6">{{$data->tb_cm}}</div>
              </div>
            @endif
         <div class="">
           <a href="{{route('addPelayanan',$pendaftaran->id)}}" class="btn btn-primary float-right"><i class="fa fa-plus fa-lg" aria-hidden="true"></i></a>
         </div>
       @endforeach

         </div>
       </div>
     </div>
    </li>
  @endforeach
  </ul>

 </div>
</div>


@push('js')
<script type="text/javascript">
  $('#detail').change(function() {
    var id = $(this).val();
    var url = '{{ route("getDetail", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
      url: url,
      type: 'get',
      dataType: 'json',
      success: function (response) {
        if (response != null) {
          $('#tgl_lahir').val(response.umur)
        }
      }
    })
  })
</script>

<script>
     $(document).ready(function(){
     $("#myInput").on("keyup", function() {
     var value = $(this).val().toLowerCase();
     $("#myList li").filter(function() {
     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
     });
     });
     });
     </script>
@endpush
@endsection
