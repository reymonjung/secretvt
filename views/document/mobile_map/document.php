<?php    $this->managelayout->add_js('https://maps.google.com/maps/api/js?v=3.3&key=AIzaSyC5C3WnSgg9h4otykkgKNuBI49zUsOBe9U&language=ko'); 

$menuName="";

$board_key_arr=explode("_",element('board_key', $view));
if(count($board_key_arr) > 1) $menu_key=$board_key_arr[0]."_".$board_key_arr[1];
else $menu_key=element('board_key', $view);
$i=0;
$curentContents="";
if (element('menu', $layout)) {
                $menu = element('menu', $layout);
                if (element(0, $menu)) {
                    foreach (element(0, $menu) as $mkey => $mval) {
                        if(strpos($mval['men_link'],$menu_key) !==false) {
                            $menuName=html_escape(element('men_name', $mval));
                            $curentContents=$i;
                        }
                        $i++;
                    }
                }
            }


$vtn_marker=array();
foreach(element('list',element('all_extravars', $view)) as $key => $value){
  $vtn_marker_geo = element('google_map',element('extravars', $value));
  $vtn_marker_geo_arr = explode(',', $vtn_marker_geo);
  if(!empty($vtn_marker_geo_arr[0]) && !empty($vtn_marker_geo_arr[1])){
    $vtn_marker[]=array($value['post_title'],$vtn_marker_geo_arr[0],$vtn_marker_geo_arr[1],$key);  
  }
} 


//설정값

$tel1=element('tel1',element('extravars', $view));
$geo = element('google_map',element('extravars', $view));

$geo_arr = explode(',', $geo);
$lat = !empty($geo_arr[0]) ? $geo_arr[0] : '37.566535';
$lng = !empty($geo_arr[1]) ? $geo_arr[1] : '126.977969';
$zoom = !empty($geo_arr[2]) ? $geo_arr[2] : 14;
?>
<style>
#directionsPanel{
  margin-bottom: 3% !important;
  padding: 0 3%;
  box-sizing: border-box;
}

.adp{
  font-family: 'Jeju Gothic', sans-serif;
  font-size: 11px;
  line-height: 14px;
}

.adp-warnbox{
  margin: 0;
  margin-bottom:3%;
}

.warnbox-c2,.warnbox-c1{
  margin: 0;
  background-color: transparent;
  height: 0;
}

.warnbox-content{
    margin: 0;
    background-color: transparent;
    padding: 0;
}

.adp table{
  margin: 0;
}

.adp-placemark{
  margin: 0;
  margin-bottom:3%;
  border:0;
  background-color: transparent;
  font-family:  'Jeju Gothic', sans-serif;
}

img.adp-marker{
  width: 15px;
  height: 25px;
  margin-right: 5px;
}

 .adp-text{
  vertical-align: middle;
  font-family: 'Jeju Gothic', sans-serif;
  font-size: 13px;
 }

 .adp-summary{ 
  border-bottom:1px solid #ededed;
  text-align:right;
  padding:0;
  padding-right: 2%;
  padding-bottom: 0.5%; 
 }

  .adp-summary span{
    font-size: 13px;
  }

  .adp-summary span:last-child{
    color:#c20e58;
  }

  .adp > div:nth-child(3) > div:nth-child(2){
    padding:1.5% 0;
    padding-left: 5%;
    border-bottom: 1px solid #ededed;
  }

  .adp table{
    width: 100%;
  }

  .adp-substep{
    padding: 0;
    border-top:0;
  }

  .adp-substep img{
    width: 20px;
    height: 20px;
    top: 0;
    margin-right: 3px;
  }

  .adp-substep > div > span{
    margin-left: 0 !important;
    font-size: 13px;
    font-family: 'Jeju Gothic', sans-serif;
    font-weight: normal;
  }

  .adp-details{
    color:#c20e58;
    padding-right: 2%;
    text-align: right;
  }

  .adp-details > span{
    font-weight: bold !important;
  }

  .adp-details > span > span{
    font-size: 13px;
  }

  .adp > div:nth-child(3){
    margin-bottom:3%;
  }

  .adp > div:nth-child(3) > div:nth-child(3){
    padding: 1.5% 0;
    border-bottom:1px solid #ededed;
  }

   .adp-legal {
    text-align:right;
    padding-right: 2%;
    font-size: 10px;
   }








</style>
<div class="wrap">

  <!-- title 영역 -->
    <section class="title">
      <h4>
        title
      </h4>
      <h2 class="bottom_02">[<?php echo "업소정보";//$menuName ?>] <?php echo element('post_title', element('post',$view)) ?></h2>
        <table>
            <tr>
                <td style="width:25%;">
                    <a href="<?php echo element('post_url', $view); ?>">
                        <img src="<?php echo base_url('assets/images/temp/submenu12.png')?>" alt="sub01"> 
                        업소정보
                    </a>
                </td>
                <td style="width:25%;" class="active">
                    <a href="<?php echo base_url('document/map/'.element('post_id', element('post', $view))); ?>">
                        <img src="<?php echo base_url('assets/images/temp/submenu10.png')?>" alt="sub02">
                        위치확인
                    </a>
                </td>
                <td style="width:25%;">
                    <a href="<?php echo base_url('/board/vtn_review?post_parent='.element('post_id', element('post', $view)))?>">
                        <img src="<?php echo base_url('assets/images/temp/submenu13.png')?>" alt="sub03">
                        업소후기
                    </a>
                </td>
                <td style="width:25%;">
                   <a href="tel:<?php echo $tel1 ?>">
                        <img src="<?php echo base_url('assets/images/temp/submenu11.png')?>" alt="sub04">
                        전화걸기
                    </a>
                </td>
            </tr>
        </table>
    </section>
  <!-- ===== -->

  <!-- 이미지 영역 -->
    <section class="store">
      <table>
        <tr>
          <td class="border" >
            <span id="formatedAddress" ></span></td>
            <!-- <input type="text" value="내위치 · 하노이시 하노이동"> 
            <img src="<?php echo base_url('assets/images/temp/clear.png')?>" alt="X"> -->
          </td>
          
        </tr>
        <tr>
          <td class='text-center'><span id="directionsAddress"></span></td>
        </tr>
      </table>
    </section>
  <!-- ===== -->

  <!--method  영역 -->
    <section class="method">
      <h4>찾아가는 방법</h4>
      <table>
        <tr>
          <td >
            <figure>
              <img src="<?php echo base_url('assets/images/temp/traffic02.png')?>" alt="traffic02">
              <figcaption>
                대중교통
              </figcaption>
            </figure>
          </td>

          <td class="active">
            <figure>
              <img src="<?php echo base_url('assets/images/temp/google_map.png')?>" alt="google_map">
              <figcaption>
                지 도
              </figcaption>
            </figure>
          </td>
        </tr>
        </table>
    </section>

  <!-- ===== -->
 
  

</div>

<div class="map">

        
        <div id="map-canvas" style="width: 100%; height: 300px;margin-bottom:3%"></div>
        <div id="directionsPanel" style="width: 100%; height: 100%;margin-bottom:10px;display:none"></div>
</div>
<?php if (!get_cookie('popup_layer_gps')) { ?>
<div id="dialog"  style="display:none">
  <img src="<?php echo base_url('assets/images/temp/gps.png') ?>" alt="benefit" style="width:100%;display:block" >

  <div class="popup_layer_footer" >
    <div style="width:70%;" class="popup_layer_reject pull-left text-center" data-wrapper-id="popup_layer_gps">다시보지않기
    </div>
    <div style="width:30%" class="popup_layer_close pull-right text-center" >닫기
    </div>
  </div>
</div>
<?php } ?>
<div id="dialog2"  style="display:none">
  <img src="<?php echo base_url('assets/images/temp/gps.png') ?>" alt="benefit" style="width:100%;display:block" >

  <div class="popup_layer_footer" >
    <div style="width:100%" class="popup_layer_close pull-right text-center" >닫기</div>
  </div>
</div>
 <!-- 광고 배너 영역 -->
  <section class="ad">
      <h4>ad</h4>
      <?php echo banner("google_map_banner_1") ?>
  </section>
  <!-- ===== -->
<script type="text/javascript">
var map;
var geocoder;
var centerChangedLast;
var reverseGeocodedLast;
var currentReverseGeocodeResponse;
var mapstart
var directionsDisplay= new google.maps.DirectionsRenderer();
var directionsService = new google.maps.DirectionsService();
var vtn_marker = <?php echo json_encode($vtn_marker)?>;
var lat = '<?php echo $lat ?>';
var lng= '<?php echo $lng ?>';
// var lat = '37.558166';
// var lng= '126.928016';
var size_x = 30; // 마커로 사용할 이미지의 가로 크기
var size_y = 30; // 마커로 사용할 이미지의 세로 크기  
var geolocation_flag=false;
var travelMode=google.maps.TravelMode.TRANSIT;
var destination_;
 
      function navilocation()
      {
        if (navigator.geolocation){
          navigator.geolocation.getCurrentPosition(showPosition,showError);
        }  else{
          alert("Geolocation is not supported by this browser.");
        }
      }


      function initialize(lat,lng)
      {
       
        console.log(lat+"//"+lng);
        
        mapstart = new google.maps.LatLng(lat,lng);// 지도에서 가운데로 위치할 위도와 경도
        
         
        var mapOptions = {
          center: mapstart, // 지도에서 가운데로 위치할 위도와 경도(변수)
          zoom: 14, // 지도 zoom단계
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map-canvas"), // id: map-canvas, body에 있는 div태그의 id와 같아야 함
            mapOptions);
        geocoder = new google.maps.Geocoder();
        






          for(var i=0; i < vtn_marker.length; i++){
            
            


            // if(i == 0) {
            //   var image = new google.maps.MarkerImage( 'http://www.clker.com/cliparts/B/B/1/E/y/r/marker-pin-google.svg',new google.maps.Size(size_x, size_y),null,null,new google.maps.Size(size_x, size_y));
            // }

            var compa = vtn_marker[i];

            var image = new google.maps.MarkerImage( 'https://d30y9cdsu7xlg0.cloudfront.net/png/462-200.png',new google.maps.Size(size_x, size_y),null,null,new google.maps.Size(size_x, size_y));

            if(compa[0]==='내 위치'){
              var image = new google.maps.MarkerImage( 'https://www.clker.com/cliparts/B/B/1/E/y/r/marker-pin-google.svg',new google.maps.Size(size_x, size_y),null,null,new google.maps.Size(size_x, size_y));
            }
            
            var bounds = new google.maps.LatLngBounds();
            var myLatLng = new google.maps.LatLng(compa[1], compa[2]);

            var marker = new google.maps.Marker({
              position: myLatLng,
              map: map,
              icon : image,
              title : compa[0],
              content : compa[0],
              zIndex : compa[3]
            });

            var infowindow = new google.maps.InfoWindow({disableAutoPan:true});
            infowindow.setContent(marker.content);
            
            
                    infowindow.open(map, marker);

            google.maps.event.addListener(marker, 'click', (function (marker, i, infowindow) {
                return function () {
                    // infowindow.setContent(this.content);
                    // infowindow.open(map, this);
                    onClickDistance(marker.position);

                    if(marker.title !=='내 위치'){
                      document.getElementById('directionsAddress').innerHTML = '';
                      document.getElementById('directionsAddress').innerHTML = marker.title +' : ';
                      geocoder.geocode({latLng:marker.position},directionsGeocodeResult);

                    }
                };
            })(marker, i, infowindow));
            // bounds.extend(marker.position);

              //google.maps.event.trigger(marker, 'click');
            // 마커를 클릭했을 때의 이벤트. 말풍선 뿅~
            
            
            


            //     google.maps.event.addListener(marker, "click", function() {
                  
            //       infowindow.setContent(marker.title);
            //       infowindow.open(map, marker);
            //    // onClickDistance(marker.position);
            // });
          } 
            directionsDisplay.setMap(map);
            directionsDisplay.setPanel(document.getElementById("directionsPanel"));
           // if(geolocation_flag) onClickDistance(new google.maps.LatLng('<?php echo $lat ?>','<?php echo $lng ?>'));

        //마커로 사용할 이미지 주소
        // var image = new google.maps.MarkerImage( 'http://www.larva.re.kr/home/img/boximage3.png',
        //                     new google.maps.Size(si[ze_x, size_y),
        //                     '',
        //                     '',
        //                     new google.maps.Size(size_x, size_y));
         
//         var marker;
//         marker = new google.maps.Marker({
//                position: markLocation, // 마커가 위치할 위도와 경도(변수)
//                map: map,
//                icon: image, // 마커로 사용할 이미지(변수)
// //             info: '말풍선 안에 들어갈 내용',
//                title: '<?php echo element('post_title', element('post',$view)) ?>' // 마커에 마우스 포인트를 갖다댔을 때 뜨는 타이틀
//         });
         
        

        
        
        centerChanged();
      }

      function centerChanged()
      { 
        geocoder.geocode({latLng:new google.maps.LatLng(lat,lng)},reverseGeocodeResult);
        document.getElementById('formatedAddress').innerHTML = '';
        currentReverseGeocodeResponse = null;
      }

      function reverseGeocodeResult(results, status) 
      {
          currentReverseGeocodeResponse = results;
          if (status === 'OK') {
              if (results.length === 0) {
                  document.getElementById('formatedAddress').innerHTML = 'None';
              } else {
                  document.getElementById('formatedAddress').innerHTML = '내 위치 : '+ results[0].formatted_address;
              }
          } else {
              document.getElementById('formatedAddress').innerHTML = 'Error';
          }
      }

      function directionsGeocodeResult(results, status) 
      { 
          
          if (status === 'OK') {
              if (results.length === 0) {
                  document.getElementById('directionsAddress').innerHTML += 'None';
              } else {
                  document.getElementById('directionsAddress').innerHTML += results[0].formatted_address;
              }
          } else {
              document.getElementById('directionsAddress').innerHTML += 'Error';
          }
      }

      function onClickDistance(destination) {
        destination_=destination;
        var request = {
          origin:mapstart,
          destination:destination_,
          travelMode: travelMode
        };
        directionsService.route(request, function(response, status) {
          if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
          } else {
            $('#directionsPanel').html('');
            window.alert('해당 주소는 길찾기 서비스가 제공되지 않습니다.');
          }
        });
      }

      google.maps.event.addDomListener(window, 'load', navilocation);


  function showError(error)
  {
    var text;
    switch(error.code) 
    {
      case error.PERMISSION_DENIED:
      text="User denied the request for Geolocation."//사용자가 위치정보에 대한 요청을 거부했을 때.
      break;
      case error.POSITION_UNAVAILABLE:
      text="Location information is unavailable." //위치정보 사용이 불가능할 때(주로 PC에서 볼 때)
      break;
      case error.TIMEOUT:
      text="The request to get user location timed out." //시간초과
      break;
      case error.UNKNOWN_ERROR:
      text="An unknown error occurred." //알 수 없는 에러
      break;
    }
    console.log(text);
    geolocation_flag=false;
    vtn_marker.push(['내 위치',lat,lng]);
    initialize(lat,lng);

    document.getElementById('directionsAddress').innerHTML = '';
    document.getElementById('directionsAddress').innerHTML = '<?php echo element('post_title', element('post',$view)) ?> : ';
    geocoder.geocode({latLng:new google.maps.LatLng('<?php echo $lat?>','<?php echo $lng?>')},directionsGeocodeResult);
    $( "#dialog" ).dialog( "open" );
  }

  function showPosition(position)
  {
    lat=position.coords.latitude
    lng=position.coords.longitude; //좌표를 "위도,경도" 형태로 만들어


    geolocation_flag=true;
    vtn_marker.push(['내 위치',lat,lng]);
    initialize(lat,lng);
    onClickDistance(new google.maps.LatLng('<?php echo $lat?>','<?php echo $lng?>'));
    document.getElementById('directionsAddress').innerHTML = '';
    document.getElementById('directionsAddress').innerHTML = '<?php echo element('post_title', element('post',$view)) ?> : ';
    geocoder.geocode({latLng:new google.maps.LatLng('<?php echo $lat?>','<?php echo $lng?>')},directionsGeocodeResult);
  }

  

$('.method table tr td:nth-child(1)').click(function(){

  // travelMode=google.maps.TravelMode.TRANSIT;
  // if(destination_)  onClickDistance(destination_);
  $('.method table tr td').removeClass('active');
  $(this).addClass('active');
  $('#map-canvas').hide();
  $('#directionsPanel').fadeIn();
  if(!geolocation_flag) $( "#dialog2" ).dialog( "open" );
});

$('.method table tr td:nth-child(2)').click(function(){

  // travelMode=google.maps.TravelMode.DRIVING;
  // if(destination_)  onClickDistance(destination_);
  $('.method table tr td').removeClass('active');
  $(this).addClass('active');
  $('#directionsPanel').hide();
  $('#map-canvas').fadeIn();    
      
});



$( "#dialog" ).dialog({
  autoOpen: false,
  modal : true,
  
  
  hide: {
    effect: "fade",
    duration: 300
  },
  open: function() { jQuery('div.ui-widget-overlay').bind('click', function() { jQuery('#dialog').dialog('close'); }) }
});

$( "#dialog2" ).dialog({
  autoOpen: false,
  modal : true,
  
  
  hide: {
    effect: "fade",
    duration: 300
  },
  open: function() { jQuery('div.ui-widget-overlay').bind('click', function() { jQuery('#dialog2').dialog('close'); }) }
});


$(document).on('click', '.popup_layer_reject', function() {
        var cookie_name = $(this).attr('data-wrapper-id');
        var cookie_expire = 100000;
        $( "#dialog" ).dialog( "close" );
        set_cookie(cookie_name, 1, cookie_expire, cb_cookie_domain);
    });
  

$( ".popup_layer_close" ).on( "click", function() {
  $( "#dialog" ).dialog( "close" );
});

$( "#dialog2" ).on( "click", function() {
  $( "#dialog2" ).dialog( "close" );
});
</script>