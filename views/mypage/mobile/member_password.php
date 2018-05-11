<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>


<div class="wrap mypage">

    <section class="title02">
        <h2>내정보 수정</h2>
        <p><span>내정보</span>를 수정 하실 수 있습니다.</p>
    </section>

    <section class="title">
        <table class="main_01">
            <tr>
                <td>
                    <a href="<?php echo site_url('mypage'); ?>">내 정보</a>
                </td>
                <td>
                    <a href="<?php echo site_url('mypage/post'); ?>">작성글</a>
                </td>
                <td class="active">
                    <a href="<?php echo site_url('membermodify'); ?>">정보수정</a>
                </td>
                <td>
                   <a href="<?php echo site_url('membermodify/memberleave'); ?>">탈퇴하기</a>
                </td>
            </tr>
        </table>
    </section>


<section class="logout">
    <h2>
        <img src="http://cmy.secretvt.com/assets/images/temp/lock.png" alt="lock" >
            비밀번호를 한번 더 입력해 주세요.
            <br>
        <span>
            외부로부터 회원님의 정보를<br>
            안전하게 보호하기 위한 절차입니다.<br>
            현재 사용하시고 있는 회원님의 비밀번호를<br>
            한번 더 입력하여 주시기 바랍니다.
        </span>
    </h2>
    <?php
    echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>');
    echo show_alert_message(element('message', $view), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
    $attributes = array('name' => 'fconfirmpassword', 'id' => 'fconfirmpassword');
    echo form_open(current_url(), $attributes);
    ?>
        <ol class="text-center" >
            <li>
                
                <div class="group modify_01">
                    <span class="modify_02">비밀번호</span>
                    <input type="password" class="input px150 modify_03" id="mem_password" name="mem_password"/>
                    <button class="btn btn-primary modify_04" type="submit">확인</button>
                    
                </div>
            </li>
        </ol>
</section>
    <?php echo form_close(); ?>

    <section class="ad">
        <h4>ad</h4>
        <?php echo banner("mypage_banner_1") ?>
    </section>
</div>


