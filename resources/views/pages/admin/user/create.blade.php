@extends('layouts.admin.main') 
@section('title', 'Admin Tambah User')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.user')}}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.user') }}">User  </a></div>
                <div class="breadcrumb-item">Tambah User</div>
            </div>
        </div>
        <a href="{{ route('admin.user') }}" class="btn btn-icon icon-left btn-warning"> Kembali</a>
        <div class="card mt-4">
            <form action="{{ route('user.store') }}" method="POST" class="needs-validation" novalidate="">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Nama User</label>
                                <input id="name" type="text" class="form-control" name="name" required="">
                                <div class="invalid-feedback">
                                    Kolom ini harus di isi!
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" required="">
                                <div class="invalid-feedback">
                                    Kolom ini harus di isi!
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required="">
                                <div class="invalid-feedback">
                                    Kolom ini harus di isi!
                                </div>
                                <small class="form-text text-muted">Password harus minimal 8 karakter dan maksimal 15 karakter.</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                            <label for="point">Point</label>
                                <input id="point" type="number" class="form-control" name="point" value="10000" required="">
                                <div class="invalid-feedback">
                                    Kolom ini harus di isi!
                                </div>
                                <small class="form-text text-muted">Nilai poin dapat diubah sesuai kebutuhan.</small>
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