@section('title','Quản lý hóa đơn')
@extends('layout.master')
@section('content')
<section id="main-content">
  <section class="wrapper">
    <h3>QUẢN LÝ HOẠT ĐỘNG</h3>

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
          <form method="post" action="{{route('timHDU')}}">
            {{csrf_field()}}
            <div class="form-group">
              <div class="col-md-4 col-sm-4 control-label"></div>
              <div class="col-md-4">
               <div id="custom-search-input">
                <div class="input-group col-md-12">
                  @if(isset($ngay))
                  <input type="date" name="ngay" class="form-control" value="{{$ngay}}">
                  @else
                  <input type="date" name="ngay" class="form-control" value="<?php echo date('Y-m-d') ?>">
                  @endif
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-2 control-label"><button type="submit" class="btn btn-theme"><i class="fas fa-search"></i></button></div>
          </div>
        </form>
     <table id="dtable" class="table table-striped table-advance table-hover table-ed">
       <hr>
       <thead>
        <tr>
         <th>STT</th>
         <th>Hành động</th>
         <th>Người thực hiện</th>
         <th>Mô tả</th>
         <th>Dữ liệu thay đổi</th>
         <th>Thời gian</th>
       </tr>
     </thead>
     <tbody>
      <?php $i=0 ?>
      @foreach ($hoatdong as $hd)
       <tr>
         <td>{{++$i}}</td>
         @if ($hd->log_name == 1)
         <td>Thêm mới</td>
         @endif
         @if ($hd->log_name == 2)
         <td>Xóa</td>
         @endif
         @if ($hd->log_name == 3)
         <td>Cập nhật</td>
         @endif
         @if ($hd->log_name == 4)
         <td>Đăng tin</td>
         @endif
         @if ($hd->log_name == 5)
         <td>Hủy đăng tin</td>
         @endif
         <td>{{$hd->name}}</td>
         <td>{{$hd->description}}</td>
         <td>
           <?php
           if(isset($hd->properties)) {
              foreach ($hd->properties as $key => $value) {
                echo $key.': '.$value.'<br>' ;
              } 
           }
           ?>
         </td>
         <td>
         <?php 
            $date = date_create($hd->updated_at);
            echo date_format($date, "d/m/Y H:i:s") 
          ?> 
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div><!-- /content-panel -->
</div><!-- /col-md-12 -->
</div><!-- /row -->
{{ $hoatdong->links() }}
</section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->


@endsection
@section('script')
<!-- js placed at the end of the document so the pages load faster -->
<script src="{{asset('js/common-scripts.js')}}"></script>
<script type="text/javascript">
        /// ajax
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
      </script>
      @endsection