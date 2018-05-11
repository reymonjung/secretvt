<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<div class="wrap mypage">

     <section class="title02">
        <h2>회원 비밀번호 변경</h2>
        <p><span>비밀번호</span>를 변경 하실 수 있습니다 .</p>
    </section>

    <section class="title" style="margin-bottom:3%;">
        <table style="width:90%;">
            <tr>
                <td style="padding:2% 0;">
                    <a href="<?php echo site_url('mypage'); ?>">내 정보</a>
                </td>
                <td>
                    <a href="<?php echo site_url('mypage/post'); ?>">나의 작성글</a>
                </td>
                <td class="active">
                    <a href="<?php echo site_url('membermodify'); ?>" >정보수정</a>
                </td>
                <td>
                   <a href="<?php echo site_url('membermodify/memberleave'); ?>">탈퇴하기</a>
                </td>
            </tr>
        </table>
    </section>


    <div class="mt3per" style="width:94%; margin:0 auto 3%;">
        <?php
        echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>');
        echo show_alert_message(element('message', $view), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
        echo show_alert_message($this->session->flashdata('message'), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
        echo show_alert_message(element('info', $view), '<div class="alert alert-info" style="margin-bottom:3%;">', '</div>');
        $attributes = array('class' => 'form-horizontal display', 'name' => 'fchangepassword', 'id' => 'fchangepassword');
        echo form_open(current_url(), $attributes);
        ?>
            <ol class="change_password">
                <li class="change_password01" style="height:26px;">
                    <span style="padding:2.5%; height: 26px;">아이디</span>
                    <div class="form-text" style="height: 26px; font-size: 14px; padding-left: 40%; text-align: left"><strong><?php echo $this->member->item('mem_userid'); ?></strong></div>
                </li>
                <li class="change_password01">
                    <span style="padding:4% 0; ">현재비밀번호</span>
                    <div class="group" style="text-align:left; padding-left:5%;">
                        <input type="password" class="input" id="cur_password" name="cur_password" />
                    </div>
                </li>
                <li class="change_password01">
                    <span style="padding:4% 0;">새로운비밀번호</span>
                    <div class="group" style="text-align:left; padding-left:5%;">
                        <input type="password" class="input" id="new_password" name="new_password" />
                    </div>
                </li>
                <li class="change_password01"  style="border-bottom:0;">
                    <span style="padding:4% 0;" >재입력</span>
                    <div class="group" style="text-align:left; padding-left:5%;">
                        <input type="password" class="input" id="new_password_re" name="new_password_re" />
                    </div>
                </li>
                <!--
                <li style="text-align:right;  padding-right: 3%; box-sizing: border-box; margin-bottom:0; border-bottom:0; ">
                    <button type="submit" class="btn btn-success">수정하기</button>
                </li>
                -->
            </ol>

            <button type="submit" class="btn btn-success" style="float: right; width: 30%; background: #231b26; padding:0.5%;">수 정 하 기</button>


        <?php echo form_close(); ?>
    </div>
    <section class="ad">
        <h4>ad</h4>
        <?php echo banner("mypage_banner_1") ?>
    </section>
</div>

<script type="text/javascript">
//<![CDATA[
$(function() {
    $('#fchangepassword').validate({
        rules: {
            cur_password : { required:true },
            new_password : { required:true, minlength:<?php echo element('password_length', $view); ?> },
            new_password_re : { required:true, minlength:<?php echo element('password_length', $view); ?>, equalTo: '#new_password' }
        }
    });
});
//]]>
</script>
