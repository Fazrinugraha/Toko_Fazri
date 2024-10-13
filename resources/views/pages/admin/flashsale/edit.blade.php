@extends('layouts.admin.main')
@section('title', 'Admin Edit Flash Sale')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Flash Sale</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item active">
                        <a href="{{ route('admin.flashsales') }}">Flash Sale</a>
                    </div>
                    <div class="breadcrumb-item">Edit Flash Sale</div>
                </div>
            </div>
            <a href="{{ route('admin.flashsales') }}" class="btn btn-icon icon-left btn-warning">Kembali</a>
            <div class="card mt-4">
                <form action="{{ route('admin.flashsales.update', $flashsale->id) }}" class="needs-validation" novalidate=""
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="product_id">Nama Produk</label>
                                    <select id="product_id" type="text" class="form-control" name="product_id" required>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}" {{ $flashsale->product_id == $product->id ? 'selected' : '' }}>
                                                {{ $product->name }}
                                            </option>
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
                                    <input id="discount_price" type="number" class="form-control" name="discount_price" required
                                        value="{{ $flashsale->discount_price }}">
                                    <div class="invalid-feedback">
                                        Kolom ini harus di isi!
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="start_time">Waktu Mulai</label>
                                    <input id="start_time" type="datetime-local" class="form-control" name="start_time" required
                                        value="{{ $flashsale->start_time }}">
                                    <div class="invalid-feedback">
                                        Kolom ini harus di isi!
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="end_time">Waktu Berakhir</label>
                                    <input id="end_time" type="datetime-local" class="form-control" name="end_time" required
                                        value="{{ $flashsale->end_time }}">
                                    <div class="invalid-feedback">
                                        Kolom ini harus di isi!
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-icon icon-left btn-primary">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection