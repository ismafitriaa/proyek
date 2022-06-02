@extends('produk.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>LIST BARANG MOBIL BEKAS</h2>
        </div>
        <div class="float-right my-2">
        <a class="btn btn-success" href="{{ route('produk.create') }}"> Input Produk</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
@if ($message = Session::get('error'))
    <div class="alert alert-error">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>Jenis_Mobil</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Keterangan</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($produk as $pdk)
    <tr>
        <td>{{ $pdk ->jenis_mobil }}</td>
        <td>{{ $pdk ->harga }}</td>
        <td>{{ $pdk ->stok }}</td>
        <td>{{ $pdk ->keterangan }}</td>
        <td>
        <form action="{{ route('produk.destroy',['produk'=>$pdk->jenis_mobil]) }}" method="POST">
            <a class="btn btn-info" href="{{ route('produk.show',$pdk->jenis_mobil) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('produk.edit',$pdk->jenis_mobil) }}">Edit</a>

            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        </td>
    </tr>
    @endforeach
    </table>
@endsection