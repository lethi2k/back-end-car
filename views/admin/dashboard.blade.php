@extends('layouts.admin')
@section('content')
<div class="card card-success" style="min-height:700px">
<div class="card-header">
    <h3 class="card-title">Trang Chủ - Được thực hiện bởi Lê Đình Thi</h3>
</div>
    <div class="row py-5 px-3">
        <div class="col-lg-5 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$totalcar}}</h3>

                    <p>Mặt Hàng Xe Hơi</p>
                </div>
                <div class="icon">
                <i class="ion ion-bag"></i>
                </div>
                <a href="{{BASE_URL . 'cars'}}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-2 col-2"></div>
        <div class="col-lg-5 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$totalbrand}}</h3>

                    <p>Hãng Xe Hiện Tại</p>
                </div>
                <div class="icon">
                <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{BASE_URL . 'brand'}}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    </div>
@endsection