@section('title','Thêm lô đất mới')
@extends('layout.master')
@section('content')

<section id="main-content">
    <section class="wrapper">
        <h3>UPLOAD MẪU HỢP ĐỒNG</h3>

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
                        <form class="form-horizontal style-form" method="post" enctype="multipart/form-data" action="{{route('uploadHD')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                            <label class="col-sm-3 col-sm-3 control-label">Mẫu hợp đồng</label>
                            <div class="col-sm-9">
                                <input type="file" name="hopdong[]" accept=
                                ".docx" class="form-control" required >
                            </div>
                            </div>
                            <div class="col-md-5">
                            </div>
                            <button type="submit" id="submitbtn" name="submitbtn" class="btn btn-primary" >Upload</button>
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
@endsection