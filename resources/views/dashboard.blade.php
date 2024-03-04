@extends('layouts.main')

@section('content')
<h1 class="fw-bold">Selamat Datang Kembali,  {{ Auth::user()->name }}.</h1>
<p class="mb-5 text-secondary">
    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dicta voluptatum aliquam excepturi omnis
    aperiam officia officiis nam explicabo, debitis quae pariatur rerum perspiciatis aliquid quam
    reprehenderit, eveniet voluptate accusamus non?
</p>
<div class="row">
    <div class="col-md-3">
        <div class="card border-light-subtle mb-4">
            <div class="card-body p-4">
                <i class="bx bxs-user-badge fs-1 text-primary"></i>
                <h5 class="text-dark mt-3 "> {{ $jumlah_stok }} Stok Barang</h5>
                <p class="mb-0 text-secondary">Jumlah Seluruh Stok Barang Saat Ini</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-light-subtle mb-4">
            <div class="card-body p-4">
                <i class='bx bx-notepad fs-1 text-primary'></i>
                <h5 class="text-dark mt-3 ">{{ $jumlah_barang }} Jumlah Barang</h5>
                <p class="mb-0 text-secondary">Jumlah Barang Saat Ini</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-light-subtle mb-4">
            <div class="card-body p-4">
                <i class='bx bx-notepad fs-1 text-primary'></i>
                <h5 class="text-dark mt-3 ">{{ $jumlah_pengeluaran }} Pengeluaran Barang</h5>
                <p class="mb-0 text-secondary">Jumlah Pengeluaran Barang Saat Ini</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-light-subtle mb-4">
            <div class="card-body p-4">
                <i class='bx bx-notepad fs-1 text-primary'></i>
                <h5 class="text-dark mt-3 ">Rp. {{ number_format($hasil) }} Penghasilan Toko</h5>
                <p class="mb-0 text-secondary">Jumlah Penghasilan Toko Saat Ini</p>
            </div>
        </div>
    </div>
</div>
@endsection
