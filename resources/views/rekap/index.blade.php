@extends('layouts.app')

@section('content')
@push('css')
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.css" rel="stylesheet" />
@endpush
<div class="">
  <div class="row">
    <div class="col-lg-12 md-12 sm-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Rekap</h4>
        </div>
        <div class="card-body">

          <div class="table-responsive">
            <table class="table dt-responsive" id="myTable">
              <thead>
                <th>Tgl</th>
                <th>Nama anak</th>
                <th>OrangTua</th>
                <th>Jenis Kelamin</th>
                <th>Tgl Lahir</th>
                <th>Umur (Bln)</th>
                <th>BB</th>
                <th>TB</th>
                <th>LK</th>
                <th>NTOB</th>
                <th>Pelayanan</th>
                <th>Keterangan</th>
              </thead>
              <tbody>
                @foreach ($pencatatan as $pencatatan)
                @foreach ($pencatatan->pendaftaran as $data)
                <tr>
                  <td>{{Carbon\Carbon::parse($pencatatan->tgl)->locale('id')->isoFormat('LL')}}</td>
                  <td>{{$data->nama}}</td>
                  <td>{{!empty($data->nama_bpk) ? $data->nama_bpk : $data->nama_ibu}}</td>
                  <td>{{$data->jenis_kelamin}}</td>
                  <td>{{date('d-m-Y',strtotime($data->tgl_lahir))}}</td>
                  <td>{{Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($data->tgl_lahir))}}</td>
                  <td>{{$pencatatan->bb_kg}}</td>
                  <td>{{$pencatatan->tb_cm}}</td>
                  <td>{{$pencatatan->lingkar_kepala}}</td>
                  <td>{{$pencatatan->ntob}}</td>
                  @foreach($pencatatan->pelayanan as $pel)
                  <td>{{$pel->jenis_pelayanan}}</td>
                  <td>{{$pel->keterangan}}</td>
                  @endforeach
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
<script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
<script type="text/javascript">
 $(document).ready(function() {
  $('#myTable').DataTable( {
    dom: 'Bfrtip',
    buttons: [{
      extend: 'pdfHtml5',
      title: 'Laporan Rekap Posyandu',
      orientation: 'landscape',
      download: 'open',
      exportOptions: {
        modifier: {
          page: 'current'
        },
        columns: [0,1,2,3,4,5,6,7,8,9,10,11]
      },
      customize: function ( doc ) {
        doc.styles.tableBodyEven.alignment = 'center';
        doc.styles.tableBodyOdd.alignment = 'center';
        doc.content[1].table.widths = '9%';
      }
    }, 
    ]
  } );
} );
</script>
@endpush
@endsection
