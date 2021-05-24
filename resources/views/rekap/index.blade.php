@extends('layouts.app')

@section('content')
  <div class="">
    <div class="row">
      <div class="col-lg-12 md-12 sm-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Rekap</h4>
          </div>
          <div class="card-body">
            
            <div class="table-responsive">
              <table class="table" id="datatable">
                <thead>
                  <th>Nama</th>
                  <th>OrangTua</th>
                  <th>Jenis Kelamin</th>
                  <th>Tgl Lahir</th>
                  <th>Umur</th>
                  <th>BB</th>
                  <th>TB</th>
                  <th>LK</th>
                  <th>NTOB</th>
                  <th>Pelayanan</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  @foreach ($pendaftaran as $pendaftaran)
                    @foreach ($pendaftaran->pencatatan as $data)
                  <tr>
                    <td>{{$pendaftaran->no_bpjs}}</td>
                    <td>{{$pendaftaran->nama}}</td>
                    <td>{{$pendaftaran->tgl_lahir}}</td>
                    <td>{{$pendaftaran->jenis_kelamin}}</td>
                    <td>{{$pendaftaran->rt_rw}}</td>
                    <td>{{Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($data->tgl_lahir))}}</td>
                    <td>{{$data->bb_kg}}</td>
                    <td>{{$data->tb_cm}}</td>
                    <td>{{$data->lingkar_kepala}}</td>
                    <td>{{$data->ntob}}</td>
                    <td class="col-auto">
                      <div class="btn-group">
                        <div class="dropdown">
                          <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-plus-square fa-lg"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a href="{{route('addNote',$pendaftaran->id)}}" class="dropdown-item">Buat Catatan</a>
                          </div>
                        </div>
                      </div>
                      <div class="btn-group">
                        <div class="dropdown">
                          <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-pen-square fa-lg"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a href="{{route('pendaftaran.edit',$pendaftaran->id)}}" class="dropdown-item">Ubah Data</a>
                          </div>
                        </div>
                      </div>
                      <a class=" btn btn-info" href="{{route('pendaftaran.show',$pendaftaran->id)}}"><i class="fa fa-eye fa-lg"></i></a>
                      <div class="btn-group">
                        <div class="dropdown ">
                          <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-trash fa-lg"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <form id="delete-form-{{$pendaftaran->id}}" action="{{ route('pendaftaran.destroy',$pendaftaran->id) }}" method="POST" >
                              @csrf
                              @method('DELETE')
                              <a href="#" class="dropdown-item" onclick="deleteItem({{$pendaftaran->id}})">Hapus</a>
                            </form>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                    @endforeach
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@push('js')
<script type="text/javascript">
//fungsi untuk filtering data berdasarkan tanggal
 var start_date;
 var end_date;
 var DateFilterFunction = (function (oSettings, aData, iDataIndex) {
    var dateStart = parseDateValue(start_date);
    var dateEnd = parseDateValue(end_date);
    //Kolom tanggal yang akan kita gunakan berada dalam urutan 2, karena dihitung mulai dari 0
    //nama depan = 0
    //nama belakang = 1
    //tanggal terdaftar =2
    var evalDate= parseDateValue(aData[2]);
      if ( ( isNaN( dateStart ) && isNaN( dateEnd ) ) ||
           ( isNaN( dateStart ) && evalDate <= dateEnd ) ||
           ( dateStart <= evalDate && isNaN( dateEnd ) ) ||
           ( dateStart <= evalDate && evalDate <= dateEnd ) )
      {
          return true;
      }
      return false;
});

// fungsi untuk converting format tanggal dd/mm/yyyy menjadi format tanggal javascript menggunakan zona aktubrowser
function parseDateValue(rawDate) {
    var dateArray= rawDate.split("/");
    var parsedDate= new Date(dateArray[2], parseInt(dateArray[1])-1, dateArray[0]);  // -1 because months are from 0 to 11
    return parsedDate;
}

$( document ).ready(function() {
//konfigurasi DataTable pada tabel dengan id example dan menambahkan  div class dateseacrhbox dengan dom untuk meletakkan inputan daterangepicker
 var $dTable = $('#datatable').DataTable({
  "dom": "<'row'<'col-sm-4'l><'col-sm-5' <'datesearchbox'>><'col-sm-3'f>>" +
    "<'row'<'col-sm-12'tr>>" +
    "<'row'<'col-sm-5'i><'col-sm-7'p>>"
 });

 //menambahkan daterangepicker di dalam datatables
 $("div.datesearchbox").html('<div class="input-group"> <div class="input-group-addon"> <i class="glyphicon glyphicon-calendar"></i> </div><input type="text" class="form-control pull-right" id="datesearch" placeholder="Search by date range.."> </div>');

 document.getElementsByClassName("datesearchbox")[0].style.textAlign = "right";

 //konfigurasi daterangepicker pada input dengan id datesearch
 $('#datesearch').daterangepicker({
    autoUpdateInput: false
  });

 //menangani proses saat apply date range
  $('#datesearch').on('apply.daterangepicker', function(ev, picker) {
     $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
     start_date=picker.startDate.format('DD/MM/YYYY');
     end_date=picker.endDate.format('DD/MM/YYYY');
     $.fn.dataTableExt.afnFiltering.push(DateFilterFunction);
     $dTable.draw();
  });

  $('#datesearch').on('cancel.daterangepicker', function(ev, picker) {
    $(this).val('');
    start_date='';
    end_date='';
    $.fn.dataTable.ext.search.splice($.fn.dataTable.ext.search.indexOf(DateFilterFunction, 1));
    $dTable.draw();
  });
});
</script>
@endpush
@endsection
