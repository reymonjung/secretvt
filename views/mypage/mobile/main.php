<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

</head>
<div class="wrap mypage">
    <section class="title02">
        <h2>내 정보</h2>
        <p><span>내 정보</span>를 확인 하실 수 있습니다.</p>
    </section>
    
    <section class="myinfo">
        <figure class="info_area">
            <img src="<?php echo base_url('assets/images/temp/info_img/info_user.png') ?>" alt="user">
            <figcaption>
                <h2>
                    <?php echo html_escape($this->member->item('mem_userid')); ?>
                </h2>
                <p><strong>"<?php echo html_escape($this->member->item('mem_nickname')); ?>" </strong>님 안녕하세요</p>
            </figcaption>
        </figure>

        <div class="info_level">
            <img src="<?php echo base_url('assets/images/temp/level.png') ?>" alt="user">
            <p>하사 <?php //echo html_escape($this->member->item('mem_level')); ?></p>
        </div>

        <button id="opener">
                등급혜택 보기 
        </button>

        <div id="dialog"  style="display:none">
            <img src="<?php echo base_url('assets/images/temp/info_img/info_dia.png') ?>" alt="benefit" style="width:100%" >
        </div>
    </section>


    <section class="info_table">
        <table>
            <tr>
                <td class="active">
                    <a href="<?php echo site_url('mypage'); ?>">내 정보</a>
                </td>
                <td>
                    <a href="<?php echo site_url('mypage/post'); ?>">작성글</a>
                </td>
                <td>
                    <a href="<?php echo site_url('membermodify'); ?>">정보수정</a>
                </td>
                <td>
                   <a href="<?php echo site_url('membermodify/memberleave'); ?>">탈퇴하기</a>
                </td>
            </tr>
        </table>
    </section>
    
    <section class="table_01">
        <ul>
            <li><strong>이메일</strong> <p><?php echo html_escape($this->member->item('mem_email')); ?></p></li>
            <li><strong>닉 네 임 </strong> <p><?php echo html_escape($this->member->item('mem_nickname')); ?></p></li>
            <li><strong>가 입 일</strong> <p><?php echo display_datetime($this->member->item('mem_register_datetime'), 'full'); ?></p></li>
            <li><strong>최근 로그인</strong> <p><?php echo display_datetime($this->member->item('mem_lastlogin_datetime'), 'full'); ?></p></li>
        </ul>
    </section>

    <section class="ad" style="margin-bottom:0;">
        <h4>ad</h4>
        <?php echo banner("mypage_banner_1") ?>
    </section>

</div>
<script type="text/javascript">

$( "#dialog" ).dialog({
  autoOpen: false,
  modal : true,
  
  show: {
    effect: "fade",
    duration: 200
  },
  hide: {
    effect: "fade",
    duration: 300
  },
  open: function() { jQuery('div.ui-widget-overlay').bind('click', function() { jQuery('#dialog').dialog('close'); }) }
});

$( "#opener" ).on( "click", function() {
  $( "#dialog" ).dialog( "open" );
});
$( "#dialog" ).on( "click", function() {
  $( "#dialog" ).dialog( "close" );
});

</script>


