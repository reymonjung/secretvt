<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<div class="wrap mypage">
    <section class="title">
        <table>
            <tr>
                <td style="width:25%;" >
                    <a href="<?php echo site_url('mypage'); ?>">내 정보</a>
                </td>
                <td style="width:25%;">
                    <a href="<?php echo site_url('mypage/post'); ?>">나의 작성글</a>
                </td>
                <td style="width:25%;" >
                    <a href="<?php echo site_url('membermodify'); ?>" >정보수정</a>
                </td>
                <td style="width:25%;" class="active">
                   <a href="<?php echo site_url('membermodify/memberleave'); ?>">탈퇴하기</a>
                </td>
            </tr>
        </table>
    </section>
    
    <section class="title02">
        <h2>관리자 회원</h2>
    </section>
    
     <section class="logout">
            <h2>
            <img src="<?php echo base_url('/assets/images/temp/stop.png') ?>" alt="stop">
            </h2>
            <div class="alert alert-dismissible alert-info infoalert">
        <span id="return_message">관리자회원정보는 관리자페이지에서만 수정이 가능합니다.</span>
    </div>
    </section>
    
</div>
