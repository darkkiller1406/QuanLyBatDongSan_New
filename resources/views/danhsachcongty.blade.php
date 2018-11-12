@section('title','Danh sách đất')
@extends('layout.master_ban')
@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">DANH SÁCH THÀNH VIÊN</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Advance Search Area Start ##### -->
    @include('layout.search')
    <!-- ##### Advance Search Area End ##### -->
    <!-- ##### Listing Content Wrapper Area Start ##### -->
    <section class="listings-content-wrapper section-padding-100">
        <div class="container">
            <div class="row">
                @foreach ($congty as $ct)
                <!-- Single Featured Property -->

                <div class="col-12 col-md-6 col-xl-4">
                    <a href="thanhvien/{{$ct->Link}}">
                        <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
                            <!-- Property Thumbnail -->
                            <div class="property-thumb">
                                <img src="<?php echo asset('img/logo/'.$ct->Logo) ?>" alt="" style="height: 250px; width: 100%">
                            </div>
                            <!-- Property Content -->
                            <div class="property-content">
                                <h5>{{$ct->TenCongTy}}</h5>
                                <p>
                                    <b>Địa chỉ</b> {{$ct->DiaChi}} <br>
                                    <b>SDT:</b> {{$ct->SDT}}<br>
                                    <b>Email:</b> {{$ct->SDT}}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="south-pagination d-flex justify-content-end">
                        <nav aria-label="Page navigation">
                            {{$congty->links()}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Listing Content Wrapper Area End ##### -->
@endsection
@section('script')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $('#tp').on('change', function () {
                if (tp) {
                    $.ajax({
                        type: 'get',
                        url: '{{ url("timquan") }}',
                        data: {tp: $(this).val()},
                        async: true,
                        success: function (html) {
                            $('#quan').html(html);
                        }
                    });
                } else {
                    $('#quan').html('<option value="0">Chọn thành phố</option>');
                }
            });
        });
    </script>
@endsection