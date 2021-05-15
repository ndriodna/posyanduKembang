@extends('layouts.app')

@section('content')

<div class="container-fluid mt-8">
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $message)
      <li>{{ $message }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <div class="row">
    <div class="col-lg-12 md-8 sm-4">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Pelayanan</h4>
        </div>
        <div class="card-body">
          <div class="col-sm-4">
            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#createModal">Tambah Data</a>
          </div><br>
          <div class="table-responsive">
            <table class="table" id="DataTable">
              <thead>
                <th>Nama</th>
                <th>Jenis Pelayanan</th>
                <th>Keterangan</th>
                <th>Action</th>
              </thead>
              <tbody>
                @foreach ($pelayanans as $pelayanan)
                <tr>
                  <td>{{date('d-m-y',strtotime($pelayanan->created_at))}}</td>
                  <td>{{$pelayanan->waktu_tempat}}</td>
                  <td>{{$pelayanan->materi}}</td>
                  <td>{{$pelayanan->peserta}}</td>
                  <td class="col-auto">
                    <div class="btn-group">
                      <div class="dropdown ">
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton ">
                        </div>
                      </div>
                    </div>
                    <div class="btn-group">
                      <div class="dropdown">
                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-pen-square fa-lg"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a href="{{route('pelayanan.edit',$pelayanan->id)}}" class="dropdown-item">Ubah Data</a>
                        </div>
                      </div>
                    </div>
                    <a class=" btn btn-info" href="{{route('pelayanan.show',$pelayanan->id)}}"><i class="fa fa-eye fa-lg"></i></a>
                    <div class="btn-group">
                      <div class="dropdown ">
                        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-trash fa-lg"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <form id="delete-form-{{$pelayanan->id}}" action="{{ route('pelayanan.destroy',$pelayanan->id) }}" method="POST" >
                           @csrf
                           @method('DELETE')
                           <a href="#" class="dropdown-item" onclick="deleteItem({{$pelayanan->id}})">Hapus</a>
                         </form>
                       </div>
                     </div>
                   </div>
                 </td>
               </tr>
               @endforeach
             </tbody>
           </table>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>

{{-- modal --}}
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <form class="form" method="POST" action="{{route('pelayanan.store')}}" enctype="multipart/form-data">
          @csrf
          <h3 class="description text-center text-success">pelayanan</h3>
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="">Pilih nama anak</label> <br>
                  <select name="pendafataran_id" id="detail" class="selectpicker">
                    <option value=""></option>
                    @foreach($pendaftarans as $pendaftaran)
                    <option value="{{$pendaftaran->id}}">{{$pendaftaran->nama}}</option>
                    @endforeach
                  </select>
                </div>
               {{--  @if("id='tgl_lahir'"  == true)
                <div class="form-group">
                  <label for="">Umur/Bulan</label> <br>
                  <input type="text" class="form-control" name="tgl_lahir" value="{!!Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse("id='tgl_lahir'"))!!}"readonly>
                </div>
                @endif --}}
                <div class="form-group">
                  <label for="">Umur/Bulan</label> <br>
                  <input type="text" class="form-control" id="tgl_lahir" readonly>
                </div>
                <div class="form-group">
                  <label for="">Jenis Pelayanan</label> <br>
                  <input type="text" class="form-control" name="jenis_pelayanan" placeholder="Masukan jenis pelayanan">
                </div>
                <div class="form-group">
                  <label for="">Keterangan</label> <br>
                  <input type="text" class="form-control" name="Keterangan" placeholder="Masukan Keterangan">
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
          $('#tgl_lahir').val(response.tgl_lahir)
        }
      }
    })
  })
</script>
@endpush
@endsection
