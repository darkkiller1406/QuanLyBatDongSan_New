@section('title','Thêm lô đất mới')
@extends('layout.master')
@section('content')

<section id="main-content">
    <section class="wrapper">
        <h3>THÊM LÔ ĐẤT MỚI</h3>

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
                            <form id="upload" class="form-horizontal style-form" method="post"
                            action="{{route('post_ThemDAT')}}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="idnguoitao" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="map" id="map" value="">
                            <input type="hidden" name="sohuu" value="{{ Auth::user()->ThuocCongTy }}">
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Ký hiệu lô đất</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='mald' id="mald" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="trangthai_add" name="trangthai">
                                        <option value="3">Hiện có</option>
                                        <option value="0">Đang đăng bán</option>
                                        <option value="1">Đang giao dịch</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Địa chỉ</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="diachi"
                                    required>
                                    <input type="hidden" id="txtaddress" name='diachi' value="" class="form-control"/>
                                    <input type="hidden" id="txtlat" value="" name="txtlat" class="form-control"/>
                                    <input type="hidden" id="txtlng" value="" name="txtlng" class="form-control"/>
                                </div>
                                <div class="col-md-12" style="margin-top: 15px;">
                                    <p><i class="far fa-bell"></i> Nếu địa chỉ hiển thị bên bản đồ không đúng bạn có thể điều chỉnh bằng cách
                                    kéo điểm màu xanh trên bản đồ tới vị trí chính xác.</p>
                                    <div id="map-canvas"
                                    style="width: auto; height: 400px;margin-bottom: 20px;padding-left: 30px;border: 1px solid black;"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Quận</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="quan" id="quan">
                                        @foreach ($quan as $l)
                                        <option value="{{$l->id}}">{{$l->TenQuan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Phường</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="phuong" id="phuong-add">
                                        @foreach ($phuong as $p)
                                        @if($p->ThuocQuan == 1)
                                        <option value="{{$p->id}}">{{$p->TenPhuong}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Đơn giá mua</label>
                                <div class="col-sm-9">
                                    <input type="number" name="dongiamua" id="dongiamua" class="form-control"
                                    required>
                                </div>
                                <label class="col-sm-1 control-label">VND/m2</label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Đơn giá bán</label>
                                <div class="col-sm-9">
                                    <input type="number" name="dongia" id="dongiathem" class="form-control"
                                    required>
                                </div>
                                <label class="col-sm-1 control-label">VND/m2</label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Chiều rộng</label>
                                <div class="col-sm-9">
                                    <input type="number" name="rong" id="rongthem" class="form-control"
                                    required>
                                </div>
                                <label class="col-sm-1 control-label">m</label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Chiều dài</label>
                                <div class="col-sm-9">
                                    <input type="number" name="dai" id="daithem" class="form-control" required>
                                </div>
                                <label class="col-sm-1 control-label">m</label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Nở hậu</label>
                                <div class="col-sm-9">
                                    <input type="number" name="nohau" id="nohauthem" class="form-control"
                                    required>
                                </div>
                                <label class="col-sm-1 control-label">m</label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Hướng</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="huong">
                                        <option value="Đông">Đông</option>
                                        <option value="Tây">Tây</option>
                                        <option value="Nam">Nam</option>
                                        <option value="Bắc">Bắc</option>
                                        <option value="Đông-Nam">Đông-Nam</option>
                                        <option value="Đông-Bắc">Đông-Bắc</option>
                                        <option value="Tây-Nam">Tây-Nam</option>
                                        <option value="Tây-Bắc">Tây-Bắc</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Thửa số</label>
                                <div class="col-sm-10">
                                    <input type="number" name="thuaso" id="thuaso" class="form-control"
                                    required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Tờ bản đồ số</label>
                                <div class="col-sm-10">
                                    <input type="number" name="tobando" id="tobando" class="form-control"
                                    required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Giấy chứng nhận quyền sử dụng đất số</label>
                                <div class="col-sm-10">
                                    <input type="text" name="giaychungnhan" id="giaychungnhan" class="form-control"
                                    required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Mô tả</label>
                                <div class="col-sm-10">
                                    <textarea type="textarea" name="ghichu" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Hình ảnh</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image[]" multiple class="form-control" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                            <button type="submit" id="submitbtn" name="submitbtn" class="btn btn-primary">Thêm
                            </button>
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
<script type="text/javascript"
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzlVX517mZWArHv4Dt3_JVG0aPmbSE5mE&callback=initialize&libraries=geometry,places"
async defer></script>
<script src="{{asset('js/kiemtradiachi.js')}}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 
    $(document).ready(function () {
        $('#quan').on('change', function () {
            if (quan) {
                $.ajax({
                    type: 'get',
                    url: '{{ url("timphuong") }}',
                    data: {quan: $(this).val()},
                    async: true,
                    success: function (html) {
                        html = html.slice(110)
                        console.log(html)
                        $('#phuong-add').html(html);
                    }
                });
            } else {
                $('#phuong-add').html('<select class="form-control" name="phuong" id="phuong-add"><option value="0">Chọn quận</option></select>');
            }
        });
        $('#dongiamua').on('change', function () {
            if ($('#dongiamua').val() <= 0) {
                $('#dongiamua').val('1');
            }
        });
        $('#rong').on('change', function () {
            if ($('#rong').val() <= 0) {
                $('#rong').val('1');
            }
        });
        $('#dai').on('change', function () {
            if ($('#dai').val() <= 0) {
                $('#dai').val('1');
            }
        });
        $('#nohau').on('change', function () {
            alert($('#nohau').val());
            if ($('#nohau').val() < 0) {
                $('#nohau').val('0');
            }
        });
        $('#dongiathem').on('change', function () {
            if ($('#dongiathem').val() <= 0) {
                $('#dongiathem').val('1');
            }
            if ($('#dongiathem').val() < $('#dongiamua').val()) {
                $('#dongiathem').val($('#dongiamua').val());
            }
        });
        $('#daithem').on('change', function () {
            if ($('#daithem').val() <= 0) {
                $('#daithem').val('1');
            }
        });
        $('#nohauthem').on('change', function () {
            if ($('#nohauthem').val() < 0) {
                $('#nohauthem').val('0');
            }
        });
        $('#rongthem').on('change', function () {
            if ($('#rongthem').val() <= 0) {
                $('#rongthem').val('1');
            }
        });

        $("#search").keyup(function () {
            $.ajax({
                type: 'get',
                url: '{{ url("page/timdat") }}',
                data: {name: $("#search").val()},
                async: true,
                success: function (data) {
                    $("#dtable").html(data);
                }
            });
        });
    });
</script>
@endsection