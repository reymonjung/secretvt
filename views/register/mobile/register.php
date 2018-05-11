<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<div class="wrap02">
    <?php
    echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>');
    echo show_alert_message($this->session->flashdata('message'), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
    $attributes = array('class' => 'form-horizontal', 'name' => 'fregisterform', 'id' => 'fregisterform');
    echo form_open(current_full_url(), $attributes);
    ?>
        <input type="hidden" name="register" value="1" />
        <div class="table-box">
            <section class="title02">
                <h2>회원가입 약관</h2>
                <p><span>필 수 사 항</span></p>
            </section>

            <section class="join_agree">
                <div class="join_txt"><?php echo element('member_register_policy1', $view); ?></div>
                 
                <div class="join_check">
                    <input type="checkbox" name="agree" id="agree" value="1" /> 
                    <label for="agree">위 회원가입약관의 내용에 동의 합니다.</label>
                </div>
            </section>

            <section class="title02">
                <h2>개인정보 수집 및 이용동의</h2>
                <p><span>필 수 사 항</span></p>
            </section>

            <section class="join_agree">
                <div class="join_txt"><?php echo element('member_register_policy2', $view); ?></div>

                <div class="join_check">
                    <input type="checkbox" name="agree2" id="agree2" value="1" /> 
                    <label for="agree2">개인정보취급방침안내의 내용에 동의합니다</label>
                </div>
            </section>

            <section class="title02">
                <h2>위치정보 수집 및 이용동의</h2>
                <p><span>필 수 사 항</span></p>
            </section>

            <section class="join_agree">
                <div class="join_txt"><?php echo element('member_register_policy3', $view); ?></div>

                <div class="join_check">
                    <input type="checkbox" name="agree3" id="agree3" value="1" /> 
                    <label for="agree3">위치정보취급방침안내의 내용에 동의합니다</label>
                </div>
            </section>

            <button type="submit" class="join_btn" style="margin:0 3% 4% 0">회 원 가 입</button>
        </div>
    <?php echo form_close(); ?>
</div>

<script type="text/javascript">
//<![CDATA[
$(function() {
    $('#fregisterform').validate({
        rules: {
            agree: {required :true},
            agree2: {required :true},
            agree3: {required :true}
        }
    });
});
//]]>
</script>
