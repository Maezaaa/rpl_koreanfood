@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5">
            <img src="{{ url('images/logo1.jpeg')}}" class="rounded mx-auto d-block" width="300" alt="">
        </div>
            @foreach($makanans as $makanan)
            <div class="col-md-4">
                <div class="card">
                  <img class="card-img-top w-100" src="{{ url('uploads') }}/{{ $makanan->gambar }}" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">{{ $makanan->nama_makanan }}</h5>
                    <p class="card-text">
                        <strong>Harga :</strong> Rp. {{ number_format($makanan->harga)}} <br>
                        <strong>Stok :</strong> {{$makanan->stok}} <br>
                        <hr>
                        <strong>Keterangan :</strong> <br>
                        {{$makanan->keterangan}}
                    </p>
                    <a href="{{ url('pesan') }}/{{ $makanan->id }}" class="btn btn-primary"> <i class="fa fa-shopping-cart"></i> Pesan</a>
                  </div>
                </div>   
            </div>
            @endforeach
    </div>
</div>
@endsection
