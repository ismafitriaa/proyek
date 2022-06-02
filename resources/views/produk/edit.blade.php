@extends('produk.layout')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Edit Produk
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
            <form method="post" action="{{ route('produk.update', $Produk->jenis_mobil) }}" id="myForm">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="Jenis_Mobil">Jenis_Mobil</label>
                    <input type="text" name="Jenis_Mobil" class="form-control" id="Jenis_Mobil" value="{{ $Produk->jenis_mobil }}" aria-describedby="Jenis_Mobil" >
                </div>
                <div class="form-group">
                    <label for="Harga">Harga</label>
                    <input type="text" name="Harga" class="form-control" id="Harga" value="{{ $Produk->harga }}" aria-describedby="Harga" >
                </div>
                <div class="form-group">
                    <label for="Stok">Stok</label>
                    <input type="Stok" name="Stok" class="form-control" id="Stok" value="{{ $Produk->stok }}" aria-describedby="Stok" >
                </div>
                <div class="form-group">
                    <label for="Keterangan">Keterangan</label>
                    <input type="Keterangan" name="Keterangan" class="form-control" id="Keterangan" value="{{ $Produk->keterangan }}" aria-describedby="Keterangan" >
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection