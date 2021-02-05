@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('provinsi.create')}}" class="btn btn-outline-success float-right"><b>Add Data</b></a>
                    <table class="table  table-bordered" id="datatable">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Kode provinsi</th>
                <th scope="col">Nama provinsi</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
        @php  $no=1;  @endphp
        @foreach ($provinsi as $data)
                <tr>
                <th scope="row">{{ $no++}}</th>
                <td>{{$data->kode_provinsi}}</td>
                <td>{{$data->nama_provinsi}}</td>
                <td>
                    <form action="{{route('provinsi.destroy',$data->id)}}" method="post">
                        @csrf @method('delete')
                        <a href="{{route('provinsi.show',$data->id)}}" class="btn btn-outline-primary">lihat</a>
                        <a href="{{route('provinsi.edit',$data->id)}}" class="btn btn-outline-success">Edit</a>
                        <button type="sumbit" onclick="return confirm('Apakah anda yakin?')" class="btn btn-outline-danger">hapus</button>
                    </form>
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
