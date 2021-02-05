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
                    <a href="{{route('rw.create')}}" class="btn btn-outline-success float-right"><b>Add Data</b></a>
                    <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Kelurahan</th>
                <th scope="col">rw</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
        @php  $no = 1;  @endphp
        @foreach ($rw as $data)
                <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{$data->kelurahan->nama_kelurahan}}</td>
                <td>{{$data->nama_rw}}</td>
                <td>
                <form action="{{route('rw.destroy',$data->id)}}" method="post">
                        @csrf @method('delete')
                        <a href="{{route('rw.show',$data->id)}}" class="btn btn-outline-primary">lihat</a>
                        <a href="{{route('rw.edit',$data->id)}}" class="btn btn-outline-success">Edit</a>
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
