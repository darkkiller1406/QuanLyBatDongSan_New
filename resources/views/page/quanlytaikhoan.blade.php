@section('title','Quản lý tài khoản')
@extends('layout.master')
@section('content')
<section id="main-content">
  <section class="wrapper">
    <h3>QUẢN LÝ TÀI KHOẢN</h3>

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
          <div class="form-group">
            <div class="col-md-2 col-sm-2 control-label"></div>
            <div class="col-md-6">
             <div id="custom-search-input">
              <div class="input-group col-md-12">
               <input type="text" id="search" class="form-control input-md" placeholder="Tìm kiếm" />
               <span class="input-group-btn">
                <button class="btn btn-info btn-lg">
                 <i class="glyphicon glyphicon-search"></i>
               </button>
             </span>
           </div>
         </div>
       </div>
       <div class="col-md-3 col-sm-2 control-label"><button type="button" class="btn btn-theme" data-toggle="modal" data-target="#themnv"><i class="fa fa-plus"></i></button></div>
     </div>
     <table id="dtable" class="table table-striped table-advance table-hover table-ed">
       <hr>
       <thead>
        <tr>
         <th>STT</th>
         <th>ID tài khoản</th>
         <th>Email</th>
         <th>Ngày tạo</th>
         <th>Ngày cập nhật</th>
         <th></th>
       </tr>
     </thead>
     <tbody>
      <?php $i=0 ?>
       @foreach($taikhoan as $tk)
       <tr>
         <td>{{++$i}}</td>
         <td>{{$tk->name}}</td>
         <td>{{$tk->email}}</td>
         <td>{{$tk->created_at}}</td>
         <td>{{$tk->updated_at}}</td>
         <td></td>
         <td>
          <button class="btn btn-warning btn-xs classReset" idrs="{{$tk->id}}" id="{{$tk->id}}" onClick="reset_click(this.id)"><i class="fas fa-redo"></i></button>
          <button class="btn btn-danger btn-xs classXoa" idbd="{{$tk->id}}" id="{{$tk->id}}" onClick="reply_click(this.id)"><i class="fas fa-trash"></i></button>
        </td>
      </tr>
    </tbody>
    @endforeach
  </table>
</div><!-- /content-panel -->
</div><!-- /col-md-12 -->
</div><!-- /row -->

</section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->

<!-- Modal Thêm -->
<div class="modal fade" id="themnv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">THÊM NHÂN VIÊN</h4>
      </div>
      <div class="modal-body">
       <!-- BASIC FORM ELELEMNTS -->
       <div class="row">
        <div class="col-lg-12">
          <div class="form-panel">
            <form class="form-horizontal style-form" method="post" action="{{route('post_ThemTK')}}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">ID tài khoản</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name='name' required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Mật khẩu</label>
                <div class="col-sm-10">
                  <input type="password" name="password" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Nhập lại mật khẩu</label>
                <div class="col-sm-10">
                  <input type="password" name="passwordAgain" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" name="email" class="form-control" required>
                </div>
              </div>
              <div class="col-md-6">
              </div>
              <button type="submit" id="submitbtn" name="submitbtn" class="btn btn-primary" >Thêm</button>
            </form>
          </div>
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
<script type="text/javascript">
      // chi tiết
        /// ajax
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        function reply_click(clicked_id)
        {
          var kq=  confirm('Bạn muốn xóa không ?');
          if(kq==true){
            var id = clicked_id;
            location.href='xoatk/'+id;
          }
        }
        function reset_click(clicked_id)
        {
          var kq=  confirm('Bạn muốn reset lại mật khẩu không ?');
          if(kq==true){
            var id = clicked_id;
            location.href='resettk/'+id;
          }
        }
        $(document).ready(function(){
          $("#search").keyup(function() {
            $.ajax({
              type:'get',
              url: '{{ url("page/timtk") }}',
              data: {name:$("#search").val()},
              async: true,
              success: function(data){
                $("#dtable").html(data);
              }
            });
          });
        });
      </script>
      @endsection