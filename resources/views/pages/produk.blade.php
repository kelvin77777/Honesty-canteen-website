@extends('base2')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Semua Produk</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    DataTable Produk
                </div>
                <a href="#" class="btn btn-primary" style="width: 150px;height: 40px;margin-top: 10px;margin-left: 10px;" data-toggle="modal" data-target="#exampleModal">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Data</span>
                </a>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Gambar</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barang as $brg)
                                <tr>
                                    <td>{{ $brg->nama_barang }}</td>
                                    <td>
                                        <img src="{{ asset('storage/storage/' . $brg->gambar) }}" class="img-thumbnail" width="100" height="100" alt="">
                                    </td>
                                    <td>{{ $brg->harga }}</td>
                                    <td>{{ $brg->stok }}</td>
                                    <td>{{ $brg->kategori->nama_kategori }}</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-icon-split" data-toggle="modal"
                                            data-target="#ubah_user{{ $brg->id }}">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-pen"></i>
                                            </span>
                                            <span class="text">Ubah</span>
                                        </a>    
                                        <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal"
                                            data-target="#hapus_user{{ $brg->id }}">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Hapus</span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</div>

<!-- ===== MODAL TAMBAH PRODUK ===== -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ url('/admin/produk') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group mt-3">
                        <input type="text" id="nama_barang" name="nama_barang" placeholder="Masukkan nama barang" value=""
                            class="form-control" required autocomplete="off">
                    </div>
                    <div class="form-group mt-3">
                        <input type="file" id="gambar" name="gambar" placeholder="Masukkan gambar" value="" class="form-control"
                            required autocomplete="off">
                    </div>
                    <div class="form-group mt-3">
                        <input type="number" id="harga" name="harga" placeholder="Masukkan harga" value="" class="form-control"
                            required autocomplete="off">
                    </div>
                    <div class="form-group mt-3">
                        <input type="number" id="stok" name="stok" placeholder="Masukkan stok" value="" class="form-control"
                            required autocomplete="off">
                    </div>
                    <div class="form-group mt-3">
                        <select class="form-control select2 mx-auto mt-2" style="width: 100%" name="kategori_id" id="kategori_id"
                            required>
                            @foreach ($kategori as $kate)
                            <option selected disabled value="">Pilih Kategori</option>
                            <option value="{{ $kate->id_kategori }}">{{ $kate->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- =====MODAL BOX UP & DEL===== --}}
@foreach ($barang as $brg)
<div class="modal fade" id="hapus_user{{ $brg->id }}" tabindex="-1" role="dialog"
    aria-labelledby="hapus-siswa" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus data?
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus
                    data?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                
                <form action="{{ route('barang.delete',$brg->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-danger" type="submit">hapus</button>
                </form>

            </div>
        </div>
    </div>
</div>

{{-- ===== UPDATE ===== --}}
<div class="modal fade" id="ubah_user{{ $brg->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Data
                    Staff Kasir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('barang.update',$brg->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group mt-3">
                        <input type="text" id="nama_barang" name="nama_barang"
                            placeholder="Masukkan nama barang" class="form-control" required autocomplete="off"
                            >
                    </div>
                    <div class="form-group mt-3">
                        <input type="file" id="gambar" name="gambar" placeholder="Masukkan gambar" value="" class="form-control"
                            required autocomplete="off">
                    </div>
                    <div class="form-group mt-3">
                        <input type="number" id="harga" name="harga"
                            placeholder="Masukkan harga" class="form-control" required autocomplete="off"
                            >
                    </div>
                    <div class="form-group mt-3">
                        <input type="number" id="stok" name="stok"
                            placeholder="Masukkan stok" class="form-control" required autocomplete="off"
                            >
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <input type="hidden" name="_method" value="PUT">
                    <button class="btn btn-warning" type="submit">Ubah</button>
                </div>
        </div>
        </form>
    </div>
</div>
@endforeach

@endsection
