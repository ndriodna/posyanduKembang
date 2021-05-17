@extends('layouts.app')

@section('content')

<div class="container-fluid mt--8">
  <div class="row">
    <div class="col-lg-12 md-8 sm-4">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Blog</h4>
        </div>
        <div class="card-body">
            <div class="col-sm-4">
              <a href="{{route('blog.create')}}" class="btn btn-success">Buat Postingan</a>
            </div>
            <br>
          <div class="table-responsive">
            <table class="table" id="DataTable">
              <thead>
                <th>Title</th>
                <th>Tags</th>
                <th>Description</th>
                <th>Action</th>
              </thead>
              <tbody>
                @foreach ($blogs as $blog)
                <tr>
                  <td>{{$blog->title}}</td>
                  <td>@foreach($blog->tag as $data)
        					<span class="badge badge-success">{{$data->name}}</span>
        				@endforeach</td>
                  <td>{!!$blog->desc!!}</td>
                  <td class="">
                    <div class="btn-group">
    					<a href="{{ route('blog.show',$blog->slug) }}"class="btn btn-info">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('blog.edit',$blog->id) }}" rel="tooltip" class="btn btn-success">
                            <i class="fa fa-pen-square"></i>
                        </a>
                        <form id="delete-form-{{$blog->id}}" action="{{ route('blog.destroy',$blog->id) }}" method="POST">
                        @csrf
                          @method('DELETE')
                        <a href="#" type="button" onclick="deleteItem({{$blog->id}})" rel="tooltip" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </a>
                      </form>
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

@endsection
