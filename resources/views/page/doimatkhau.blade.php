@section('title','Quản lý dự án')
@extends('layout.master')
@section('content')
<section id="main-content">
  <section class="wrapper">
    <h3>ĐỔI MẬT KHẨU</h3>
    <div class="row mt">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <div class="content-panel gd">
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
          <form class="form-horizontal style-form" method="post" action="{{route('post_SuaMK') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="iduser" value=" {{ Auth::user()->id }} ">
            <div class="form-group">
              <label class="col-sm-3 control-label">Mật khẩu cũ</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" name="passold" id="passold" required>
              </div>
            </div>
           <div class="form-group">
              <label class="col-sm-3 control-label">Mật khẩu mới</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" name="passnew" id="passnew">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Nhập lại mật khẩu mới</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" name="repass" id="repass">
              </div>
            </div>
            <div class="col-md-5">
            </div>
            <button type="submit" id="submitbtn" name="submitbtn" class="btn btn-primary" >Cập nhật</button>
          </form>
        </div><!-- col-lg-12-->       
      </div><!-- /row -->
    </div>
  </div>
</div>
</div>              
</div><!-- /showback -->
@endsection
@section('script')
<!-- js placed at the end of the document so the pages load faster -->
<script src="{{asset('js/common-scripts.js')}}"></script>
@endsection