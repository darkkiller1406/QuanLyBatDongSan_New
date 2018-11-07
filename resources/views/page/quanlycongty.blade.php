@section('title','Quản lý công ty')
@extends('layout.master')
@section('content')

<section id="main-content">
    <section class="wrapper">
        <h3>QUẢN LÝ CÔNG TY</h3>

        <div class="row mt">
            <div class="col-md-12">
                <div class="content-panel">
                    @if(count($errors) > 0)
                    <div class="alert alert-danger"
                    style="font-size: 0.9em;text-align: center;margin-top: 20px;">
                    @foreach($errors->all() as $err)
                    {{ $err }}<br>
                    @endforeach
                    </div>
                    @endif

                    @if(session('thongbao'))
                    <div class="alert alert-success"
                    style="font-size: 0.9em;text-align: center;margin-top: 20px;">
                    {{ session('thongbao') }}
                    </div>
                    @endif
                    @if(session('canhbao'))
                    <div class="alert alert-danger"
                    style="font-size: 0.9em;text-align: center;margin-top: 20px;">
                    {{ session('canhbao') }}
                    </div>
                    @endif
                    <div class="form-group">
                        <div class="col-md-3 col-sm-3 control-label"></div>
                        <div class="col-md-6 col-sm-6 ">
                            <div id="custom-search-input">
                                <div class="input-group col-md-12">
                                    <input type="text" id="search" class="form-control input-md"
                                    placeholder="Tìm kiếm"/>  
                                    <span class="input-group-btn">
                                        <button class="btn btn-info btn-lg">
                                         <i class="glyphicon glyphicon-search"></i>
                                     </button>
                                 </span>
                             </div>
                         </div>
                     </div>
                    </div>
        <table id="dtable" class="table table-striped table-advance table-hover table-ed">
            <hr>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên công ty</th>
                    <th>Link</th>
                    <th>SDT</th>
                    <th>Email</th>
                    <th>Trạng thái</th>
                    <th>Ngày hết hạn</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0;?>
                @foreach( $congty as $ct )
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$ct->TenCongTy}}</td>
                    <td>{{$ct->Link}}</td>
                    <td>{{$ct->SDT}}</td>
                    <td>{{$ct->Email}}</td>
                    @if(($ct->LoaiTaiKhoan) == 1)
                    <td>Người dùng cơ bản</td>
                    @endif
                    @if(($ct->LoaiTaiKhoan) == 2)
                    <td>Người dùng nâng cao</td>
                    @endif
                    @if(($ct->LoaiTaiKhoan) == 3)
                    <td>Đã ngừng sử dụng</td>
                    @endif
                    <td>{{$ct->NgayHetHan}}</td>
                    <td>
                    <button class="btn btn-warning btn-xs classReset" idrs="{{$ct->idCongTy}}" id="{{$ct->idCongTy}}" onClick="reset_click(this.id)" data-toggle="tooltip" data-placement="top" title="Reset password"><i class="fas fa-redo"></i></button>
                    @if($ct->LoaiTaiKhoan != 3)
                    <button class="btn btn-danger btn-xs classXoa" idbd="{{$ct->idCongTy}}" id="{{$ct->idCongTy}}" onClick="huykichhoat(this.id)" data-toggle="tooltip" data-placement="top" title="Hủy kích hoạt"><i class="fas fa-ban"></i></button>
                    @endif
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div><!-- /content-panel -->
</div><!-- /col-md-12 -->
</div><!-- /row -->

</section>
</section><!-- /MAIN CONTENT -->

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

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
    $("#search").keyup(function () {
        $.ajax({
            type: 'post',
            url: '{{ url("page/timcongty") }}',
            data: {name: $("#search").val()},
            async: true,
            success: function (data) {
                $("#dtable").html(data);
            }
        });
    });
    function reply_click(clicked_id) {
        var kq = confirm('Bạn muốn xóa không ?');
        if (kq == true) {
            var id = clicked_id;
            location.href = 'xoadat/' + id;
        }
    }
    function huykichhoat(clicked_id) {
        var kq = confirm('Bạn muốn hủy kích hoạt tài khoản này không ?');
        if (kq == true) {
            var id = clicked_id;
            location.href = 'huykichhoat/' + id;
        }
    }
</script>

@endsection