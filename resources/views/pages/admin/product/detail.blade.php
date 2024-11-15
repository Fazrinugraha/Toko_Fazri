@extends('layouts.admin.main') 
@section('title', 'Admin Detail Product') 
@section('content') 
<div class="main-content"> 
    <section class="section"> 
        <!-- Header Section -->
        <div class="section-header"> 
            <h1>Detail Produk</h1> 
            <div class="section-header-breadcrumb"> 
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div> 
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.product') }}">Produk</a>
                </div> 
                <div class="breadcrumb-item">Detail Produk</div> 
            </div> 
        </div>
        
        <!-- Back Button -->
        <a href="{{ route('admin.product') }}" class="btn btn-icon icon-left btn-warning">
            <i class="fas fa-arrow-left"></i> Kembali
        </a> 
        
        <!-- Product Detail -->
        <div class="row mt-4"> 
            <div class="col-12 col-md-4 col-lg-12 m-auto"> 
                <article class="article article-style-c"> 
                    <div class="article-header"> 
                        <div class="article-image" data-background="{{ asset('images/' . $data->image) }}">  
                        </div> 
                    </div> 
                    <div class="article-details"> 
                        <div class="article-category">
                            <a href="#">{{ $data->name }}</a>
                            <div class="bullet"></div> 
                            <a href="#">{{ $data->category }}</a>
                        </div> 
                        <div class="article-category">
                            <a href="#">{{ $data->nama_distibutor }}</a>
                        </div> 
                        <div class="article-title"> 
                            <h2><a href="#">Harga: {{ $data->price }} Points</a></h2> 
                        </div> 
                        <hr> 
                        <p>{{ $data->description }}</p> 
                    </div> 
                </article> 
            </div> 
        </div> 
    </section> 
</div> 
@endsection
