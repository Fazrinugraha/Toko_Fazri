@extends('layouts.user.main')

@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    @if(isset($flashsale))
                        <h1>Halaman Detail Produk</h1>
                    @else
                        <h1>Halaman Detail Produk</h1>
                    @endif
                    <nav class="d-flex align-items-center">
                        <a href="{{ route('user.dashboard') }}">Home<span class="lnr lnr-arrow-right"> </span></a>
                        @if(isset($flashsale))
                            <a href="single-product.html">Detail Produk</a>
                        @else
                            <a href="single-product.html">Detail Produk</a>
                        @endif
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <section class="section_gap">
        <!--================Single Product Area =================-->
        <div class="product_image_area">
            <div class="container">
                <div class="row s_product_inner">
                    <div class="col-lg-6">
                        <div class="single-prd-item">
                            @if(isset($flashsale) && file_exists(public_path('images/' . $flashsale->product->image)))
                                <img class="img-fluid" src="{{ asset('images/' . $flashsale->product->image) }}" alt="{{ $flashsale->product->name }}">
                            @elseif(isset($product) && file_exists(public_path('images/' . $product->image)))
                                <img class="img-fluid" src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                            @else
                                <img class="img-fluid" src="{{ asset('images/default.jpg') }}" alt="Gambar Default">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <div class="s_product_text">
                            @if(isset($flashsale))
                                @if ($flashsale->end_time < now())
                                    <h3>{{ $flashsale->product->name }}</h3>
                                    <h2>Rp{{ number_format($flashsale->product->price, 0, ',', '.') }}</h2>
                                    <ul class="list">
                                        <li>
                                            <a class="active" href="#">
                                                <span>Kategori</span> : {{ $flashsale->product->category }}</a>
                                        </li>
                                    </ul>
                                    <p>{{ $flashsale->product->description }}</p>
                                    <div class="card_area d-flex align-items-center">
                                        <a class="primary-btn" href="javascript:void(0);" onclick="confirmPurchase('{{ $flashsale->product->id }}', '{{ Auth::user()->id }}')">
                                            Beli Produk
                                        </a>
                                    </div>
                                @else
                                    <h3>{{ $flashsale->product->name }}</h3>
                                    <h2>{{ $flashsale->discount_price }}% Diskon</h2>
                                    <ul class="list">
                                        <li>
                                            <a class="active" href="#">
                                                <span>Kategori</span> : {{ $flashsale->product->category }}</a>
                                        </li>
                                    </ul>
                                    <h6>Waktu Mulai: {{ $flashsale->start_time }}</h6>
                                    <h6>Waktu Berakhir: {{ $flashsale->end_time }}</h6>
                                    <h6>Harga Asli: {{ number_format($flashsale->product->price, 0, ',', '.') }} Points</h6>
                                    <h6>Harga Diskon: {{ number_format($flashsale->product->price * (1 - ($flashsale->discount_price / 100)), 0, ',', '.') }} Points</h6>
                                    <p>{{ $product->description }}</p>
                                    <div class="countdown-timer">
                                        <p>Flash Sale Berakhir Dalam: 
                                            <span id="countdown{{ $flashsale->id }}"></span>
                                        </p>
                                    </div>
                                    <div class="card_area d-flex align-items-center">
                                        <a class="primary-btn" href="javascript:void(0);" onclick="confirmPurchase('{{ $flashsale->product->id }}', '{{ Auth::user()->id }}')">
                                            Beli Produk
                                        </a>
                                    </div>
                                    <script>
                                        // Menghitung mundur untuk flash sale
                                        var endDate{{ $flashsale->id }} = new Date("{{ $flashsale->end_time }}").getTime();
                                        var countdownInterval{{ $flashsale->id }} = setInterval(function() {
                                            var now = new Date().getTime();
                                        var distance = endDate{{ $flashsale->id }} - now;

                                        // Menghitung jam, menit, dan detik
                                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                        // Tampilkan hasil
                                        document.getElementById("countdown{{ $flashsale->id }}").innerHTML = days + " hari " + hours + " jam " + minutes + " menit " + seconds + " detik ";

                                        // Ketika hitungan mundur selesai
                                        if (distance < 0) {
                                            clearInterval(countdownInterval{{ $flashsale->id }});
                                            document.getElementById("countdown{{ $flashsale->id }}").innerHTML = "Flash Sale Berakhir";
                                        }
                                    }, 1000);
                                </script>
                            @endif
                        @elseif(isset($product))
                            <h3>{{ $product->name }}</h3>
                            <h2>{{ number_format($product->price, 0, ',', '.') }} Points</h2>

                            <ul class="list">
                                <li>
                                    <a class="active" href="#">
                                        <span>Kategori</span> : {{ $product->category }}</a>
                                </li>
                            </ul>
                            <p>{{ $product->description }}</p>
                            <div class="card_area d-flex align-items-center">
                                <a class="primary-btn" href="javascript:void(0);" onclick="confirmPurchase('{{ $product->id }}', '{{ Auth::user()->id }}')">
                                    Beli Produk
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!--================End Single Product Area =================-->
    </section>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmPurchase(productId, userId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan membeli produk ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Beli!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/product/purchase/' + productId + '/' + userId;
                }
            });
        }
    </script>
@endsection