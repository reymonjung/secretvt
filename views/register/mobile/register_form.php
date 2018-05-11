<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<div class="wrap02">
    <section class="title02">
        <h2>회원가입</h2>
        <p><span>*</span>는 필수입력 사항 입니다.</p>
    </section>
    <section class="my_info01">
        <h4>회원가입 영역</h4>
        

            <?php
            echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>');
            echo show_alert_message($this->session->flashdata('message'), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
            $attributes = array('class' => 'form-horizontal', 'name' => 'fregisterform', 'id' => 'fregisterform');
            echo form_open_multipart(current_full_url(), $attributes);
            ?>
            <input type="hidden" name="mem_open_profile" id="mem_open_profile" value="1" >
            <input type="hidden" name="mem_receive_email" id="mem_receive_email" value="1" >
            <input type="hidden" name="mem_receive_sms" id="mem_receive_sms" value="1" >
            
             <table>
                <tbody>
                <?php
                foreach (element('html_content', $view) as $key => $value) {
                ?>
                    <tr>
                        <td><span><?php 
                        if(element('required', $value)) echo '* ';
                        echo element('display_name', $value); ?></span></td>
                        <td>
                            <?php echo element('input', $value); ?>
                            <?php if (element('description', $value)) { ?>
                                <p class="help-block"><?php echo element('description', $value); ?></p>
                            <?php } ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
                <button type="submit" style="width: 30%;" >회 원 가 입</button>
                    
            <?php echo form_close(); ?>
        
    </section>
</div>
<section class="ad">
        <h4>ad</h4>
        <?php echo banner("register_banner_1") ?>
    </section>
<?php
$this->managelayout->add_css(base_url('assets/css/datepicker3.css'));
$this->managelayout->add_js('http://dmaps.daum.net/map_js_init/postcode.v2.js');
$this->managelayout->add_js(base_url('assets/js/bootstrap-datepicker.js'));
$this->managelayout->add_js(base_url('assets/js/bootstrap-datepicker.kr.js'));
$this->managelayout->add_js(base_url('assets/js/member_register.js?'.$this->cbconfig->item('browser_cache_version')));
if ($this->cbconfig->item('use_recaptcha')) {
    $this->managelayout->add_js(base_url('assets/js/recaptcha.js'));
} else {
    $this->managelayout->add_js(base_url('assets/js/captcha.js'));
}
?>

<script type="text/javascript">
//<![CDATA[
$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    language: 'kr',
    autoclose: true,
    todayHighlight: true
});
$(function() {
    $('#fregisterform').validate({
        onkeyup: false,
        onclick: false,
        rules: {
            mem_userid: {required :true, minlength:3, maxlength:20, is_userid_available:true},
            mem_email: {required :true, email:true, is_email_available:true},
            mem_password: {required :true, is_password_available:true},
            mem_password_re : {required: true, equalTo : '#mem_password' },
            mem_nickname: {required :true, is_nickname_available:true}
            <?php if ($this->cbconfig->item('use_recaptcha')) { ?>
                , recaptcha : {recaptchaKey:true}
            <?php } else { ?>
                , captcha_key : {required: false, captchaKey:true}
            <?php } ?>
        },
        messages: {
            recaptcha: '',
            captcha_key: '자동등록방지용 코드가 올바르지 않습니다.'
        }
    });
});
//]]>
</script>
