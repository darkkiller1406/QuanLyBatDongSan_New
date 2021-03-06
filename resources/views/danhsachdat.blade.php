@section('title','Danh sách đất')
@extends('layout.master_ban')
@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">DANH SÁCH ĐẤT</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Advance Search Area Start ##### -->
    @include('layout.search')
    <!-- ##### Advance Search Area End ##### -->
    <?php
    function convertMoney($money)
    {
        if (strlen($money) < 10) {
            $value = " triệu";
        } else {
            $value = " tỷ";
        }
        $money = substr($money, 0, 1) . '.' . substr($money, 1, 3);
        $money = round($money, 2);
        return $money . $value;
    }
    ?>
    <!-- ##### Listing Content Wrapper Area Start ##### -->
    <section class="listings-content-wrapper section-padding-100">
        <div class="container">
            <div class="row">
            @foreach ($dat as $d)
                <!-- Single Featured Property -->
                    <?php if ($d->TrangThai == 0) { ?>
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
                            <!-- Property Thumbnail -->
                            <div class="property-thumb">
                                <?php $array = (explode(';', $d->HinhAnh)); $hinh = $array[0]; ?>
                                <img src="<?php echo asset('img/' . $hinh) ?>" alt=""
                                     style="height: 250px; width: 100%">
                                <div class="tag">
                                    <span>Đang bán</span>
                                </div>
                                <div class="list-price">
                                    <a href="chitiet/{{$d->id}}"><p>
                                            <?php
                                            $money = number_format(($d->DienTich) * ($d->DonGia));
                                            echo convertMoney($money);
                                            ?>
                                            VNĐ</p></a>
                                </div>
                            </div>
                            <!-- Property Content -->
                            <div class="property-content">
                                <h5>Đất quận
                                    @foreach ($quan as $q)
                                        <?php if ($q->id == $d->phuong->ThuocQuan) {
                                            $tenQuan = $q->TenQuan;
                                            echo $tenQuan;
                                        } ?>
                                    @endforeach
                                </h5>
                                <p class="location"><img src="img/icons/location.png" alt="">{{$d->phuong->TenPhuong}}
                                    , {{$tenQuan}}</p>
                                <p><b>Diện tích:</b> {{$d->DienTich}} m2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Hướng:</b> {{$d->Huong}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                @endforeach
            </div>

<!--             <div class="row">
                <div class="col-12">
                    <div class="south-pagination d-flex justify-content-end">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link active" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div> -->
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