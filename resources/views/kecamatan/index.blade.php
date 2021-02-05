@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                 <a href="{{route('kecamatan.create')}}" class="btn btn-primary float-right">Add data</a>
                 <div class="card-body">
                 <div class="table-responsive">
                 <table class="table">
               <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode kecamatan</th>
                    <th scope="col">Nama kecamatan</th>
                    <th scope="col">Nama kota </th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @csrf
        @php  $no=1;  @endphp
        @foreach ($kecamatan as $data)
                <tr>
                <th scope="row">{{ $no++}}</th>
                <td>{{$data->kode_kecamatan}}</td>
                <td>{{$data->nama_kecamatan}}</td>
                <td>{{$data->kota->nama_kota}}</td>
                <td>
                    <form action="{{route('kecamatan.destroy', $data->id)}}" method="post">
                        @csrf
                         @method('delete')
                        <a href="{{route('kecamatan.show',$data->id)}}" class="btn btn-outline-primary">lihat</a>
                        <a href="{{route('kecamatan.edit',$data->id)}}" class="btn btn-outline-success">Edit</a>
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
