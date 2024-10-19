@extends('layouts.admin.main')
@section('title', 'Edit Admin')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.admin') }}">Admin </a></div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Edit Admin Data</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.update', $admin->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Method PUT is used for updating data -->

                    <div class="form-group">
                        <label for="name">Nama Admin</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $admin->name) }}" required>
                        <div class="invalid-feedback">
                            Kolom ini harus di isi!
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username">Username Admin</label>
                        <input type="text" name="username" class="form-control" value="{{ old('username', $admin->username) }}" required>
                        <div class="invalid-feedback">
                            Kolom ini harus di isi!
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $admin->email) }}" required>
                        <div class="invalid-feedback">
                            Kolom ini harus di isi dan harus berupa email yang valid!
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password (Kosongkan jika tidak ingin mengubah)</label>
                        <input type="password" name="password" class="form-control">
                        <small class="form-text text-muted">Password harus minimal 8 karakter dan maksimal 15 karakter.</small>
                    </div>


                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.admin') }}" class="btn btn-secondary">Kembali</a> 
                </form>
            </div>
        </div>
    </section>
</div>
@endsection