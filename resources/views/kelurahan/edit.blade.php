@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit kelurahan</div>
                     <div clsss="card-body">           
                    <form action="{{route('kelurahan.update',$kelurahan->id)}}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                                @endif

                                <div class="mb-3">
                                    <label for="">Nama kecamatan</label>
                                    <select class="form-control" name="id_kecamatan">
                                    @foreach($kecamatan as $data)
                                        <option value="{{$data->id}}">{{$data->id == $kelurahan->id_kecamatan ? :""}}>{{$data->nama_kecamatan}}
                                            </option>
                                        @endforeach
                                        </select>
                                    </div>                                        
                                    
                                    <div class="mb-3">
                                        <label for="">Nama kelurahan</label>
                                        <input type="text" name="nama_kelurahan" value="{{$kelurahan->nama_kelurahan}}" class="form-control" required>
                                    </div>
                                   <button type="submit" class="btn btn-primary">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
