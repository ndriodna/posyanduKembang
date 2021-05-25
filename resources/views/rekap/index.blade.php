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
              <table class="table dt-responsive" id="DataTable">
                <thead>
                  <th>Tgl Timbang</th>
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
                </thead>
                <tbody>
                  @foreach ($pencatatan as $pencatatan)
                    @foreach ($pencatatan->pendaftaran as $data)
                  <tr>
                    <td>{{date('F-Y',strtotime($pencatatan->tgl))}}</td>
                    <td>{{$data->nama}}</td>
                    <td>{{!empty($data->nama_bpk) ? $data->nama_bpk : $data->nama_ibu}}</td>
                    <td>{{$data->tgl_lahir}}</td>
                    <td>{{$data->jenis_kelamin}}</td>
                    <td>{{Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($data->tgl_lahir))}}</td>
                    <td>{{$pencatatan->bb_kg}}</td>
                    <td>{{$pencatatan->tb_cm}}</td>
                    <td>{{$pencatatan->lingkar_kepala}}</td>
                    <td>{{$pencatatan->ntob}}</td>
                    @forelse($pencatatan->pelayanan as $pel)
                    <td>{{$pel->jenis_pelayanan}}</td>
                    @empty
                    <td>-</td>
                    @endforelse
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
@endsection
