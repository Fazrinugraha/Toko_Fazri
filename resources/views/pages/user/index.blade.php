@extends('layouts.user.main')
@section('content')
<!-- start banner Area -->
<section class="banner-area">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
            <div class="col-lg-12">
                <div class="">
                    <!-- single-slide -->
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="banner-content">
                                <h1>Nike New <br>Collection!</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation.</p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="banner-img">
                                <img class="img-fluid"
                                    src="{{ asset('assets/templates/user/img/banner/banner-img.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start Flash Sale Area -->
<section class="section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h1>Flash Sale</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse ($flashsales as $flashsale)
                <div class="col-lg-3 col-md-6">
                    <div class="single-product">
                        <img class="img-fluid" src="{{ asset('images/' . $flashsale->product->image) }}" alt="">
                        <div class="product-details">
                            <h6>{{ $flashsale->product->name }}</h6>
                            <div class="price">
                                <?php
                                    $discountPercentage = $flashsale->discount_price;
                                    $discountAmount = ($discountPercentage / 100) * $flashsale->product->price;
                                    $newPrice = $flashsale->product->price - $discountAmount;
                                ?>
                                <h6>Rp{{ number_format($newPrice, 0, ',', '.') }}</h6>
                                <h6 class="text-muted">
                                    <del>Rp{{ number_format($flashsale->product->price, 0, ',', '.') }}</del>
                                </h6>
                                <h6>Waktu Mulai: {{ $flashsale->start_time }}</h6>
                                <h6>Waktu Berakhir: {{ $flashsale->end_time }}</h6>
                            </div>
                            <p id="countdown-{{ $flashsale->id }}" class="text-danger"></p>
                            <div class="prd-bottom">
                                <a class="social-info" href="javascript:void(0);" onclick="confirmPurchase('{{ $flashsale->product->id }}', '{{ Auth::user()->id }}')">
                                    <span class="ti-bag"></span>
                                    <p class="hover-text">Beli</p>
                                </a>
                                <a href="{{ route('user.detail.product', $flashsale->product->id) }}" class="social-info">
                                    <span class="lnr lnr-move"></span>
                                    <p class="hover-text">Detail</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    var countDownDate_{{ $flashsale->id }} = new Date("{{ $flashsale->end_time }}").getTime();

                    var countdownFunction_{{ $flashsale->id }} = setInterval(function() {
                        var now = new Date().getTime();
                        var distance = countDownDate_{{ $flashsale->id }} - now;

                        // Menghitung hari, jam, menit, dan detik
                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                        // Tampilkan hasil
                        document.getElementById("countdown-{{ $flashsale->id }}").innerHTML = "Flash Sale berakhir dalam " + days + " hari " + hours + " jam " + minutes + " menit " + seconds + " detik";

                        // Jika countdown selesai, sembunyikan elemen countdown
                        if (distance < 0) {
                            clearInterval(countdownFunction_{{ $flashsale->id }});
                            document.getElementById("countdown-{{ $flashsale->id }}").innerHTML = "Flash Sale sudah berakhir";
                        }
                    }, 1000);
                </script>
            @empty
                <div class="col-lg-12 col-md-12">
                    <div class="single-product">
                        <h3 class="text-center">Tidak ada produk flash sale</h3>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
<!-- End Flash Sale Area -->

<!-- start product Area -->
<section class="section_gap">
    <!-- single product slide -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h1>Daftar Products</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- single product -->
            @forelse ($products as $item)
                <div class="col-lg-3 col-md-6">
                    <div class="single-product">
                        <img class="img-fluid" src="{{ asset('images/' . $item->image) }}" alt="">
                        <div class="product-details">
                            <h6>{{ $item->name }}</h6>
                            <div class="price">
                            <h6>Rp{{ number_format($item->price, 0, ',', '.') }}</h6> <!-- Jika tidak ada diskon -->
                            </div>
                            <div class="prd-bottom">
                                <a class="social-info" href="javascript:void(0);"
                                    onclick="confirmPurchase('{{ $item->id }}', '{{ Auth::user()->id }}')">
                                    <span class="ti-bag"></span>
                                    <p class="hover-text">Beli</p>
                                </a>
                                <a href="{{ route('user.detail.product', $item->id) }}" class="social-info">
                                    <span class="lnr lnr-move"></span>
                                    <p class="hover-text">Detail</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-lg-12 col-md-12">
                    <div class="single-product">
                        <h3 class="text-center">Tidak ada produk</h3>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
<!-- end product Area -->

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