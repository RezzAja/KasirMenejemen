@extends('layouts.main')
@section('content')
    <section class="py-5">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between mb-5">
                <h4 class="fw-semibold mb-0">Posisi Pekerjaan</h4>
                <button type="button" data-bs-toggle="modal" data-bs-target="#addModal"
                    class="btn btn-primary d-flex align-items-center gap-2">
                    <i class="bx bx-plus"></i> Catat Transaksi Baru
                </button>
            </div>

            <div class="card border-0">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nomer Seri</th>
                                    <th>Nama Product</th>
                                    <th>Kategori</th>
                                    <th>QNTY</th>
                                    <th>Harga Jual</th>
                                    <th>Penerima</th>
                                    <th>Waktu transaksi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->category->serial_number }} - {{ $item->stock->id }}</td>
                                        <td>{{ $item->stock->item_name }}</td>
                                        <td>{{ $item->category->category_name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>Rp. {{ number_format($item->stock->price * $item->quantity) }}</td>
                                        <td>{{ $item->recipient }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <form action="{{ route('transaksi.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-icon" type="submit"
                                                        onclick="return confirm('Apakah kamu yakin ingin menghapusnya?')">
                                                        <i class="bx bx-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal" tabindex="-1" id="addModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Tambah List Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('transaksi.store') }}" method="POST">

                        @csrf
                        <div class="row">
                            <div class="mb-3">
                                <label for="stock_id">Nama Produk</label>
                                <select name="stock_id" id="stock_id" class="form-control" required>
                                    <option value="">Pilih Produk</option>

                                    @foreach ($stocks as $produk)
                                        <option value="{{ $produk->id }}">
                                            {{ $produk->item_name }}({{ $produk->quantity }})</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="category_id">Nama Categori</label>
                                    <select name="category_id" id="category_id" class="form-control" required>
                                        <option value="">Pilih Kategori</option>

                                        @foreach ($categories as $kategori)
                                            <option value="{{ $kategori->id }}">{{ $kategori->category_name }}</option>
                                        @endforeach

                                    </select>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="quantity">QNTY</label>
                                    <input type="number" name="quantity" id="quantity" class="form-control" required>
                                </div>
                            </div>

                            @if (session('error'))
                                <div class="alert alert-danger mb-3">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="mb-3">
                                <label for="recipient">Nama Penerima</label>
                                <input type="text" name="recipient" id="recipient" class="form-control" required>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
