@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                 <a href="{{route('kota.create')}}" class="btn btn-primary float-right">Add data</a>
                 <div class="card-body">
                 <div class="table-responsive">
                 <table class="table  table-bordered" id="datatable">
               <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode kota</th>
                    <th scope="col">Nama kota</th>
                    <th scope="col">Nama provinsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
        @php  $no=1;  @endphp
        @foreach ($kota as $data)
                <tr>
                <th scope="row">{{ $no++}}</th>
                <td>{{$data->kode_kota}}</td>
                <td>{{$data->nama_kota}}</td>
                <td>{{$data->provinsi->nama_provinsi}}</td>
                <td>
                    <form action="{{route('kota.destroy',$data->id)}}" method="post">
                        @csrf @method('delete')
                        <a href="{{route('kota.show',$data->id)}}" class="btn btn-outline-primary">lihat</a>
                        <a href="{{route('kota.edit',$data->id)}}" class="btn btn-outline-success">Edit</a>
                        <button class="btn btn-outline-danger" type="sumbit">Delete</button>          
                </td>

                </tr>
                    @endforeach
                   </body>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
