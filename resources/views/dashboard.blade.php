@extends('layouts.nav')
@section('content')
<h2 class="text-center">Postingan Web</h2>
<div class="row">
    @foreach($data as $view)    
    <div class="card m-2">
        <div class="card-header text-dark">
            Post {{$loop->iteration}}
        </div>
        <div class="card-body bg-dark">
            <h5 class="card-title">{{$view->judul}}</h5>
            <p class="card-text">{{$view->isi}}</p>
            <a href="{{url('dashboard/detail',$view->id)}}" class="btn btn-primary">More</a>
        </div>
    </div>
    @endforeach
</div>
@endsection
