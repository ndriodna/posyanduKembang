@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="p-2 bg-white rounded">
        <a href="{{route('user.create')}}" class="btn btn-success m-3"><i class="fas fa-plus-square"></i> Tambah</a>
            
    <div style="overflow-x: auto;">
     <table class="table table-striped table-bordered data-table bg-white tex-dark">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $data)
            <tr>
                <td><a href="{{route('user.show',$data->id)}}">{{$data->name}}</a></td>
                <td>{{$data->email}}</td>
                <td>
                    @foreach($data->getRoleNames() as $role)
                    {{$role}}
                    @endforeach
                </td>
                <td>{{$data->status}}</td>
                <td>
                    <form action="{{route('user.destroy',$data->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                <a href="{{route('user.edit',$data->id)}}" class="btn btn-warning"><i class="fas fa-pen-square"></i></a>
                @foreach($data->getRoleNames() as $role)
<<<<<<< HEAD
                    @if($role == "super admin")
=======
                    @if($role == "Admin")
>>>>>>> 7189296922e4aa54c96d564263af159e3b69fd06
                    @else
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    @endif
                @endforeach
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        </div>
        </div>
 </div>
 @push('js')
 <script>
    var table = $('.data-table').DataTable()
 </script>
@endpush
@endsection