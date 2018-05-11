<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<div class="wrap findarea">
    <section class="title02">
        <h2>회원 비밀번호 변경</h2>
        <p><span>비밀번호</span>를 변경 하실 수 있습니다 .</p>
    </section>
    <div class="mt3per" style="width:94%; margin:0 auto 3%;">
       
            <?php
            echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>');
            echo show_alert_message(element('error_message', $view), '<div class="alert alert-dismissible alert-warning"><button type="button" class="close alertclose" >&times;</button>', '</div>');
            echo show_alert_message(element('success_message', $view), '<div class="alert alert-dismissible alert-info">', '</div><div class="msg_content" style="text-align:center;">
                        <img src="'.base_url('/assets/images/temp/check.png').'">
                    '.element('result_message', $view).'
                    <p class="btn_final final_01">
                        <a href="'.site_url().'"  style="color:#fff" class="btn btn-danger" title="'.html_escape($this->cbconfig->item('site_title')).'">홈페이지로 이동
                        </a>
                    </p>
                </div>');
            if ( ! element('error_message', $view) && ! element('success_message', $view)) {
                echo show_alert_message(element('info', $view), '<div class="alert alert-info">', '</div>');
                $attributes = array('class' => 'form-horizontal', 'name' => 'fresetpw', 'id' => 'fresetpw');
                echo form_open(current_full_url(), $attributes);
            ?>
        
        <ol class="change_password">
            <li class="change_password01" style="height:26px;">
                <span style="padding:2.5%; height: 26px;">아이디</span>
                <div class="form-text" style="height: 26px; font-size: 14px; padding-left: 40%; text-align: left"><strong><?php echo element('mem_userid', $view); ?></strong></div>
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
            
        </ol>
        <div class="text-center">
        <button type="submit" class="btn btn-success " style=" background: #231b26; padding:0 10px;">패스워드 변경하기</button>
        </div>
    <?php
        echo form_close();
    }
    ?>
    </div>
</div>

<script type="text/javascript">
//<![CDATA[
$(function() {
    $('#fresetpw').validate({
        rules: {
            new_password : { required:true, minlength:<?php echo element('password_length', $view); ?> },
            new_password_re : { required:true, minlength:<?php echo element('password_length', $view); ?>, equalTo : '#new_password' }
        }
    });
});
//]]>
</script>
