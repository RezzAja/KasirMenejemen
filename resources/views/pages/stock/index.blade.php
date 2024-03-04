@extends('layouts.main')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h4 class="fw-semibold mb-0">List Stok Barang</h4>
        <button type="button" data-bs-toggle="modal" data-bs-target="#addModal"
            class="btn btn-primary d-flex align-items-center gap-2">
            <i class="bx bx-plus"></i> Tambah Stok Barang
        </button>
    </div>

    <div class="card border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Photo</th>
                            <th>Nomer Seri</th>
                            <th>Nama Barang</th>
                            <th>Categori</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td> <img src="{{ url('storage/' . $item->photo) }}"width="70" height="90" alt=""
                                        class="mt-3"></td>
                                <td>{{ $item->category->serial_number }} - {{ $item->id }}</td>
                                <td>{{ $item->item_name }}</td>
                                <td>{{ $item->category->category_name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>Rp. {{ number_format($item->price) }}</td>
                                <td>{{ $item->quantity }}</td>

                                <td>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-warning text-white btn-icon" type="button"
                                            data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                            <i class="bx bx-edit"></i>
                                        </button>
                                        <form action="{{ route('stok.destroy', $item->id) }}" method="POST">
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
                            <div class="modal" tabindex="-1" id="editModal{{ $item->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <h5 class="modal-title text-white"> Edit Data Experience</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('stok.update', $item->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                <div class="row">

                                                    @csrf

                                                    @method('PUT')

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="photo">Photo</label>
                                                            <input type="file" name="photo" id="photo"
                                                                class="form-control" accept="image/*"
                                                                value="{{ $item->photo }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="category_id">Category</label>
                                                            <select name="category_id" id="category_id" class="form-control"
                                                                required>
                                                                <option value="">Pilih Kategori Barang</option>
                                                                @foreach ($category as $kategori)
                                                                    <option value="{{ $kategori->id }}"
                                                                        {{ $kategori->id == $item->category_id ? 'SELECTED' : '' }}>
                                                                        {{ $kategori->category_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="item_name">Nama Barang</label>
                                                        <input type="text" name="item_name" id="item_name"
                                                            class="form-control" value="{{ $item->item_name }}">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="description">Deskripsi barang</label>
                                                    <textarea name="description" id="description" cols="30" rows="3" class="form-control">{{ $item->description }}</textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="price">Harga</label>
                                                    <input type="text" name="price" id="price" class="form-control"
                                                        value="{{ $item->price }}">
                                                </div>


                                                <div class="mb-3">
                                                    <label for="quantity">Quantity</label>
                                                    <input type="text" name="quantity" id="quantity"
                                                        class="form-control" value="{{ $item->quantity }}">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
            </div>
        </div>
    </div>
    @endforeach
    </tbody>
    </table>
    </div>
    </div>
    </div>

    <div class="modal" tabindex="-1" id="addModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Tambah Stok Baru</h5>
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="photo">Photo</label>
                                    <input type="file" name="photo" id="photo" class="form-control"
                                        accept="image/*" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="category_id">Kategori</label>
                                    <select name="category_id" id="category_id" class="form-control" required>
                                        <option value="">Pilih Kategori Barang</option>

                                        @foreach ($category as $kategori)
                                            <option value="{{ $kategori->id }}">{{ $kategori->category_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="item_name">Nama Barang</label>
                                <input type="text" name="item_name" id="item_name" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="description">Deskripsi barang</label>
                            <textarea name="description" id="description" cols="30" rows="3" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="price">Harga</label>
                            <input type="text" name="price" id="price" class="form-control" required>
                        </div>


                        <div class="mb-3">
                            <label for="quantity">Quantity</label>
                            <input type="text" name="quantity" id="quantity" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                </div>



                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
