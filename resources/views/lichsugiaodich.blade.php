@section('title','Lịch sử giao dịch')
@extends('layout.master_ban')
@section('content')
    <section class="breadcumb-area bg-img" style="background-image: url(../img/bg-img/hero1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">Lịch sử giao dịch</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="south-contact-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <table id="dtable" class="table-gia" style="margin-top: -30px;">
                        <thead>
                        <tr>
                            <th style="text-align: center;">STT</th>
                            <th style="text-align: center;">Giao dịch</th>
                            <th style="text-align: center;">Số tiền</th>
                            <th style="text-align: center;">Ngày lập</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0;$tong = 0; ?>
                        @foreach($lichsugiaodich as $hd)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$hd->GiaoDich}}</td>
                                <td>{{number_format($hd->TienGiaoDich)}} VNĐ</td>
                                <td><?php $date = date_create($hd->created_at);
                                    echo date_format($date, "d/m/Y H:i:s") ?></td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('script')

@endsection