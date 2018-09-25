	@section('title','Danh sách đất')
	@extends('layout.master_ban')
	@section('content')
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner">

			<div class="item active">
				<img src="{{asset('img/banner-2.jpg')}}" alt="Los Angeles" style="width:100%;">
				<div class="carousel-caption">
				</div>
			</div>

			<div class="item">
				<img src="{{asset('img/banner-3.jpg')}}" alt="Chicago" style="width:100%;">
				<div class="carousel-caption">
				</div>
			</div>
		</div>
	</div>
	<div class="inside-banner">
		<div class="container"> 
			<h2>Danh sách các lô đất</h2>
		</div>
	</div>
	<div class="container">
		<div class="properties-listing spacer">
			<div class="row">
				<div class="col-lg-12">
				<div id="map" style="width: auto; height: 800px;margin-bottom: 20px;padding-left: 30px;border: 1px solid black;"></div>
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
		foreach ($phong as $room) {
			$arrlatlng = explode(';', $room->Map);
			$slug = $room->id;
			//$arrlatlng = json_decode($room->Map,true);
			$arrImg = explode(';', $room->HinhAnh);
			$arrmergeLatln[] = ["slug" => $slug,"lat"=> $arrlatlng[0],"lng"=> $arrlatlng[1],"title"=>$room->TieuDe,"address"=> $room->DiaChi,"image"=>$arrImg[0],"phone"=>$room->DienThoaiLienLac,"owner"=>$room->TenLienHe];

		}

		$js_array = json_encode($arrmergeLatln);
		echo "var javascript_array = ". $js_array . ";\n";

		?>
		/* ---------------  */
		console.log(javascript_array);

		for (i in javascript_array){
			var data = javascript_array[i];
			var latlng =  new google.maps.LatLng(data.lat,data.lng);
			var phongtro = new google.maps.Marker({
				position:  latlng,
				map: map,
				title: data.title,
				icon: "../public/img/gps.png",
			});
			var infowindow = new google.maps.InfoWindow();
			(function(phongtro, data){
				var content = '<div id="iw-container">' +
				'<img height="200px" width="300" src="img/ThuePhong/'+data.image+'">'+
				'<a href="chitietphong/'+data.slug+'"><div class="iw-title">' + data.title +'</div></a>' +
				'<p><i class="fas fa-map-marker" style="color:#003352"></i> '+ data.address +'<br>Tên liên lạc: '+ data.owner +'<br>' +
				'SĐT: ' +data.phone +'</div>';

				google.maps.event.addListener(phongtro, "click", function(e){

					infowindow.setContent(content);
					infowindow.open(map, phongtro);
                  // alert(data.title);
              });
			})(phongtro,data);
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