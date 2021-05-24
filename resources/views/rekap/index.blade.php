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
              <table class="table" id="DataTable">
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
                  @foreach ($pendaftaran as $pendaftaran)
                    @foreach ($pendaftaran->pencatatan as $data)
                  <tr>
                    <td>{{date('F-Y',strtotime($data->tgl))}}</td>
                    <td>{{$pendaftaran->nama}}</td>
                    <td>{{!empty($pendaftaran->bpk) ? $pendaftaran->nama_bpk : $pendaftaran->nama_ibu}}</td>
                    <td>{{$pendaftaran->tgl_lahir}}</td>
                    <td>{{$pendaftaran->jenis_kelamin}}</td>
                    <td>{{Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($pendaftaran->tgl_lahir))}}</td>
                    <td>{{$data->bb_kg}}</td>
                    <td>{{$data->tb_cm}}</td>
                    <td>{{$data->lingkar_kepala}}</td>
                    <td>{{$data->ntob}}</td>
                    @forelse($pendaftaran->pelayanan as $pel)
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
