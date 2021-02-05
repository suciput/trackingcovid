@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data kelurahan</div>
                            
                <form action="{{route('kelurahan.store')}}" method="POST">
                @csrf

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">kelurahan</label>
                            <input type="text" name="nama_kelurahan" class="form-control" id="exampleInputPassword1">
                            @if($errors->has('nama_kelurahan'))
                            <span class="text-danger">{{ $errors->first('nama_kelurahan') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="">Nama kecamatan</label>
                            <select class="form-control" name="id_kecamatan" id="">
                            @foreach($kecamatan as $data)
                                <option value="{{$data->id}}">{{$data->nama_kecamatan}}</option>
                                @endforeach
                                </select>                            
                            </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                </form>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
