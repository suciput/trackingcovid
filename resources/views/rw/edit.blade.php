@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Rw</div>
                     <div clsss="card-body">           
                    <form action="{{route('rw.update',$rw->id)}}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                                @endif

                                <div class="mb-3">
                                    <label for="">Nama kelurahan</label>
                                    <select class="form-control" name="id_kelurahan">
                                    @foreach($kelurahan as $data)
                                        <option value="{{$data->id}}">{{$data->id == $rw->id_kelurahan ? "selected":""}}>{{$data->nama_kelurahan}}
                                            </option>
                                        @endforeach
                                        </select>
                                    </div>                                        

                                    <div class="mb-3">
                                        <label for="">Nama rw</label>
                                        <input type="text" name="nama_rw" value="{{$rw->nama_rw}}" class="form-control" required>
                                    </div>
                                   <button type="submit" class="btn btn-primary">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
