@extends('layouts.admin.main') 
@section('title', 'Admin Distributor') 
@section('content') 
    <div class="main-content"> 
        <section class="section"> 
            <div class="section-header"> 
                <h1>Distributor</h1> 
                <div class="section-header-breadcrumb"> 
                    <div class="breadcrumb-item active"> 
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </div> 
                    <div class="breadcrumb-item">Distributor</div> 
                </div> 
            </div> 

            <div class="row"> 
                <div class="col-md-4 col-sm-3"> 
                    <a href="{{ route('distributor.create') }}"  
                    class="btn btn-icon icon-left btn-primary"> 
                        <i class="fas fa-plus"></i> Distributor 
                    </a> 
                    <a href="{{ route('distributor.export') }}"  
                    class="btn btn-icon icon-left btn-info"> 
                        <i class="fas fa-print"></i> Export 
                    </a> 
                </div> 
                <div class="col-md-8 col-sm-9"> 
                    <form action="{{ route('distributor.import') }}"  
                    method="POST" enctype="multipart/form-data"> 
                        @csrf 
                        <div class="d-flex align-items-center"> 
                            <div class="form-group mb-0 mr-2"> 
                                <div class="custom-file"> 
                                    <input class="custom-file-input"  
                                        name="file" id="customFile" type="file" required=""> 
                                    <label class="custom-file-label" for="customFile"> 
                                        Pilih File Excel 
                                    </label> 
                                </div> 
                            </div> 
                            <button type="submit" class="btn btn-icon icon-left btn-primary"> 
                                <i class="fas fa-upload"></i> Import 
                            </button> 
                        </div> 
                    </form> 
                </div> 
            </div> 

            <div class="card-body"> 
                <div class="table-responsive"> 
                    <table class="table table-bordered table-md"> 
                        <thead>
                            <tr> 
                                <th>#</th> 
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
                            @forelse ($distributors as $item) 
                                <tr> 
                                    <td>{{ ++$no }}</td> 
                                    <td>{{ $item->nama_distibutor }}</td> 
                                    <td>{{ $item->lokasi }}</td> 
                                    <td>{{ $item->kontak }}</td> 
                                    <td>{{ $item->email }}</td> 
                                    <td> 
                                    <a href="{{ route('distributor.detail', $item->id) }}" class="badge badge-info">Detail</a>
                                    <a href="{{ route('distributor.edit', $item->id) }}"class="badge badge-warning">Edit</a> 
                                    <a href="{{ route('distributor.delete', $item->id) }}"class="badge badge-danger"data-confirm-delete="true">Hapus</a> 
                                    </td> 
                                </tr> 
                            @empty 
                                <tr> 
                                    <td colspan="6" class="text-center"> 
                                        Data Distributor Kosong
                                    </td> 
                                </tr> 
                            @endforelse 
                        </tbody>
                    </table> 
                </div> 
            </div> 
        </section> 
    </div> 
@endsection
