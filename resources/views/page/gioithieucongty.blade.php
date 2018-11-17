@section('title','Giới thiệu về công ty')
@extends('layout.master')
@section('content')

<section id="main-content">
    <section class="wrapper">
        <h3>GIỚI THIỆU VỀ CÔNG TY</h3>
        <div class="row mt">
            <div class="col-md-12">
                <div class="content-panel">
                <div class="row">
                    <div class="col-lg-12">
                        @if(session('thongbao'))
                        <div class="alert alert-success"
                        style="font-size: 0.9em;text-align: center;margin-top: 20px;">
                        {{ session('thongbao') }}
                        </div>
                        @endif
                        <div class="form-panel">
                            <form id="upload" class="form-horizontal style-form" method="post"
                            action="{{route('post_ThemGioiThieu')}}" enctype="multipart/form-data">
                             {{csrf_field()}}
                            <div class="form-group">
                                <label class="col-sm-1 col-sm-1 control-label">Tiêu đề</label>
                                <div class="col-sm-11">
                                    <input type="text" class="form-control" name='tieude' id="tieude" 
                                        <?php if(isset($gioithieu)) { ?>
                                        value = "{{$gioithieu->TieuDe}}"
                                        <?php } ?>
                                     required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <textarea style="width: 100%; height: 500px"  type="text" class="form-control" name='noidung' id="noidung" required>
                                        @if(isset($gioithieu))
                                        {{$gioithieu->NoiDung}}
                                        @endif
                                    </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5"></div>
                                <button type="submit" id="submitbtn" name="submitbtn" class="btn btn-primary">Cập nhật</button>
                            </div> 
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
    CKEDITOR.replace( 'noidung', {
    extraPlugins: 'easyimage',
    cloudServices_tokenUrl: 'https://35769.cke-cs.com/token/dev/huQAVpN0EfwI4Z33shH61tiBm7TTsDAkfXay9g2HxO4ubyc6oopJf4qMt6ar',
    cloudServices_uploadUrl: 'https://35769.cke-cs.com/easyimage/upload/'
    } );
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 
</script>
@endsection