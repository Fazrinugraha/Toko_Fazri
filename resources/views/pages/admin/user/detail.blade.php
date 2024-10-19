@extends('layouts.admin.main')
@section('title', 'Detail User')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.user') }}">User  </a></div>
                <div class="breadcrumb-item">Detail User</div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="name">Nama User</label>
                    <input id="name" type="text" class="form-control" value="{{ $user->name }}" readonly>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" value="{{ $user->email }}" readonly>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="point">Point</label>
                    <input id="point" type="number" class="form-control" value="{{ $user->point }}" readonly>
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
        <a href="{{ route('admin.user') }}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-arrow-left"></i> Kembali</a>
    </section>
</div>
@endsection