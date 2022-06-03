@extends('produk.layout')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Tambah Produk
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('produk.store') }}" id="myForm" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="Jenis_Mobil">Jenis_Mobil</label>
                    <input type="text" name="Jenis_Mobil" class="form-control" id="Jenis_Mobil" aria-describedby="Jenis_Mobil" >
                </div>
                <div class="form-group">
                    <label for="Harga">Harga</label>
                    <input type="Harga" name="Harga" class="form-control" id="Harga" ariadescribedby="Harga" >
                </div>
                <div class="form-group">
                    <label for="Stok">Stok</label>
                    <input type="Stok" name="Stok" class="form-control" id="Stok" ariadescribedby="Stok" >
                </div>
                <div class="form-group">
                    <label for="Keterangan">Keterangan</label>
                    <input type="Keterangan" name="Keterangan" class="form-control" id="Keterangan" ariadescribedby="Keterangan" >
                </div>
                <div class="form-group">
                    <label for="featured_image">Foto</label> 
                    <input type="file" name="featured_image" class="form-control" id="featured_image" aria-describedby="featured_image" > 
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
    </div>
@endsection