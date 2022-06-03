<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PodukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fungsi eloquent menampilkan data menggunakan pagination
        $produk = Produk::all(); // Mengambil semua isi tabel
        $paginate = Produk::orderBy('id_produk', 'asc')->paginate(3);
        return view('produk.index', ['produk' => $produk,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file('featured_image')) {
            $image_name = $request->file('featured_image')->store('images', 'public');
        }
        //melakukan validasi data
        $request->validate([
            'Jenis_Mobil' => 'required',
            'Harga' => 'required',
            'Stok' => 'required',
            'Keterangan' => 'required',
            'featured_image' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        Produk::create($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('produk.index')
            ->with('success', 'Produk Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($jenis_mobil)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        $Produk = Produk::where('jenis_mobil', $jenis_mobil)->first();
        return view('produk.detail', compact('Produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($jenis_mobil)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Produk = DB::table('produk')->where('jenis_mobil', $jenis_mobil)->first();
        return view('produk.edit', compact('Produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $jenis_mobil)
    {
        //melakukan validasi data
        $request->validate([
            'Jenis_Mobil' => 'required',
            'Harga' => 'required',
            'Stok' => 'required',
            'Keterangan' => 'required',
            'featured_image' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        Produk::where('jenis_mobil', $jenis_mobil)
        ->update([
            'jenis_mobil'=>$request->Jenis_Mobil,
            'harga'=>$request->Harga,
            'stok'=>$request->Stok,
            'keterangan'=>$request->Keterangan,
            'featured_image'=>$request->featured_image,
        ]);

        if ($produk->featured_image && file_exists(storage_path('app/public/'. $produk->featured_image))) {
            Storage::delete('public/'. $produk->featured_image);
        }

        $image_name = '';
            if ($request->file('featured_image')) {
        $image_name = $request->file('featured_image')->store('images', 'public');
        }

        $produk->featured_image = $image_name;
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('produk.index')
        ->with('success', 'Produk Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($jenis_mobil)
    {
        //fungsi eloquent untuk menghapus data
        Produk::where('jenis_mobil', $jenis_mobil)->delete();
        return redirect()->route('produk.index')
            -> with('success', 'Produk Berhasil Dihapus');
    }
}
