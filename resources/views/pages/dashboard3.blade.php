@extends('base')

@section('content')

    <div class="buttonNavbar">
        <a href="{{ route('dashboard') }}" class="btn btn-primary" style="background-color: #1DC6AB; border: none; border-radius: 10px;">All</a>
        @foreach ($kategoris as $kate)
        <a href="{{ route('dashboard.produk',$kate->id_kategori) }}" class="btn btn-primary" style="background-color: #1DC6AB; border: none; border-radius: 10px;">{{ $kate->nama_kategori }}</a>
        @endforeach
    </div>

    <div class="content">
        <!-- Konten Utama -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 mb-5">
                    <img src="{{ url('images/logo.png') }}" class="img-fluid" alt="" width="10">
                </div>
                    
                
                
                @foreach($barangs as $barang)

                <div class="card">
                    <div style="background-color: #FFF; border-radius: 10px 10px 0 0; height: 150px; display: flex; justify-content: center; align-items: center; overflow: hidden;">
                        <img src="{{ asset('storage/storage/' . $barang->gambar) }}" alt="..." width="150">
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
                {{-- @endif --}}
             
            </div>
        </div>
    </div>

    
    
   

    <!-- Cart Container -->
<div class="cart-container">
    <h2 style="text-align: center">Shoping Cart</h2>
    <!-- Tombol Clear untuk Menghapus Semua Item -->

    <!-- Daftar item di keranjang -->
    <div id="cart-items">
    </div>
    <div id="cart-total">
        <hr>
        <strong>Total: <span id="total-amount">Rp. 0</span></strong>
    </div>
    <a href="http://127.0.0.1:8000/checkout">
        <button class="btn btn-primary" style="background-color: #FF8A00; border: none; border-radius: 10px;">Checkout</button>
    </a>
    <button class="btn btn-danger" style="background-color: red; border: none; border-radius: 10px;" onclick="clearCart()">Clear</button>
</div>

<script>
    // Fungsi untuk menghapus semua item dari keranjang
    function clearCart() {
        // Hapus semua item di dalam div "cart-items"
        document.getElementById("cart-items").innerHTML = "";

        // Reset total amount menjadi 0
        document.getElementById("total-amount").textContent = "Rp. 0";
    }

    // Fungsi untuk menambahkan item ke keranjang (seperti yang sudah Anda miliki)
    function addToCart(namaBarang, harga) {
        // Implementasi logika penambahan item ke keranjang
        // Pastikan Anda telah mengimplementasikan ini sebelumnya
    }
</script>
    
@endsection