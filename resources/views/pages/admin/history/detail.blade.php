@extends('layouts.admin.main')

@section('title', 'Admin Detail History Pembelian')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail History Pembelian</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.history') }}">History Pembelian</a>
                </div>
                <div class="breadcrumb-item">Detail History Pembelian</div>
            </div>
        </div>

        <!-- Button Kembali -->
        <a href="{{ route('admin.history') }}" class="btn btn-icon icon-left btn-warning">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <!-- Detail Card -->
        <div class="card mt-4">
            <div class="card-body">
                <div class="row">
                    <!-- Nama Pengguna -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="user_name">Nama Pengguna</label>
                            <input id="user_name" type="text" class="form-control" value="{{ $data->name }}" readonly>
                        </div>
                    </div>

                    <!-- Nama Produk -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nama_produk">Nama Produk</label>
                            <input id="nama_produk" type="text" class="form-control" value="{{ $data->nama_produk }}" readonly>
                        </div>
                    </div>

                    <!-- Kategori Produk -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="category">Kategori Produk</label>
                            <input id="category" type="text" class="form-control" value="{{ $data->category }}" readonly>
                        </div>
                    </div>

                    <!-- Total Harga Pembelian -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="total_harga">Total Harga Pembelian</label>
                            <input id="total_harga" type="text" class="form-control" 
                                value="{{ number_format($data->total_harga, 0, ',', '.') }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
