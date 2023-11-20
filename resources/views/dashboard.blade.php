@extends('base')

@section('content')
    
    <div class="content">
        <!-- Konten Utama -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 mb-5">
                    <img src="{{ url('images/logo.png') }}" class="img-fluid" alt="" width="10">
                </div>
                @foreach($barangs as $barang)
                <div class="card">
                    <div style="background-color: #1DC6AB; border-radius: 10px 10px 0 0; height: 150px; display: flex; justify-content: center; align-items: center; overflow: hidden;">
                        <img src="{{ url('uploads') }}/{{ $barang->gambar }}" alt="..." width="150">
                    </div>
                    <div class="card-body">
                        <p style="font-size: 20px;margin-bottom: -1px;">{{ $barang->nama_barang }}</p>
                        <p>
                            <strong>Rp. {{ number_format($barang->harga)}}/Pcs</strong> <br>
                            <p style="font-size: 10px;margin-top: -15px;">Stok :{{ $barang->stok }}</p>
                            <button class="btn btn-primary" style="background-color: #FF8A00; border: none; border-radius: 10px;" onclick="addToCart('{{ $barang->nama_barang }}', {{ $barang->harga }})">Add</button>    
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Cart Container -->
    <div class="cart-container">
        <h2 style="text-align: center">Shoping Cart</h2>
        <!-- Daftar item di keranjang -->
        <div id="cart-items">
        </div>
        <div id="cart-total">
            <hr>
            <strong>Total: <span id="total-amount">Rp. 0</span></strong>
        </div>
        <a href="http://127.0.0.1:8000/checkout" >
            <button class="btn btn-primary" style="background-color: #FF8A00; border: none; border-radius: 10px;">Checkout</button>
        </a>
        
    </div>

    @endsection