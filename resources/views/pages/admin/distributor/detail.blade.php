@extends('layouts.admin.main') 
@section('title', 'Admin Detail Distributor') 
@section('content') 
<div class="main-content"> 
    <section class="section"> 
        <div class="section-header"> 
            <h1>Detail Distributor</h1> 
            <div class="section-header-breadcrumb"> 
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div> 
                <div class="breadcrumb-item active"><a href="{{ route('admin.distributor') }}">Distributor</a></div> 
                <div class="breadcrumb-item">Detail Distributor</div> 
            </div> 
        </div>
        <a href="{{ route('admin.distributor') }}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-arrow-left"></i> Kembali</a> 
        <div class="row mt-4"> 
            <div class="col-12 col-md-4 col-lg-12 m-auto"> 
                <article class="article article-style-c"> 
                    <div class="article-details"> 
                        <div class="article-category"><a href="#">{{ $distributor->nama_distibutor }}</a>  
                        <div class="bullet"></div> 
                        <a href="#">{{ $distributor->lokasi }}</a></div> 
                        <div class="article-title"> 
                            <h2><a href="#">Kontak: {{ $distributor->kontak }}</a></h2> 
                        </div> 
                        <hr> 
                        <p>Email: {{ $distributor->email }}</p> 
                    </div> 
                </article> 
            </div> 
        </div> 
    </section> 
</div> 
@endsection
