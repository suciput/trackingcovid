@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                 <a href="{{route('kelurahan.create')}}" class="btn btn-primary float-right">Add data</a>
                 <div class="card-body">
                 <div class="table-responsive">
                 <table class="table">
               <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama kelurahan</th>
                    <th scope="col">Nama kecamatan </th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @php $no=1; @endphp
            @foreach($kelurahan as $data)
                <tr>
                <th scope="row">{{ $no++}}</th>
                <td>{{$data->nama_kelurahan}}</td>
                <td>{{$data->kecamatan->nama_kecamatan}}</td>
                <td>
                    <form action="{{route('kelurahan.destroy', $data->id)}}" method="post">
                        @csrf
                         @method('delete')
                        <a href="{{route('kelurahan.show',$data->id)}}" class="btn btn-outline-primary">lihat</a>
                        <a href="{{route('kelurahan.edit',$data->id)}}" class="btn btn-outline-success">Edit</a>
                        <button class="btn btn-outline-danger" type="sumbit">Delete</button>  
                    </form>        
                </td>
                </tr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
