@section('title','Liên lạc')
@extends('layout.master_ban')
@section('content')
 <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">LIÊN HỆ</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <section class="south-contact-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-heading">
                        <h6>Thông tin liên hệ</h6>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Contact Form Area -->
                <div class="col-12 col-lg-12">
                    <div class="contact-form">
                        <form action="{{route('ThemYeuCauLL')}}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <input type="text" class="form-control" name="ten" placeholder="Tên đầy đủ"/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="dt" placeholder="Điện thoại liên lạc"/>
                            </div>
                            <div class="form-group">
                                <input type="mail" class="form-control" name="email" placeholder="Email"/>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Yêu cầu" name="yeucau"></textarea>
                            </div>
                            <button type="submit" class="btn south-btn">Gửi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Google Maps -->
    <div class="map-area mb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4116995018894!2d106.66710831435051!3d10.779746492319287!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752eda0bd26871%3A0xc955f323bb50424e!2zSOG6u20gMTYzIFTDtCBIaeG6v24gVGjDoG5oLCBQaMaw4budbmcgMTMsIFF14bqtbiAxMCwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1527751747425"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection