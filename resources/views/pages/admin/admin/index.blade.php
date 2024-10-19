@extends('layouts.admin.main')
@section('title', 'Admin Admin')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Admin</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Admin</div>
            </div>
        </div>
        <a href="{{route('admin.create')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah Admin</a>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Admin</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp
                        @forelse ($admins as $admin)
                            <tr>
                                <td>{{ $no += 1 }}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->username }}</td>
                                <td>{{ $admin->email }} </td>
                                <td>
                                    <a href="{{route('admin.detail', $admin->id)}}" class="badge badge-info">Detail</a>
                                    <a href="{{route('admin.edit', $admin->id)}}" class="badge badge-warning">Edit</a>
                                    <a href="{{route('admin.delete', $admin->id)}}" class="badge badge-danger"
                                    data-confirm-delete="true">Hapus</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Data Admin Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
