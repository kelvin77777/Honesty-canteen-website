<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(){
        $barang = Barang::all();
        $kategori = Kategori::all();
        return view('pages.produk',compact('barang','kategori'));
    }

    public function store(Request $request){
        $barang = new Barang();
        $barang->nama_barang=$request->nama_barang;
        $barang->kategori_id=$request->kategori_id;
        $barang->harga=$request->harga;
        $barang->stok=$request->stok;
        
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/storage', $imageName);
            $barang->gambar = '/' . $imageName;
        }
        
        $barang->save();
        return back()->with('success', 'Data berhasil ditambah');
    }

    public function delete(string $id)
    {
    
        

        $barang = Barang::where('id','=',$id)->firstOrFail();
        $barang->delete();
        return back()->with('info', 'Data berhasil dihapus');
    }

    public function update(Request $request, string $id){
    
    
        $barang = Barang::findOrFail($id);
        $barang->nama_barang = $request->nama_barang;
        
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/storage', $imageName);
            $barang->gambar = '/' . $imageName;
        }

        $barang->harga = $request->harga;
        $barang->stok = $request->stok;
        $barang->save();
        return back()->with('info', 'Data berhasil dihapus');

    }
}

