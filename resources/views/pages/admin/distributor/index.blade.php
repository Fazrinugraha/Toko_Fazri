@extends('layouts.admin.main')
@section('title', 'Admin Distributor')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Distributor</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Distributor</div>
            </div>
        </div>
        <a href="{{route('distributor.create')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah Distributor</a>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Distributor</th>
                            <th>Lokasi</th>
                            <th>Kontak</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp
                        @forelse ($distributors as $distributor)
                            <tr>
                                <td>{{ $no += 1 }}</td>
                                <td>{{ $distributor->nama_distibutor }}</td>
                                <td>{{ $distributor->lokasi }}</td>
                                <td>{{ $distributor->kontak }}</td>
                                <td>{{ $distributor->email }}</td>
                                <td>
                                    <a href="{{ route('distributor.detail', $distributor->id) }}" class="badge badge-info">Detail</a>
                                    <a href="{{ route('distributor.edit', $distributor->id) }}" class="badge badge-warning">Edit</a>
                                    <a href="{{route('distributor.delete',$distributor->id)}}" class="badge badge-danger"
                                    data-confirm-delete=""true">Hapus</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Data Distributor Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
