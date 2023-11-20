@extends('base2')
@section('content')
    

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Semua Kategori Produk</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            DataTable Kategori Produk
                        </div>
                        <a href="#" class="btn btn-primary" style="width: 150px; height: 40px;margin-top: 10px;margin-left: 10px;" data-toggle="modal" data-target="#exampleModal">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah Data</span>
                        
                        </a>
                        <div class="card-body">
                            <table id="datatablesSimple" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Kategori</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategori as $kate)
                                    <tr>
                                        <td>{{ $kate->nama_kategori }}</td>
                                        <td>{{ $kate->keterangan }}</td>
                                        
                                        <td>
                                            <a href="#" class="btn btn-warning btn-icon-split" data-toggle="modal"
                                                data-target="#ubah_user{{ $kate->id_kategori }}">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                                <span class="text">Ubah</span>
                                            </a>    
                                            <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal"
                                                data-target="#hapus_user{{ $kate->id_kategori }}">
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
            </main>
        </div>
    </div>

    {{-- ===== MODAL TAMBAH KATEGORI PRODUK ===== --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ url('admin/kategori') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mt-3">
                            <input type="text" id="nama_kategori" name="nama_kategori" placeholder="Masukkan nama kategori" value="" class="form-control" required autocomplete="off">
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" id="keterangan" name="keterangan" placeholder="Masukkan keterangan" value="" class="form-control" required autocomplete="off">
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
    @foreach ($kategori as $kate)
    <div class="modal fade" id="hapus_user{{ $kate->id_kategori }}" tabindex="-1" role="dialog"
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
                    
                    <form action="{{ route('kategori.delete',$kate->id_kategori) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger" type="submit">hapus</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    {{-- ===== UPDATE ===== --}}
    <div class="modal fade" id="ubah_user{{ $kate->id_kategori }}" tabindex="-1" role="dialog"
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
                <form action="{{ route('kategori.update',$kate->id_kategori) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mt-3">
                            <input type="text" id="nama_kategori" name="nama_kategori"
                                placeholder="Masukkan nama kategori" class="form-control" required autocomplete="off"
                                >
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" id="keterangan" name="keterangan"
                                placeholder="Masukkan keterangan" class="form-control" required autocomplete="off"
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