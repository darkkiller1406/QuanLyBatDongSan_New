@section('title','Lịch sử giao dịch')
@extends('layout.master_ban')
@section('content')
    <section class="breadcumb-area bg-img" style="background-image: url({{asset('img/bg-img/hero1.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">Gia hạn tài khoản</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="south-contact-area section-padding-100">
        <div class="container">
            @if(session('thongbao'))
            <div class="alert alert-success"
            style="font-size: 0.9em;text-align: center;margin-top: 20px;">
            {{ session('thongbao') }}
            </div>
            @endif
            @if(isset($canhbao))
            <div class="alert alert-warning"
            style="font-size: 0.9em;text-align: center;margin-top: 20px;">
            {{$canhbao}}
            </div>
            @endif
            <div class="row">
                <div class="contact-heading">
                  <h6>Gia hạn</h6>
                </div>
                <div class="col-lg-12 col-md-12">
                    <form action="{{route('postgiahan')}}" method="post" >
                        {{ csrf_field() }}
                        <div class="row">
                            <select class="form-control" id="loaiTaiKhoan" name="loaiTaiKhoan">
                                <?php $now = (new \DateTime())->format('Y-m-d H:i:s'); ?>
                                @if($now <= $ngayhethan && $loaitaikhoan == 2)
                                <option value="2">Gói nâng cao</option>
                                @else
                                <option value="1">Gói cơ bản</option>
                                <option value="2">Gói nâng cao</option>
                                @endif
                            </select>
                            <select class="form-control" id="thang" name="thang">
                                <option value="1">1 tháng</option>
                                <option value="2">2 tháng</option>
                                <option value="3">3 tháng</option>
                                <option value="4">4 tháng</option>
                                <option value="5">5 tháng</option>
                            </select>
                            <div class="col-md-5">
                            </div>
                            <!-- Submit -->
                            <div class="form-group">
                                <button type="submit" class="btn south-btn">GIA HẠN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')

@endsection