<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;

class DashboardController extends Controller
{
    public function dashboard(){
        $barangs = Barang::all();
        $kategori = Kategori::all();
        return view('pages.dashboard',compact('barangs','kategori'));
        
    }

    public function  show(string $id)
    {

        $barangs = Barang::where('kategori_id', $id)->get();
        $kategori = Kategori::where('id_kategori', $id)->firstorfail();
        $kategoris = Kategori::all();


        return view('pages.dashboard3', compact('barangs','kategori', 'kategoris'));
    }


}
