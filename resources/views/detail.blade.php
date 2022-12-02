@extends('layouts.nav')
@section('content')
<a href="/dashboard" class="btn btn-primary mt-3 mb-3">Kembali</a>
<div style="height: 70vh">
    <h1 class="display-6">{{$data->judul}}</h1>
    <p>{{$data->isi}}</p>
    <p><i>Dibuat : </i>{{$data->tangalDibuat}}</p>
</div>
    <div class="row">
        <h4 class="text-center">Daftar Obat</h4>
        @foreach($data2 as $view)
        <div class="col">
            <div class="card" style="width: 15rem;">
                <div class="card-body bg-dark">
                  <h3 class="card-title">{{$view->nama_produk}}</h3>
                  <img src="{{ asset('storage/'.$view->foto) }}" alt="" width="100vh">
                  <p class="card-text">Harga : Rp.{{$view->harga}}</p>
                  <p class="card-text">{{$view->desc_produk}}</p>

                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection