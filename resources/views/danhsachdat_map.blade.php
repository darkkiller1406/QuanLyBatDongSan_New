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
    <div class="container">
        <div class="properties-listing spacer">
            <div class="row">
                <div class="col-lg-12">
                    <div id="map"
                         style="width: auto; height: 800px;margin-bottom: 50px;padding-left: 30px;border: 1px solid black; margin-top: 50px;"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 10.769444, lng: 106.681944},
                zoom: 13,
                draggable: true
            });

            /* Get latlng list phòng trọ */
            <?php
            $arrmergeLatln = array();
            foreach ($dat as $room) {
                $arrlatlng = explode(';', $room->Map);
                $slug = $room->id;
                //$arrlatlng = json_decode($room->Map,true);
                $arrImg = explode(';', $room->HinhAnh);
                $arrmergeLatln[] = ["slug" => $slug, "lat" => $arrlatlng[0], "lng" => $arrlatlng[1], "title" => 'Đất bán', "address" => $room->phuong->TenPhuong . ', ' . $room->TenQuan($room->Phuong), "image" => $arrImg[0], "phone" => '0569885811'];

            }

            $js_array = json_encode($arrmergeLatln);
            echo "var javascript_array = " . $js_array . ";\n";

            ?>
            /* ---------------  */
            console.log(javascript_array);

            for (i in javascript_array) {
                var data = javascript_array[i];
                var latlng = new google.maps.LatLng(data.lat, data.lng);
                var phongtro = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    title: data.title,
                    icon: "../public/img/gps.png",
                });
                var infowindow = new google.maps.InfoWindow();
                (function (phongtro, data) {
                    var content = '<div id="iw-container">' +
                        '<img height="200px" width="300" src="img/' + data.image + '">' +
                        '<a href="chitiet/' + data.slug + '"><div class="iw-title">' + data.title + '</div></a>' +
                        '<p><i class="fas fa-map-marker" style="color:#003352"></i> ' + data.address +
                        '<br>SĐT: ' + data.phone + '</div>';

                    google.maps.event.addListener(phongtro, "click", function (e) {

                        infowindow.setContent(content);
                        infowindow.open(map, phongtro);
                        // alert(data.title);
                    });
                })(phongtro, data);
            }
        }

        // google.maps.event.addListener(map, 'mousemove', function (e) {
        // 	document.getElementById("flat").innerHTML = e.latLng.lat().toFixed(6);
        // 	document.getElementById("lng").innerHTML = e.latLng.lng().toFixed(6);

        // });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzlVX517mZWArHv4Dt3_JVG0aPmbSE5mE&callback=initMap"
            async defer></script>
@endsection