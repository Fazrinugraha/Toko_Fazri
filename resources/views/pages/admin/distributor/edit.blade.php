@extends('layouts.admin.main')
@section('title', 'Edit Distributor')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Distributor</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.distributor') }}">Distributor</a></div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Edit Data Distributor</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('distributor.update', $distributor->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Metode PUT digunakan untuk update data -->

                    <div class="form-group">
                        <label for="nama_distibutor">Nama Distributor</label>
                        <input type="text" name="nama_distibutor" class="form-control" value="{{ old('nama_distibutor', $distributor->nama_distibutor) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $distributor->lokasi) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="kontak">Kontak</label>
                        <input type="text" name="kontak" class="form-control" value="{{ old('kontak', $distributor->kontak) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $distributor->email) }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.distributor') }}" class="btn btn-secondary">Kembali</a> 
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
