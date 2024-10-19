@extends('layouts.admin.main')
@section('title', 'Admin User')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">User</div>
            </div>
        </div>
        <a href="{{route('user.create')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah User</a>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>Email</th>
                            <th>Point</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $no += 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->point }} Points</td>
                                <td>
                                    <a href="{{route('user.detail', $user->id)}}" class="badge badge-info">Detail</a>
                                    <a href="{{route('user.edit', $user->id)}}" class="badge badge-warning">Edit</a>
                                    <a href="{{route('user.delete', $user->id)}}" class="badge badge-danger"
                                    data-confirm-delete="true">Hapus</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Data User Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
