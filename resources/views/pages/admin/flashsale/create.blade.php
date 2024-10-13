@extends('layouts.admin.main')
@section('title', 'Admin Tambah Flashsale')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Flashsale</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.flashsales') }}">Flashsale</a></div>
                <div class="breadcrumb-item">Tambah Flashsale</div>
            </div>
        </div>
        <a href="{{ route('admin.flashsales') }}" class="btn btn-icon icon-left btn-warning"> Kembali</a>
        <div class="card mt-4">
            <form action="{{ route('flashsale.store') }}" class="needs-validation" novalidate="" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="product_id">Nama Produk</label>
                                <select class="form-control" name="product_id" id="product_id" required>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Kolom ini harus di isi!
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="discount_price">Harga Diskon</label>
                                <input id="discount_price" type="number" class="form-control" name="discount_price" required="">
                                <div class="invalid-feedback">
                                    Kolom ini harus di isi!
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="start_time">Waktu Mulai</label>
                                <input id="start_time" type="datetime-local" class="form-control" name="start_time" required="">
                                <div class="invalid-feedback">
                                    Kolom ini harus di isi!
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="end_time">Waktu Berakhir</label>
                                <input id="end_time" type="datetime-local" class="form-control" name="end_time" required="">
                                <div class="invalid-feedback">
                                    Kolom ini harus di isi!
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="status" required>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                <div class="invalid-feedback">
                                    Kolom ini harus di isi!
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-icon icon-left btn-primary">
                        <i class="fas fa-plus"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection