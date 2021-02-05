@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Data Kasus</div>
                <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-succes" role="alert"></div>
                    {{session('status')}}
                @endif


            <form action="{{route('kasus2.store')}}"  method="POST">
            @csrf
            <div class="col">
                    <livewire:kasus1 />
                    </div>
   
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Positif</label>
    <input type="text" name="jumlah_positif" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    @if($errors->has('jumlah_positif'))
    <span class="text-danger">{{$errors->first('positif')}} </span>
    @endif
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Sembuh</label>
    <input type="text" name="jumlah_sembuh" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    @if($errors->has('jumlah_sembuh'))
    <span class="text-danger">{{$errors->first('jumlah_sembuh')}}</span>
    @endif
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Meninggal</label>
    <input type="text" name="jumlah_meninggal" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    @if($errors->has('jumlah_meninggal'))
    <span class="text-danger">{{$errors->first('jumlah_meninggal')}}</span>
    @endif
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tanggal Update</label>
  <input type="date" name="tanggal_update" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  @if($errors->has('tanggal_update'))
    <span class="text-danger">{{$errors->first('tanggal_update')}}</span>
    @endif
  <button type="submit" class="btn btn-primary">Add Data</button>
</form>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection