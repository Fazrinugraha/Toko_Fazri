@extends('layouts.admin.main')
@section('title', 'Detail Admin')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Admin</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.admin') }}">Admin  </a></div>
                <div class="breadcrumb-item">Detail Admin</div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="name">Nama Admin</label>
                    <input id="name" type="text" class="form-control" value="{{ $admin->name }}" readonly>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" value="{{ $admin->email }}" readonly>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="username">Username Admin</label>
                    <input id="username" type="text" class="form-control" value="{{ $admin->username }}" readonly>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="text" class="form-control" value="********" readonly>
                    <small class="form-text text-muted">Password tidak ditampilkan untuk alasan keamanan.</small>
                </div>
            </div>
        </div>
        <a href="{{ route('admin.admin') }}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-arrow-left"></i> Kembali</a>
    </section>
</div>
@endsection