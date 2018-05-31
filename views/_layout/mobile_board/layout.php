<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<?php if($this->input->is_ajax_request() === false) { ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</head>
<body <?php echo isset($view) ? element('body_script', $view) : ''; ?>>

<div >
<!-- header -->
    <header>
        <h1>
        <!-- 로고 영역 -->
            <a href="<?php echo site_url(); ?>" title="<?php echo html_escape($this->cbconfig->item('site_title'));?>"><?php echo $this->cbconfig->item('site_logo'); ?>
            </a>
        </h1>
        <ul>
            <?php if ($this->member->is_member()) { ?>
                <li><a href="<?php echo site_url('login/logout?url=' . urlencode(current_full_url())); ?>" title="로그아웃">로그아웃</a></li>
                <li><a href="<?php echo site_url('mypage'); ?>" title="My Page">My Page</a></li>
            <?php } else { ?>
                <li><a href="<?php echo site_url('login?url=' . urlencode(current_full_url())); ?>" title="로그인">로그인</a></li>
                <li><a href="<?php echo site_url('register'); ?>" title="회원가입">회원가입</a></li>
            <?php } ?>
        </ul>
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
        

       <!-- 메인메뉴 영역 -->
        <nav id="mainmenu">
        
            <ul>
            <?php
            if(element('board_key', $view)){
                $board_key_arr=explode("_",element('board_key', $view));
                if(count($board_key_arr) > 1) $menu_key=$board_key_arr[0]."_".$board_key_arr[1];
                else $menu_key=element('board_key', $view);
            } else {
                $board_key_arr=explode("_",$this->uri->segment(2));
                if(count($board_key_arr) > 1) $menu_key=$board_key_arr[0]."_".$board_key_arr[1];
                else $menu_key=$this->uri->segment(2);
            }

            if(element('board_key_parent',  $view)){
                $board_key_arr=explode("_",element('board_key_parent',  $view));
                if(count($board_key_arr) > 1) $menu_key=$board_key_arr[0]."_".$board_key_arr[1];
                else $menu_key=element('board_key_parent',  $view);
            }
            

            
            $menuhtml="";
            $menuNum="";
            $i=0;
            if (element('menu', $layout)) {
                $menu = element('menu', $layout);
                if (element(0, $menu)) {
                    foreach (element(0, $menu) as $mkey => $mval) {
                        if(strpos($mval['men_link'],$menu_key) !==false) {
                            $active="active";
                            $menuNum=$i;
                        } else $active="";
                        $mlink = element('men_link', $mval) ? element('men_link', $mval) : 'javascript:;';
                        $menuhtml .= '<li class="'.$active.'"><a href="'.base_url('/main').'?curentContents='.$i.'"'.element('men_custom', $mval);
                        if (element('men_target', $mval)) {
                            $menuhtml .= ' target="' . element('men_target', $mval) . '"';
                        }
                        $menuhtml .= ' title="' . html_escape(element('men_name', $mval)) . '">' . html_escape(element('men_name', $mval)) . '</a></li>';
                        $i++;
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

<?php } else {?>
<?php echo $this->managelayout->display_css(); ?>
<?php echo $this->managelayout->display_js(); ?>
</head>
<body <?php echo isset($view) ? element('body_script', $view) : ''; ?>>
 <!-- main start -->
    <div >
        <!-- 본문 시작 -->
        <?php if (isset($yield))echo $yield; ?>
        <!-- 본문 끝 -->
    </div>
    <!-- main end -->

<?php }?>

<script type="text/javascript">


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

        <?php if(isset($menuNum)){?>
            location.href=$(this).val()+"/main?curentContents=<?php echo $menuNum ?>";
        <?php } else { ?> 
            location.href=$(this).val()+"/main?curentContents="+curnetIndex;
        <?php } ?>
        
    });
    <?php if(isset($menuNum) && $menuNum===5){?>
    var position = $("header nav ul li:nth-child("+(<?php echo $menuNum ?>+1)+")").offset(); // 위치값을 변수로 설정
    $('header nav').animate({scrollLeft : position.left});
    <?php } ?>
    $("header .mainmenu ul li").click(function(){

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

</body>
</html>
