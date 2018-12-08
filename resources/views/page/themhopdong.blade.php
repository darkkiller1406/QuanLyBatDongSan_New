@section('title','Thêm lô đất mới')
@extends('layout.master')
@section('content')

<section id="main-content">
    <section class="wrapper">
        <h3>THÊM HỢP ĐỒNG MỚI</h3>

        <div class="row mt">
            <div class="col-md-12">
                <div class="content-panel">
                @if(count($errors) > 0)
                <div class="alert alert-danger" style="font-size: 0.9em;text-align: center;margin-top: 20px;">
                    @foreach($errors->all() as $err)
                    {{ $err }}<br>
                    @endforeach
                </div>
                @endif

                @if(session('thongbao'))
                <div class="alert alert-success" style="font-size: 0.9em;text-align: center;margin-top: 20px;">
                    {{ session('thongbao') }}
                </div>
                @endif
                @if(session('canhbao'))
                <div class="alert alert-danger" style="font-size: 0.9em;text-align: center;margin-top: 20px;">
                    {{ session('canhbao') }}
                </div>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-panel">
                        <form class="form-horizontal style-form" method="post" enctype="multipart/form-data" action="{{route('post_ThemHD')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="iddat" id="iddat" value="{{$yeucau->id_dat}}">
                            <input type="hidden" name="idyc" id="idyc" value="{{$yeucau->id}}">
                            <?php 
                                $dt = ($yeucau->dat->Dai) * ($yeucau->dat->Rong) + (0.5 * ($yeucau->dat->NoHau) * ($yeucau->dat->Dai));
                                $giaban = $dt * ($yeucau->dat->DonGia);
                                $giamua = $dt * ($yeucau->dat->DonGiaMua); 
                            ?>
                            <input type="hidden" name="giamua" id="giamua" value="{{$giamua}}">
                            <div class="form-group">
                                <label class="col-sm-3 col-sm-3 control-label">Lô đất</label>
                                <div class="col-sm-9">
                                <label class=" control-label" id="kyhieudat">{{$yeucau->dat->KyHieuLoDat}}</label>
                                </div>
                            </div>
                            <div class="form-group">
                            <label class="col-sm-3 col-sm-3 control-label">Giá bán lô đất</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="gia" name="gia" type="number" value="{{$giaban}}" required>
                            </div>
                            </div>
                            <div class="form-group">
                            <label class="col-sm-3 col-sm-3 control-label">Tên khách hàng mua</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="khmua" id="khmua" required>
                                @foreach ($khachhang as $kh)
                                    <option value="{{$kh->id}}">{{$kh->MaKhachHang}} - {{$kh->HoVaTenDem}} {{$kh->Ten}}</option>
                                @endforeach
                                </select>
                            </div>
                            </div>
                            <div class="form-group">
                            <label class="col-sm-3 col-sm-3 control-label">Mã hợp đồng</label>
                            <div class="col-sm-9">
                                <input type="text" name="mahopdong" class="form-control" required >
                            </div>
                            </div>
                            <div class="form-group">
                            <label class="col-sm-3 col-sm-3 control-label">Tiền đặt cọc</label>
                            <div class="col-sm-9">
                                <input type="text" name="tiendatcoc" id='tiendatcoc' class="form-control" required >
                            </div>
                            </div>
                            <div class="form-group">
                            <label class="col-sm-3 col-sm-3 control-label">Hình thức thanh toán</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="thanhtoan" id="thanhtoan" required>
                                    <option value="1">Tiền mặt</option>
                                    <option value="2">Chuyển khoản</option>
                                </select>
                            </div>
                            </div>
                            <div class="form-group">
                            <label class="col-sm-3 col-sm-3 control-label">Ngày thanh toán</label>
                            <div class="col-sm-9">
                            <input type="date" name="ngaythanhtoan" id='ngaythanhtoan' class="form-control" required >
                            </div>
                            </div>
                            <!-- <div class="form-group">
                            <label class="col-sm-3 col-sm-3 control-label">File hợp đồng</label>
                            <div class="col-sm-9">
                                <input type="file" name="hopdong[]" accept=
                                "application/msword,text/plain, application/pdf" class="form-control" >
                            </div>
                            </div> -->
                            <div class="col-md-5">
                            </div>
                            <button type="submit" id="submitbtn" name="submitbtn" class="btn btn-primary" >Xác nhận</button>
                        </form>
                    </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('script')
<!-- js placed at the end of the document so the pages load faster -->
<script src="{{asset('js/common-scripts.js')}}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 
    $(document).ready(function () {
        $('#gia').on('change',function() {
            var giaban = Number($('#gia').val());
            var giamua = Number($('#giamua').val())
            if( giaban < giamua ) {
              $('#gia').val($('#giamua').val());
            }
        });
        $('#sotien').on('change',function(){
            if($('#sotien').val() <= 0)
            {
              $('#sotien').val('1');
            }
            var tien = ($('#sotientam').val())*30/100;
            if($('#sotien').val() > tien)
            {
              $('#sotien').val(tien);
            }
        });
        $("#ngaythanhtoan").change(function() {
            var hientai = new Date();
            var ngaythanhtoan = new Date($("#ngaythanhtoan").val());
            if( hientai > ngaythanhtoan ) {
                document.getElementById("ngaythanhtoan").valueAsDate = new Date();
            }
        });
        $("#tiendatcoc").change(function() {
            var giaban = Number($('#gia').val());
            var tiendatcoc = Number($('#tiendatcoc').val());
            if(tiendatcoc >= giaban) {
                $('#tiendatcoc').val((giaban*90)/100);
            }
            if(tiendatcoc < (giaban*10)/100) {
                $('#tiendatcoc').val((giaban*10)/100);
            }
        });
    });
</script>
@endsection