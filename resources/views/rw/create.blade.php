@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Rw</div>
                            
                <form action="{{route('rw.store')}}" method="POST">
                @csrf
                       
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">rw</label>
                            <input type="text" name="nama_rw" class="form-control" id="exampleInputPassword1">
                            @if($errors->has('nama_rw'))
                            <span class="text-danger">{{ $errors->first('nama_rw') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="">nama kelurahan</label>
                            <select class="form-control" name="id_kelurahan" id="">
                            @foreach($kelurahan as $data)
                                <option value="{{$data->id}}">{{$data->nama_kelurahan}}</option>
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
