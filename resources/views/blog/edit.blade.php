@extends('layouts.app')

@section('content')

<div class="container-fluid mt--8">
  <div class="row">
    <div class="col-lg-12 md-8 sm-4">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Buat Postingan</h4>
        </div>
        <div class="card-body">
          <form class="" action="{{route('blog.update',$blog->id)}}" method="post">
          @csrf
          @method('PUT')
            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Masukan Judul" required value="{{$blog->title}}">
            </div>
            <div class="form-group">
                      <label>Add New Tags</label><br>
                      <input type="text" class="form-control tagsinput" name="tags" data-role="tagsinput">
                    </div>
              <div class="form-group">
             <select multiple class="selectpicker" data-style="btn btn-info" name="tagss[]" data-live-search="true">
                  @foreach($tags as $data)
                  <option @foreach($blog->tag as $qq)
                    @if($data != "name")
                    {{$qq->id == $data->id ? 'selected' : ''}}
                    @endif
                    @endforeach
                  value="{{$data->id}}">{{$data->name}}</option>
                  @endforeach
                </select>
              </div>
            <div class="form-group">
               <textarea class="form-control my-editor" name="desc" placeholder="Deskripsi" rows="4">{!!$blog->desc!!}</textarea>
            </div>
            <div class="form-group">
             <button type="submit" class="btn btn-success">Simpan</button>
           </div>
          </form>
       </div>
     </div>
   </div>
 </div>
</div>

@endsection
