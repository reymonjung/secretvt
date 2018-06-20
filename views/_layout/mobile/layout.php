<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="agd-partner-manual-verification" />
<title><?php echo html_escape(element('page_title', $layout)); ?></title>
<link rel="icon" href="<?php echo base_url('assets/images/temp/favi02.png'); ?>"/> 
<?php if (element('meta_description', $layout)) { ?><meta name="description" content="<?php echo html_escape(element('meta_description', $layout)); ?>"><?php } ?>
<?php if (element('meta_keywords', $layout)) { ?><meta name="keywords" content="<?php echo html_escape(element('meta_keywords', $layout)); ?>"><?php } ?>
<?php if (element('meta_author', $layout)) { ?><meta name="author" content="<?php echo html_escape(element('meta_author', $layout)); ?>"><?php } ?>
<meta property="og:type" content="website">
<meta property="og:title" content="시크릿베트남">
<meta property="og:description" content="베트남 소식 및 업소정보 제공! 예약 및 길찾기 지원">
<meta property="og:image" content="https://secretvt.com/assets/images/temp/logo.png">
<meta property="og:url" content="https://secretvt.com">
<?php if (element('favicon', $layout)) { ?><link rel="shortcut icon" type="image/x-icon" href="<?php echo element('favicon', $layout); ?>" /><?php } ?>
<?php if (element('canonical', $view)) { ?><link rel="canonical" href="<?php echo element('canonical', $view); ?>" /><?php } ?>

<link rel="stylesheet" type="text/css" href="<?php echo element('layout_skin_url', $layout); ?>/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/dialog.css')?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/reset.css?'.$this->cbconfig->item('browser_cache_version'))?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/global.css?'.$this->cbconfig->item('browser_cache_version'))?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/page.css?'.$this->cbconfig->item('browser_cache_version'))?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css?'.$this->cbconfig->item('browser_cache_version'))?>" />
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/earlyaccess/nanumgothic.css" />
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/earlyaccess/jejugothic.css" />

<!-- <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/earlyaccess/nanumgothic.css" /> -->
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<!-- <link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/ui-lightness/jquery-ui.css" /> -->

<?php echo $this->managelayout->display_css(); ?>
<?php
$js_mem_link="";
$js_swipe_contents="";

if (element('menu', $layout)) {
    $menu = element('menu', $layout);
    if (element(0, $menu)) {
        foreach (element(0, $menu) as $mkey => $mval) {
        $js_mem_link[]=element('men_link', $mval);
        $js_swipe_contents[]="contents_".$mkey;
        }
    }
}
?>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript">
// 자바스크립트에서 사용하는 전역변수 선언
var cb_url = "<?php echo trim(site_url(), '/'); ?>";
var cb_cookie_domain = "<?php echo config_item('cookie_domain'); ?>";
var cb_charset = "<?php echo config_item('charset'); ?>";
var cb_time_ymd = "<?php echo cdate('Y-m-d'); ?>";
var cb_time_ymdhis = "<?php echo cdate('Y-m-d H:i:s'); ?>";
var layout_skin_path = "<?php echo element('layout_skin_path', $layout); ?>";
var view_skin_path = "<?php echo element('view_skin_path', $layout); ?>";
var is_member = "<?php echo $this->member->is_member() ? '1' : ''; ?>";
var is_admin = "<?php echo $this->member->is_admin(); ?>";
var cb_admin_url = <?php echo $this->member->is_admin() === 'super' ? 'cb_url + "/' . config_item('uri_segment_admin') . '"' : '""'; ?>;
var cb_board = "<?php echo isset($view) ? element('board_key', $view) : ''; ?>";
var cb_board_url = <?php echo ( isset($view) && element('board_key', $view)) ? 'cb_url + "/' . config_item('uri_segment_board') . '/' . element('board_key', $view) . '"' : '""'; ?>;
var cb_device_type = "<?php echo $this->cbconfig->get_device_type() === 'mobile' ? 'mobile' : 'desktop' ?>";
var cb_csrf_hash = "<?php echo $this->security->get_csrf_hash(); ?>";
var cookie_prefix = "<?php echo config_item('cookie_prefix'); ?>";

var js_mem_link = <?php echo json_encode($js_mem_link)?>;
var js_swipe_contents = <?php echo json_encode($js_swipe_contents)?>;
</script>
<script type="text/javascript" src="<?php echo base_url('assets/js/common.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.extension.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/sideview.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.hoverIntent.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.ba-outside-events.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/iscroll.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/mobile.sidemenu.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/js.cookie.js'); ?>"></script>
<?php echo $this->managelayout->display_js(); ?>

<style>
/* jssor slider thumbnail navigator skin 12 css *//*.jssort12 .p            (normal).jssort12 .p:hover      (normal mouseover).jssort12 .pav          (active).jssort12 .pav:hover    (active mouseover).jssort12 .pdn          (mousedown)*/
.jssort12{  position:absolute; }


#jssor_1{width:100%!important;  margin:0 auto; height:auto; overflow:hidden;   padding-top:0%;}
#jssor_1 > div{width:100%!important; height:100%!important;   position:relative!important;}
#jssor_1 > div > div{width:100%!important; height:100%;}
#jssor_1 > div > div > div{width:100%!important;  height:100%!important; border:0!important; top:0px!important;}
#jssor_1 > div > div > div > div{height:100%!important;}
#jssor_1 > div > div > div:last-child{height:35px!important; top:6px!important;}

.wrap_all {width:100%; max-width: 414px; min-width: 320px; height: 100%;}





</style>
</head>
<body <?php echo isset($view) ? element('body_script', $view) : ''; ?>>

<div>
<!-- header -->
    <header>
        <h1>
        <!-- 로고 영역 -->
            <a href="<?php echo site_url(); ?>" title="<?php echo html_escape($this->cbconfig->item('site_title'));?>"><?php echo $this->cbconfig->item('site_logo'); ?>
            </a>
        </h1>

         <span>
            <label for="select">지역선택하기</label>
            <select id="region">
        <?php
        
        if (config_item('region_category')) {
            foreach (config_item('region_category') as $key => $value) {

                if($key == element('region', $view)) echo '<option value='.site_url().' selected>'.$value.'</option>';
                else echo '<option value='.site_url().'>'.$value.'</option>';
            }
        }
        ?>
            </select>
        </span>
        <ul>
            <?php if ($this->member->is_member()) { ?>
                <li><a href="<?php echo site_url('login/logout?url=' . urlencode(current_full_url())); ?>" title="로그아웃">로그아웃</a></li>
                <li><a href="<?php echo site_url('mypage'); ?>" title="My Page">My Page</a></li>
            <?php } else { ?>
                <li><a href="<?php echo site_url('login?url=' . urlencode(current_full_url())); ?>" title="로그인">로그인</a></li>
                <li><a href="<?php echo site_url('register'); ?>" title="회원가입">회원가입</a></li>
            <?php } ?>
        </ul>
        <!-- 지역선택하기 영역 -->  
       
     
        

       <!-- 메인메뉴 영역 -->
        <nav id="mainmenu">
        
            <ul>
            <?php
            
            

            
            $menuhtml="";
            if (element('menu', $layout)) {
                $menu = element('menu', $layout);
                if (element(0, $menu)) {
                    foreach (element(0, $menu) as $mkey => $mval) {
                        
                        $mlink = element('men_link', $mval) ? element('men_link', $mval) : 'javascript:;';
                        $menuhtml .= '<li class=""><a ' . element('men_custom', $mval);
                        if (element('men_target', $mval)) {
                            $menuhtml .= ' target="' . element('men_target', $mval) . '"';
                        }
                        $menuhtml .= ' title="' . html_escape(element('men_name', $mval)) . '">' . html_escape(element('men_name', $mval)) . '</a></li>';
                        
                    }
                }
            }
           echo $menuhtml;
            ?>
            </ul>
        </nav>
        <!-- 서브메뉴 영역 -->
    </header>




    <!-- main start -->
    <div >
        <!-- 본문 시작 -->
        <?php if (isset($yield))echo $yield; ?>
        <!-- 본문 끝 -->
    </div>
    <!-- main end -->

    <!-- footer start -->
    <?php echo $this->managelayout->display_footer(); ?>
    <!-- footer end -->
</div>
<?php 

//print_r(element('board_list', $view));
 ?>
<div class="menu" id="side_menu">
    <div class="side_wr add_side_wr">
        <div id="isroll_wrap" class="side_inner_rel">
            <div class="side_inner_abs">
                <div class="m_search">
                    <form name="mobile_header_search" id="mobile_header_search" action="<?php echo site_url('search'); ?>" onSubmit="return headerSearch(this);">
                        <input type="text" placeholder="Search" class="input" name="skeyword" accesskey="s" />
                    </form>
                </div>
                <div class="m_login">
                    <?php if ($this->member->is_member()) { ?>
                        <span><a href="<?php echo site_url('login/logout?url=' . urlencode(current_full_url())); ?>" class="btn btn-primary" title="로그아웃"><i class="fa fa-sign-out"></i> 로그아웃</a></span>
                        <span><a href="<?php echo site_url('mypage'); ?>" class="btn btn-primary" title="로그아웃"><i class="fa fa-user"></i> 마이페이지</a></span>
                    <?php } else { ?>
                        <span><a href="<?php echo site_url('login?url=' . urlencode(current_full_url())); ?>" class="btn btn-primary" title="로그인"><i class="fa fa-sign-in"></i> 로그인</a></span>
                        <span><a href="<?php echo site_url('register'); ?>" class="btn btn-primary" title="회원가입"><i class="fa fa-user"></i> 회원가입</a></span>
                    <?php } ?>
                </div>
                <ul class="m_board">
                    <?php if ($this->cbconfig->item('open_currentvisitor')) { ?>
                        <li><a href="<?php echo site_url('currentvisitor'); ?>" title="현재 접속자"><span class="fa fa-link"></span> 현재 접속자</a></li>
                    <?php } ?>
                    <?php if ($this->member->is_member()) { ?>
                        <li><a href="<?php echo site_url('notification'); ?>" title="나의 알림"><span class="fa fa-bell-o"></span>알림 : <?php echo number_format(element('notification_num', $layout) + 0); ?> 개</a></li>
                        <?php if ($this->cbconfig->item('use_note') && $this->member->item('mem_use_note')) { ?>
                            <li><a href="javascript:;" onClick="note_list();" title="나의 쪽지"><span class="fa fa-envelope"></span> 쪽지 : <?php echo number_format($this->member->item('meta_unread_note_num') + 0); ?> 개</a></li>
                        <?php } ?>
                        <?php if ($this->cbconfig->item('use_point')) { ?>
                            <li><a href="<?php echo site_url('mypage/point'); ?>" title="나의 포인트"><span class="fa fa-gift"></span> 포인트 : <?php echo number_format($this->member->item('mem_point') + 0); ?> 점</a></li>
                        <?php } ?>
                    <?php } ?>
                </ul>
                <ul class="m_menu">
                    <?php
                    $menuhtml = '';
                    if (element('menu', $layout)) {
                        $menu = element('menu', $layout);
                        if (element(0, $menu)) {
                            foreach (element(0, $menu) as $mkey => $mval) {
                                if (element(element('men_id', $mval), $menu)) {
                                    $mlink = element('men_link', $mval) ? element('men_link', $mval) : 'javascript:;';
                                    $menuhtml .= '<li class="dropdown">
                                    <a href="' . $mlink . '" ' . element('men_custom', $mval);
                                    if (element('men_target', $mval)) {
                                        $menuhtml .= ' target="' . element('men_target', $mval) . '"';
                                    }
                                    $menuhtml .= ' title="' . html_escape(element('men_name', $mval)) . '">' . html_escape(element('men_name', $mval)) . '</a><a href="#" style="width:25px;float:right;" class="subopen" data-menu-order="' . $mkey . '"><i class="fa fa-chevron-down"></i></a>
                                    <ul class="dropdown-menu drop-downorder-' . $mkey . '">';

                                    foreach (element(element('men_id', $mval), $menu) as $skey => $sval) {
                                        $menuhtml .= '<li><a href="' . element('men_link', $sval) . '" ' . element('men_custom', $sval);
                                        if (element('men_target', $sval)) {
                                            $menuhtml .= ' target="' . element('men_target', $sval) . '"';
                                        }
                                        $menuhtml .= ' title="' . html_escape(element('men_name', $sval)) . '">' . html_escape(element('men_name', $sval)) . '</a></li>';
                                    }
                                    $menuhtml .= '</ul></li>';

                                } else {
                                    $mlink = element('men_link', $mval) ? element('men_link', $mval) : 'javascript:;';
                                    $menuhtml .= '<li><a href="' . $mlink . '" ' . element('men_custom', $mval);
                                    if (element('men_target', $mval)) {
                                        $menuhtml .= ' target="' . element('men_target', $mval) . '"';
                                    }
                                    $menuhtml .= ' title="' . html_escape(element('men_name', $mval)) . '">' . html_escape(element('men_name', $mval)) . '</a></li>';
                                }
                            }
                        }
                    }
                    echo $menuhtml;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).on('click', '.viewpcversion', function(){
    Cookies.set('device_view_type', 'desktop', { expires: 1 });
});
$(document).on('click', '.viewmobileversion', function(){
    Cookies.set('device_view_type', 'mobile', { expires: 1 });
});

$(document).ready(function(){

    //지역선택하기 
    var select = $("#region");
    select.change(function(){
         //var select_name = $(this).children("option:selected").html();
         //$("header h1 span label").html(select_name);
        // $("label").css("color" , "#231b26");


    Cookies.set('region',$(this).children('option:selected').index(), { expires: 1 },cb_cookie_domain);
       // set_cookie("region", '11', 0, cb_cookie_domain);     
//       alert(js_mem_link[curnetIndex]);   
       location.href=$(this).val()+"/main?curentContents="+curnetIndex;
    });

    $("#mainmenu ul li").click(function(){

        if(pageing) pageing=1;
        $('div.c').eq($(this).index()).click();        

      //  setTimeout( "reload_rg('"+js_swipe_contents[$(this).index()]+"')", 500);
    });

    if($("#region option:selected").text()){
        $("#region").siblings("label").text($("#region option:selected").text());
        $("#region").siblings("label").css("color" , "#231b26");
    }
    // // 메인메뉴 의 높이가 자동 설정
    // var hei = $('.wrap > header .mainmenu ul').height() - 2;

    // $('.wrap > header .mainmenu ul ').css('height' , hei);

    //선택된 메인메뉴 설정 

  //  $('.wrap > header .mainmenu div').css('left' , '11.5%');

//     //로딩후 서브메뉴의 선택 설정 
//     $('.submenu li:nth-child(1)').css('background-color' , '#efd0de');

// //서브메뉴 클릭시 색상 변경
//     $('.submenu li').click(function(){
//         $('.submenu li').css('background-color' , '#fff');
//         $(this).css('background-color' , '#efd0de');
//     });

});
</script>
<?php echo element('popup', $layout); ?>
<?php echo $this->cbconfig->item('footer_script'); ?>

<!--
Layout Directory : <?php echo element('layout_skin_path', $layout); ?>,
Layout URL : <?php echo element('layout_skin_url', $layout); ?>,
Skin Directory : <?php echo element('view_skin_path', $layout); ?>,
Skin URL : <?php echo element('view_skin_url', $layout); ?>,
-->

</body>
</html>
