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
               <div class="col-6"><h6>No BPJS</h6></div>
               <div class="col-6"><h6>{{$pendaftaran->no_bpjs}}</h6></div>
             </div>
             <div class="row mb-3">
               <div class="col-6"><h6>Jenis Kelamin</h6></div>
               <div class="col-6"><h6>{{$pendaftaran->jenis_kelamin}}</h6></div>
             </div>
             <div class="row mb-3">
               <div class="col-6"><h6>Nama orang tua</h6></div>
               <div class="col-6"><h6>
                {{!empty($pendaftaran->nama_bpk) ? $pendaftaran->nama_bpk : "-"}} & {{!empty($pendaftaran->nama_ibu) == true ?$pendaftaran->nama_ibu : "-"}}</h6></div>
            </div>
            <div class="row mb-3">
             <div class="col-6"><h6>Umur</h6></div>
             <div class="col-6"><h6>{{Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($pendaftaran->tgl_lahir))}} Bulan</h6></div>
           </div>
           @forelse($pendaftaran->pencatatanOne as $data)
           @if (!empty($data))
           <div class="row mb-3">
             <div class="col-6"><h6>Tgl terakhir timbang</h6></div>
             <div class="col-6">
               <h6>{{date('d-m-Y',strtotime($data->tgl))}}</h6>
             </div>
           </div>
           <div class="row mb-3">
             <div class="col-6"><h6>NTOB</h6></div>
             <div class="col-6"><h6>{{$data->ntob}}</h6></div>
           </div>
           <div class="row mb-3">
             <div class="col-6"><h6>Berat Badan terakhir</h6></div>
             <div class="col-6"><h6>{{$data->bb_kg}}</h6></div>
           </div>
           <div class="row mb-3">
             <div class="col-6"><h6>Tinggi Badan terakhir</h6></div>
             <div class="col-6"><h6>{{$data->tb_cm}}</h6></div>
           </div>
           @endif
           @empty
           <p class="text-center">Belum Memiliki Catatan</p>
           @endforelse
           <div class="">
             <a href="{{route('addPelayanan',$pendaftaran->id)}}" class="btn btn-primary float-right"><i class="fa fa-plus fa-lg" aria-hidden="true"></i></a>
           </div>

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
