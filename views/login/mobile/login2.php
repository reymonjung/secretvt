<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<div class="wrap">
    <?php
        echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>');
        echo show_alert_message(element('message', $view), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
        echo show_alert_message($this->session->flashdata('message'), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
        $attributes = array('class' => 'form-horizontal', 'name' => 'flogin', 'id' => 'flogin');
        echo form_open(current_full_url(), $attributes);
    ?>
    <input type="hidden" name="url" value="<?php echo html_escape($this->input->get_post('url')); ?>" />
    <section class="enter">
        <h2>
            <span>
                알려드립니다.
            </span> 
            해당기능을 이용하시려면 로그인이 필요합니다.
        </h2>

        <div class="id">
            <h3><?php echo element('userid_label_text', $view);?></h3>
            <div>
            <input type="text" name="mem_userid" class="input" value="<?php echo set_value('mem_userid'); ?>" accesskey="L" />
            </div>
        </div>
        <div class="id">
            <h3>패스워드</h3>
            <div>
            <input type="password" class="input" name="mem_password" />
            </div>

        </div>

        <div class="id">
            <label for="autologin">
                <input type="checkbox" name="autologin" id="autologin" value="1" /> 아이디 / 패스워드 기억하기
            </label>

        </div>

        <div class="id" style="margin-bottom:5%">
            <div class="submit_btn"></div>
            <input type="submit" value="로 그 인">
        </div>
        <div class="alert alert-dismissible alert-info autologinalert" style="display:none;">
            자동로그인 기능을 사용하시면, 브라우저를 닫더라도 로그인이 계속 유지될 수 있습니다. 자동로그이 기능을 사용할 경우 다음 접속부터는 로그인할 필요가 없습니다. 단, 공공장소에서 이용 시 개인정보가 유출될 수 있으니 꼭 로그아웃을 해주세요.
        </div>

        <div class="signup02">
            <p>
                아직도 SecretVietnam<br>회원이 아니세요 ?
                <a href="<?php echo site_url('register'); ?>"  title="회원가입">
                    회원가입
                </a>
            </p>

            <p class="send02">
                아이디&amp;패스워드를<br>잊어버리셨나요?
                <a href="<?php echo site_url('findaccount'); ?>" title="아이디 패스워드 찾기">
                    ID/PW 찾기
                </a>
            </p>
        </div>
    </section>
    <section class="ad">
        <h4>ad</h4>
        <?php echo banner("login_banner_1") ?>
    </section>
</div>

<script type="text/javascript">
//<![CDATA[
$(function() {
    $('#flogin').validate({
        rules: {
            mem_userid : { required:true, minlength:3 },
            mem_password : { required:true, minlength:4 }
        }
    });
});
$(document).on('change', "input:checkbox[name='autologin']", function() {
    if (this.checked) {
        $('.autologinalert').show(300);
    } else {
        $('.autologinalert').hide(300);
    }
});
//]]>
</script>
