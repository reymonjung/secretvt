<?php $this->managelayout->add_js(base_url('assets/js/bxslider/jquery.bxslider.min.js')); ?>
<?php $this->managelayout->add_js(base_url('assets/js/bxslider/plugins/jquery.fitvids.js')); ?>
<script type="text/javascript">
        $(document).ready(function () {
            $('.slide ul').bxSlider({
                //work method
                mode: 'horizontal', // 'horizontal' : 좌,우 'vertical' : 상,하 'fade' : fade in, out
                speed: 1000, // m/s ex > 1000 = 1s
                easing: 'ease-in-out', // 동작 가속도 css와 동일
                slideMargin:0, // img와 img 사이 간격
                startSlide: 0, // 시작시 로드될 이미지 (0부터시작)
                preloadImages: 'visible', // "visible"은 보여질때 이미지를 로드, "all"로 설정하면 이미지가 모드 로드되야 작동.
                randomStart: false, //시작시 랜덤으로 이미지 로드 여부 (boolean)
                adaptiveHeight:true, //각 이미지의 높이에 따라 슬라이더 높이의 유동적 조절 여부
                adaptiveHeightSpeed: 300, //adaptiveHeight 동작속도
                video: true,//slide에 video 사용여부, 사용할 시에 plugins/jquery.fitvids.js include 필요
                captions:false, // img 태그에 title 속성값을 사용할시, 그부분의 출력여부 단, css .bx-wrapper .bx-caption 부분 조절 필요

                //responsive method
                responsive: true,//반응형 지원 여부

                touchEnabled: true,//터치스와이프 기능 사용여부
                swipeThreshold: 50,//터치하여 스와이프 할때 변환 효과에 소모되는 시간 설정
                oneToOneTouch: true, // fade 효과가 아닌 슬라이드는 손가락의 접지상태에 따라 슬라이드를 움직일수있다.
                preventDefaultSwipeX: true, // onoToOneTouch 에서 true일 경우, 손가락을따라 x축으로 움직일지에 대한 여부
                preventDefaultSwipeY:false , // onoToOneTouch 에서 true일 경우, 손가락을따라 y축으로 움직일지에 대한 여부

                //control method
                controls: true, // 좌,우 컨트롤 버튼 출력 여부

                auto: true, // 자동 재생 활성화
                autoControls:false, //자동재생 제어버튼 활성화  단, auto 모드가 활성화 되어있어야함.

                autoControlsCombine:false, // 재생시 중지버튼 활성화, 중지시 재생버튼 활성화
                pause:4000, // 자동 재생 시 각 슬라이드 별 노출 시간
                autoStart: true, // 페이지 로드가 되면, 슬라이드의 자동시작 여부
                autoDirection: 'next', // 자동 재생 시에 정순, 역순(prev) 방식 설정
                autoHover: true, // 슬라이드 오버시 재생 중단 여부 (false: 오버무시) 
                autoDelay:0, // 자동 재생 전 대기 시간 설정
                hideControlOnEnd: false, //첫번째 슬라이드 일경우 이전 버튼 삭제, 마지막 슬라이드 일 경우 다음 버튼 삭제 단, infiniteLoop: false 일 경우만 사용 가능.
                infiniteLoop: true,//마지막에 도달 했을시, 첫페이지로 갈 것인가 멈출것인가

                onSliderLoad: function(){
                    $('section.slide').css('visibility','visible');
                }
            });              
        });
</script>

<div class="wrap06">
        <section class="slide" style="visibility: hidden;">
            <ul >
                <?php echo banner('index_bxslider','order',3,0,'<li>','</li>'); ?>
        </section>

        <section class="ad" style="margin-bottom:4%;">
            <h4>
                ad01
            </h4>
            <a href="<?php echo base_url('write/vtn_discount') ?>">
                <img src="<?php echo base_url('assets/images/temp/middle_btn.png') ?>">
            </a>
        </section>

        <section class="main_list">
            <h4>main_list</h4>
            <ul>
                <li>
                    <a href="<?php echo site_url('main').'?curentContents=0' ?>">
                        <figure>
                            <img src="<?php echo base_url('assets/images/temp/main_menu/menu_01.png'); ?>" alt="main_01">
                            <figcaption>
                                <h2>가라오케</h2>
                                <p>맛좋은 술과 노래를 즐길 수 있는 곳</p>
                            </figcaption>
                        </figure>
                    </a>
                </li>

                <li>
                    <a href="<?php echo site_url('main').'?curentContents=1' ?>">
                        <figure>
                            <img src="<?php echo base_url('assets/images/temp/main_menu/menu_02.png'); ?>" alt="main_02">
                            <figcaption>
                                <h2>클 럽</h2>
                                <p>베트남 여성들과 다양하고 즐거운 만남</p>
                            </figcaption>
                        </figure>
                    </a>
                </li>

                <li>
                    <a href="<?php echo site_url('main').'?curentContents=2' ?>">
                        <figure>
                            <img src="<?php echo base_url('assets/images/temp/main_menu/menu_03.png'); ?>" alt="main_03">
                            <figcaption>
                                <h2>마사지&이발소</h2>
                                <p>내 몸 관리와 함께 특별한 서비스</p>
                            </figcaption>
                        </figure>
                    </a>
                </li>

                <li>
                    <a href="<?php echo site_url('main').'?curentContents=3' ?>">
                        <figure>
                            <img src="<?php echo base_url('assets/images/temp/main_menu/menu_04.png'); ?>" alt="main_04">
                            <figcaption>
                                <h2>호 텔</h2>
                                <p>체계적인 서비스와 깜끔한 시설 관리</p>
                            </figcaption>
                        </figure>
                    </a>
                </li>

                <li>
                    <a href="<?php echo site_url('main').'?curentContents=4' ?>">
                        <figure>
                            <img src="<?php echo base_url('assets/images/temp/main_menu/menu_05.png'); ?>" alt="main_05">
                            <figcaption>
                                <h2>골 프</h2>
                                <p>높은 퀄리티와 서비스,<br>넓은 페어웨이 </p>
                            </figcaption>
                        </figure>
                    </a>
                </li>

                <li>
                    <a href="<?php echo site_url('main').'?curentContents=5' ?>">
                        <figure>
                            <img src="<?php echo base_url('assets/images/temp/main_menu/menu_06.png'); ?>" alt="main_06">
                            <figcaption>
                                <h2>맛 집</h2>
                                <p>베트남 로컬 맛집 부터<br> 퓨전 맛집까지</p>
                            </figcaption>
                        </figure>
                    </a>
                </li>

                <li>
                    <a href="<?php echo site_url('main').'?curentContents=6' ?>">
                        <figure>
                            <img src="<?php echo base_url('assets/images/temp/main_menu/menu_07.png'); ?>" alt="main_07">
                            <figcaption>
                                <h2>여행정보</h2>
                                <p>여행기사부터 코스정보<br>까지 한곳에</p>
                            </figcaption>
                        </figure>
                    </a>
                </li>

                <li>
                    <a href="<?php echo site_url('main').'?curentContents=7' ?>">
                        <figure>
                            <img src="<?php echo base_url('assets/images/temp/main_menu/menu_08.png'); ?>" alt="main_0">
                            <figcaption>
                                <h2>베남 정보</h2>
                                <p>다양한 정보를 현지에서<br> 전달</p>
                            </figcaption>
                        </figure>
                    </a>
                </li>

                <li>
                    <a href="<?php echo site_url('board/vtn_free')?>">
                        <figure>
                            <img src="<?php echo base_url('assets/images/temp/main_menu/menu_09.png'); ?>" alt="main_0">
                            <figcaption>
                                <h2>자유 게시판</h2>
                                <p>베트남의 경험담을<br> 자유롭게 작성</p>
                            </figcaption>
                        </figure>
                    </a>
                </li>


            </ul>
        </section>

    <!-- main 하단 배너 영역 -->
        <section class="secret_bn">
            <a href="<?php echo base_url('write/vtn_tour') ?>">
                <h4>ad02</h4>
                <figure>
                    <img src="<?php echo base_url('assets/images/temp/main_bot/bottom_bn01.png') ?>" alt="bottom_vtn_tour">
                    <figcaption style="right: 8%;">
                        <h2>시크릿 투어</h2>
                     
                        <p>
                            호텔예약,골프부킹 가이드 요청<br>
                            예약서비스 입니다.
                        </p>
                     
                         <button>
                             바 로 가 기
                         </button>
                    </figcaption>
                </figure>
            </a>
        </section>

        <!-- <section class="secret_bn">
            <a href="<?php echo base_url('write/vtn_safevisa') ?>">
                <h4>ad02</h4>
                <figure>
                    <img src="<?php echo base_url('assets/images/temp/main_bot/bottom_bn03.png') ?>" alt="bottom_vtn_safevisa">
                    <figcaption style="right: 8%; text-align: right;">
                        <h2>시크릿 안전비자</h2>
                     
                        <p>
                            관광단수 및 복수,DN 비즈니스<br>
                            거주증 및 문제비자 문의
                        </p>
                     
                         <button >
                             바 로 가 기
                         </button>
                    </figcaption>
                </figure>
            </a>
        </section>

        <section class="secret_bn" style="margin-bottom:4%;">
            <a href="<?php echo base_url('write/vtn_renta') ?>">
                    <h4>ad02</h4>
                    <figure>
                        <img src="<?php echo base_url('assets/images/temp/main_bot/bottom_bn02.png') ?>" alt="bottom_vtn_renta">
                        <figcaption style="left: 8%;">
                            <h2>시크릿 렌트카</h2>
                         
                            <p>
                                7인,16인,25인,45인 리무진 <br>
                                차량요청 서비스
                            </p>
                         
                             <button>
                                 바 로 가 기
                             </button>
                        </figcaption>
                    </figure>
            </a>
        </section> -->

    <?php 
    if(element('noti_title',element('0',element('notice_result', $view))) || element('eve_title',element('0',element('event_result', $view)))){
    ?>
    <!-- notice & event 영역 -->
        <section class="notice">
            <ul>
                <?php 
                if(element('noti_title',element('0',element('notice_result', $view)))){
                ?>
                
                <li style="border-bottom:1px solid #ededed;">
                    <a href="<?php echo element('notice_url', $view) ?>">
                        <h3>공지사항</h3>
                        <p>시크릿베트남에서 알려드립니다.
                        <?php 
                        if(element('is_new',element('notice', $view))){
                        ?>
                            <img src="<?php echo base_url('/assets/images/temp/new.png')?>" style="width:13px;vertical-align: middle;">
                        <?php }?>
                        </p>
                    </a>
                </li>
                <?php }?>
                <?php 
                if(element('eve_title',element('0',element('event_result', $view)))){
                ?>
                <li>
                    <a href="<?php echo element('event_url', $view) ?>">
                        <h3>이벤트</h3>
                        <p>시크릿베트남의 다양한 이벤트를 만나보세요.
                        <?php 
                        if(element('is_new',element('event', $view))){
                        ?>
                            <img src="<?php echo base_url('/assets/images/temp/new.png')?>" style="width:13px;vertical-align: middle;">
                        <?php }?>
                        </p>
                    </a>
                </li>
                <?php }?>
            </ul>
        </section>
    <?php }?>
    
</div>