@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data kecamatan</div>
                            
                <form action="{{route('kecamatan.store')}}" method="POST">
                @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">kode kecamatan</label>
                            <input type="text" name="kode_kecamatan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @if($errors->has('kode_kecamatan'))
                            <span class="text-danger">{{ $errors->first('kode_kecamatan') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">kecamatan</label>
                            <input type="text" name="nama_kecamatan" class="form-control" id="exampleInputPassword1">
                            @if($errors->has('nama_kecamatan'))
                            <span class="text-danger">{{ $errors->first('nama_kecamatan') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="">Nama kota</label>
                            <select class="form-control" name="id_kota">
                            @foreach($kota as $data)
                                <option value="{{$data->id}}">{{$data->nama_kota}}</option>
                                @endforeach
                                </select>
                            
                            </div>
                        <button type="submit" class="btn btn-primary">Add Data</button>
                </form>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
