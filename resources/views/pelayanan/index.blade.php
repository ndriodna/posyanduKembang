@extends('layouts.app')

@section('content')

<div class="container">
  <div class="p-2 mb-3">
    <h3 class="mb-3">Pelayanan</h3>
    <form action="#">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Cari" id="myInput">
      </div>
    </form>
  </div>
  <div class="row">
    <ul class="list-group list-group-horizontal" id="myList">
      @foreach($pendaftarans as $pendaftaran)
      <li class="list-group">
          <div class="card shadow p-2">
            <div class="card-header">
              <h5>Data anak</h5>
            </div>
            <h5 class="text-center">{{$pendaftaran->nama}}</h5>
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
             <hr>
           <div class="text-center p-2 mb-3"><h5>Riwayat Pencatatan</h5></div>
             @foreach($pencatatans as $data)
               <div class="row mb-3">
                 <div class="col-6"><h6>Tgl terakhir timbang</h6></div>
                 <div class="col-6">
                   <h6>{{date('d-m-Y',strtotime($data->tgl))}}</h6>
                 </div>
               </div>
               <div class="row mb-3">
                 <div class="col-6"><h6>Berat Badan terakhir</h6></div>
                 <div class="col-6"><h6>{{$data->bb_kg}}</h6></div>
               </div>
               <div class="row mb-3">
                 <div class="col-6"><h6>Tinggi Badan terakhir</h6></div>
                 <div class="col-6"><h6>{{$data->tb_cm}}</h6></div>
               </div>
                <div class="row mb-3">
                 <div class="col-6">
                  <h6>NTOB</h6>
                </div>
                 <div class="col-6">
                  <h6>{{$data->ntob}}</h6>
                </div>
               </div>
                 <a href="{{route('addPelayanan',$data->id)}}" class="btn btn-primary float-right">a</a>
               <hr>
             @endforeach
           </div>
         </div>
     </li>
     @endforeach
   </ul>

 </div>
</div>


@push('js')
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
