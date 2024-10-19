@extends('layouts.admin.main') 
@section('title', 'Admin Dashboard') 

@section('content') 
    <div class="main-content"> 
        <section class="section"> 
            <div class="section-header"> 
                <h1>Dashboard</h1> 
                <div class="section-header-breadcrumb"> 
                    <div class="breadcrumb-item active">
                        <a href="#">Dashboard</a>
                    </div> 
                </div> 
            </div> 
            <div class="row">
            
            <!-- Total Admin -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12"> 
                <div class="card card-statistic-1"> 
                    <div class="card-icon" style="background-color: #3F51B5;"> 
                        <i class="fas fa-user-shield"></i> 
                    </div> 
                    <div class="card-wrap"> 
                        <div class="card-header"> 
                            <h4>Total Admin</h4> 
                        </div> 
                        <div class="card-body"> 
                            {{ $admins }} 
                        </div> 
                    </div> 
                </div> 
            </div> 

            <!-- Total Pengguna -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12"> 
                <div class="card card-statistic-1"> 
                    <div class="card-icon" style="background-color: #4CAF50;">
                        <i class="fas fa-users"></i> 
                    </div> 
                    <div class="card-wrap"> 
                        <div class="card-header"> 
                            <h4>Total Pengguna</h4> 
                        </div> 
                        <div class="card-body"> 
                            {{ $users }} 
                        </div> 
                    </div> 
                </div> 
            </div> 

            <!-- Total Produk -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12"> 
                <div class="card card-statistic-1"> 
                    <div class="card-icon" style="background-color: #FFC107;"> 
                        <i class="fas fa-cubes"></i> 
                    </div> 
                    <div class="card-wrap"> 
                        <div class="card-header"> 
                            <h4>Total Produk</h4> 
                        </div> 
                        <div class="card-body"> 
                            {{ $products }} 
                        </div> 
                    </div> 
                </div> 
            </div>

            <!-- Total Distributor -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12"> 
                <div class="card card-statistic-1"> 
                    <div class="card-icon" style="background-color: #00BCD4;"> 
                        <i class="fas fa-shipping-fast"></i> 
                    </div> 
                    <div class="card-wrap"> 
                        <div class="card-header"> 
                            <h4>Total Distributor</h4> 
                        </div> 
                        <div class="card-body"> 
                            {{ $distributors }} 
                        </div> 
                    </div> 
                </div> 
            </div>

            <!-- Total Flashsale -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12"> 
                <div class="card card-statistic-1"> 
                    <div class="card-icon" style="background-color: #FF5722;"> 
                        <i class="fas fa-fire"></i> 
                    </div> 
                    <div class="card-wrap"> 
                        <div class="card-header"> 
                            <h4>Total Flash Sale</h4> 
                        </div> 
                        <div class="card-body"> 
                            {{$flashsales}} 
                        </div> 
                    </div> 
                </div> 
            </div>
        </div>

        </section> 
    </div> 
@endsection