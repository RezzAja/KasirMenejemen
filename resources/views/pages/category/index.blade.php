@extends('layouts.main')
@section('content')
<div class="d-flex align-items-center justify-content-between mb-5">
    <h4 class="fw-semibold mb-0">List Kategori Barang</h4>
    <button type="button" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-primary d-flex align-items-center gap-2">
        <i class="bx bx-plus"></i> Tambah List Barang
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
                        <th>Nama Kategori</th>
                        <th>Tanggal Mulai</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $items as $key=> $item)
                        
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item-> serial_number }}</td>
                        <td>{{ $item-> category_name }}</td>
                        <td>{{ $item-> created_at }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-warning text-white btn-icon" type="button" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id}}">
                                    <i class="bx bx-edit"></i>
                                   </button>
                                   <form action="{{ route('kategori.destroy', $item->id)}}" method="POST">
                                   @csrf
                                   @method('DELETE')
                                   <button class="btn btn-danger btn-icon" type="submit" onclick="return confirm('Apakah kamu yakin ingin menghapusnya?')">
                                    <i class="bx bx-trash"></i>
                                   </button>
                                   </form>
                            </div>
                        </td>
                    </tr>
                    <div class="modal" tabindex="-1" id="editModal{{ $item->id}}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header bg-warning">
                              <h5 class="modal-title text-white"> Edit Data Experience</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('kategori.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                                <div class="row">

                                    @csrf
         
                                    @method('PUT')
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                         <label for="serial_number">Nomer Serial</label>
                                         <input type="text" name="serial_number" id="serial_number" class="form-control" value="{{ $item->serial_number }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                         <label for="category_name">Nama Kategori</label>
                                         <input type="text" name="category_name" id="category_name" class="form-control" value="{{ $item->category_name }}">
                                        </div>
                                    </div>       
                                    
                                 <div class="d-flex gap-2">
                                     <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                                    
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
          <h5 class="modal-title text-white">Tambah List Baru</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <form action="{{ route('kategori.store') }}" method="POST">

           @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                     <label for="serial_number">Nomer Serial</label>
                     <input type="text" name="serial_number" id="serial_number" class="form-control" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                     <label for="category_name">Nama Kategori</label>
                     <input type="text" name="category_name" id="category_name" class="form-control" >
                    </div>
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