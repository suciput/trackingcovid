@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit kota</div>
                     <div clsss="card-body">           
                    <form action="{{route('kota.update',$kota->id)}}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                                @endif

                                <div class="mb-3">
                                    <label for="">Nama provinsi</label>
                                    <select class="form-control" name="id_provinsi">
                                    @foreach($provinsi as $data)
                                        <option value="{{$data->id}}">{{$data->id == $kota->id_provinsi ? 'selected' : ''}} > {{$data->nama_provinsi}}</option>
                                        @endforeach
                                        </select>
                                    </div>                                        
                                    <div class="mb-3">
                                        <label for="">Kode kota</label>
                                        <input type="text" name="kode_kota" value="{{$kota->kode_kota}}" class="form-control" required>
                                    </div> 
                                    <div class="mb-3">
                                        <label for="">Nama kota</label>
                                        <input type="text" name="nama_kota" value="{{$kota->nama_kota}}" class="form-control" required>
                                    </div>
                                   <button type="submit" class="btn btn-primary">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
