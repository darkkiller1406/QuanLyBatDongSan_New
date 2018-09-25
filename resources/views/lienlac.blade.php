@section('title','Liên lạc')
@extends('layout.master_ban')
@section('content')
<div class="inside-banner">
  <div class="container"> 
    <h2>Liên lạc</h2>
  </div>
</div>
<!-- banner -->


<div class="container">
  <div class="spacer">
    <div class="row contact">
      <div class="col-lg-6 col-sm-6 ">
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
        <form role="form" method="post" action="{{route('ThemYeuCauLL')}}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="text" class="form-control" name="ten" placeholder="Tên đầy đủ"/>
          <input type="mail" class="form-control" name="email" placeholder="Email"/>
          <input type="text" class="form-control" name="dt" placeholder="Điện thoại liên lạc"/>
          <textarea rows="6" class="form-control" name="yeucau" placeholder="Yêu cầu"></textarea>
          <button type="submit" class="btn btn-primary" name="Submit">Gửi</button>
        </form>
      </div>
      <div class="col-lg-6 col-sm-6 ">
        <div class="well"><iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4116995018894!2d106.66710831435051!3d10.779746492319287!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752eda0bd26871%3A0xc955f323bb50424e!2zSOG6u20gMTYzIFTDtCBIaeG6v24gVGjDoG5oLCBQaMaw4budbmcgMTMsIFF14bqtbiAxMCwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1527751747425"></iframe></div>
      </div>
    </div>
  </div>
</div>
@endsection