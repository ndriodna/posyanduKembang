@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <form class="form" method="POST" action="{{route('pencatatan.store')}}" enctype="multipart/form-data">
          @csrf
          <h3 class="description text-center text-success">Pencatatan</h3>
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="">Nama</label> <br>
                  <select name="pendaftaran_id" id="" class="selectpicker">
                    <option value="{{$pendaftaran->id}}">{{$pendaftaran->nama}}</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Umur/Bulan</label><br>
                  <input type="text" class="form-control" name="umur" value="{{Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($pendaftaran->tgl_lahir))}}" readonly>
                </div>
              <div class="form-group">
                <label for="">Berat Badan</label><br>
                <input type="number" class="form-control" name="bb_kg" placeholder="Berat Badan">
              </div>
              <div class="form-group">
                <label for="">Tinggi Badan</label>
                <input type="number" class="form-control" name="tb_cm" placeholder="Tinggi Badan">
              </div>
              <div class="form-group">
                <label for="">Lingkaran Kepala</label>
                <input type="number" class="form-control" name="lingkar_kepala" placeholder="Lingkaran Kepala">
              </div>
              <div class="form-group">
                <label for="">NTOB</label> <br>
                <select name="ntob" id="" class="selectpicker">
                  <option value=""></option>
                  <option value="naik">Naik</option>
                  <option value="turun">Turun</option>
                  <option value="tidak_hadir">Tidak Hadir</option>
                  <option value="baru">Baru</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">keterangan</label>
                <textarea name="keterangan" class="form-control" rows="8" cols="80"></textarea>
              </div>
            </div>
          </div>
        </div>
        </div>
        <div class="modal-footer justify-content-center">
        <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
