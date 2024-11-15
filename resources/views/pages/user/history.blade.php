@extends('layouts.user.main')

@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Halaman History Pembelian</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('user.dashboard') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#">History Pembelian</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!-- Start Product Area -->
<section class="section_gap">
    <div class="container">
        <div class="row">
            <!-- Loop through products -->
            @forelse ($data as $item)
                <div class="col-lg-3 col-md-6">
                    <div class="single-product">
                        <img class="img-fluid" src="{{ asset('images/' . $item->image) }}" alt="{{ $item->name }}">
                        <div class="product-details">
                            <h6>{{ $item->name }}</h6>
                            <div class="prd-bottom">
                                <a href="{{ route('user.history', $item->id) }}" class="social-info">
                                    <span class="lnr lnr-move"></span>
                                    <p class="hover-text">Detail</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Display message when no products are available -->
                <div class="col-lg-12 col-md-12">
                    <div class="single-product text-center">
                        <h3>Tidak ada produk</h3>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
<!-- End Product Area -->
@endsection
