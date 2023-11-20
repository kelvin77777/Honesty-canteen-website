<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        $kategori = Kategori::all();
        return view('pages.kategori', compact('kategori'));
    }

    public function store(Request $request){
        $kategori = new Kategori();
        $kategori->nama_kategori=$request->nama_kategori;
        $kategori->keterangan=$request->keterangan;
        
        
        $kategori->save();



        return back()->with('success', 'Data berhasil ditambah');

    }

    public function delete(string $id)
    {
    
        

        $kategori = Kategori::where('id_kategori','=',$id)->firstOrFail();
        $kategori->delete();
        return back()->with('info', 'Data berhasil dihapus');
    }

    public function update(Request $request, string $id){
    
    
        $kategori = Kategori::findOrFail($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->keterangan = $request->keterangan;
        $kategori->save();
        return back()->with('info', 'Data berhasil dihapus');

    }
    
}
