@extends('layouts.admin.main')

@section('title', 'Admin Flash Sale')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Flash Sale</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Flash Sale</div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('admin.flashsales.create') }}" class="btn btn-icon icon-left btn-primary">
                                <i class="fas fa-plus"></i> Tambah Flash Sale
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Harga Diskon</th>
                                            <th>Waktu Mulai</th>
                                            <th>Waktu Berakhir</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($flashsales as $flashsale)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $flashsale->product->name }}</td>
                                                <td>{{ $flashsale->discount_price }}</td>
                                                <td>{{ $flashsale->start_time }}</td>
                                                <td>{{ $flashsale->end_time }}</td>
                                                <td>
                                                    @if ($flashsale->status == 'active')
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.flashsales.detail', $flashsale->id) }}" class="btn btn-icon icon-left btn-info">
                                                        <i class="fas fa-eye"></i> Detail
                                                    </a>
                                                    <a href="{{ route('admin.flashsales.edit', $flashsale->id) }}" class="btn btn-icon icon-left btn-warning">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('admin.flashsales.delete', $flashsale->id) }}" method="POST" style="display: inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-icon icon-left btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                            <i class="fas fa-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection