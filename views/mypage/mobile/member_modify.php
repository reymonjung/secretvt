<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<div class="wrap mypage">

    <section class="title02">
        <h2>회원 정보 수정</h2>
        <p><span>내 정보</span>를 수정 하실 수 있습니다.</p>
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
                    <a href="<?php echo site_url('membermodify'); ?>" >정보수정</a>
                </td>
                <td>
                   <a href="<?php echo site_url('membermodify/memberleave'); ?>">탈퇴하기</a>
                </td>
            </tr>
        </table>
    </section>



    <?php
    echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>');
    echo show_alert_message(element('message', $view), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
    echo show_alert_message($this->session->flashdata('message'), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
    $attributes = array('name' => 'fregisterform', 'id' => 'fregisterform');
    echo form_open_multipart(current_url(), $attributes);
    ?>
        <ol class="member_modify member_01">
            <li>
                <span>아이디</span>
                <div class="form-text text-primary" style="text-align: left; padding-left: 25%;"><strong><?php echo $this->member->item('mem_userid'); ?></strong></div>
            </li>
            <li>
                <span>패스워드</span>
                <div class="form-text text-primary" style="text-align: left; padding-left: 25%;"><a href="<?php echo site_url('membermodify/password_modify'); ?>" class="btn btn-default" title="패스워드 변경">패스워드 변경</a></div>
            </li>
            <?php foreach (element('html_content', $view) as $key => $value) { ?>
                <li>
                    <span><?php echo element('display_name', $value); ?></span>
                    <div class="form-text text-primary group" style="text-align:left; ">
                        <?php echo element('input', $value); ?>
                        <?php if (element('description', $value)) { ?>
                            <p class="help-block help_01" style="line-height: 13px;"><?php echo element('description', $value); ?></p>
                        <?php } ?>
                    </div>
                </li>
            <?php } ?>
            <?php if ($this->cbconfig->item('use_member_photo') && $this->cbconfig->item('member_photo_width') > 0 && $this->cbconfig->item('member_photo_height') > 0) { ?>
                <li>
                    <span>프로필사진</span>
                    <div class="form-text text-primary group">
                        <?php if ($this->member->item('mem_photo')) { ?>
                            <img src="<?php echo member_photo_url($this->member->item('mem_photo')); ?>" alt="프로필사진" title="프로필사진" />
                            <label for="mem_photo_del">
                                <input type="checkbox" name="mem_photo_del" id="mem_photo_del" value="1" <?php echo set_checkbox('mem_photo_del', '1'); ?> />
                                삭제
                            </label>
                        <?php } ?>
                        <input type="file" name="mem_photo" id="mem_photo" />
                        <p class="help-block">가로길이 : <?php echo number_format($this->cbconfig->item('member_photo_width')); ?>px, 세로길이 : <?php echo number_format($this->cbconfig->item('member_photo_height')); ?>px 에 최적화되어있습니다, gif, jpg, png 파일 업로드가 가능합니다</p>
                    </div>
                </li>
            <?php } ?>
            <?php if ($this->cbconfig->item('use_member_icon') && $this->cbconfig->item('member_icon_width') > 0 && $this->cbconfig->item('member_icon_height') > 0) { ?>
                <li>
                    <span>회원아이콘</span>
                    <div class="form-text text-primary group">
                        <?php if ($this->member->item('mem_icon')) { ?>
                            <img src="<?php echo member_icon_url($this->member->item('mem_icon')); ?>" alt="회원아이콘" title="회원아이콘" />
                            <label for="mem_icon_del">
                                <input type="checkbox" name="mem_icon_del" id="mem_icon_del" value="1" <?php echo set_checkbox('mem_icon_del', '1'); ?> />
                                삭제
                            </label>
                        <?php } ?>
                        <input type="file" name="mem_icon" id="mem_icon" />
                        <p class="help-block">가로길이 : <?php echo number_format($this->cbconfig->item('member_icon_width')); ?>px, 세로길이 : <?php echo number_format($this->cbconfig->item('member_icon_height')); ?>px 에 최적화되어있습니다, gif, jpg, png 파일 업로드가 가능합니다</p>
                    </div>
                </li>
            <?php } ?>
            <!-- <li>
                <span>정보공개</span>
                <div class="form-text text-primary group">
                    <div class="checkbox">
                        <label for="mem_open_profile">
                            <input type="checkbox" name="mem_open_profile" id="mem_open_profile" value="1" <?php echo set_checkbox('mem_open_profile', '1', ($this->member->item('mem_open_profile') ? true : false)); ?> <?php echo element('can_update_open_profile', $view) ? '' : 'disabled="disabled"'; ?> />
                            다른분들이 나의 정보를 볼 수 있도록 합니다.
                        </label>
                        <?php if (element('open_profile_description', $view)) { ?>
                            <p class="help-block"><?php echo element('open_profile_description', $view); ?></p>
                        <?php } ?>
                    </div>
                </div>
            </li> -->
            <?php if ($this->cbconfig->item('use_note')) { ?>
                <li>
                    <span>쪽지 기능</span>
                    <div class="form-text text-primary group">
                        <div class="checkbox">
                            <label for="mem_use_note">
                                <input type="checkbox" name="mem_use_note" id="mem_use_note" value="1" <?php echo set_checkbox('mem_use_note', '1', ($this->member->item('mem_use_note') ? true : false)); ?> <?php echo element('can_update_use_note', $view) ? '' : 'disabled="disabled"'; ?> />
                                쪽지를 주고 받을 수 있습니다.
                            </label>
                            <?php if (element('use_note_description', $view)) { ?>
                                <p class="help-block"><?php echo element('use_note_description', $view); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                </li>
            <?php } ?>
            <!-- <li>
                <span>이메일 수신</span>
                <div class="form-text text-primary group">
                    <div class="checkbox">
                        <label for="mem_receive_email" >
                            <input type="checkbox" name="mem_receive_email" id="mem_receive_email" value="1" <?php echo set_checkbox('mem_receive_email', '1', ($this->member->item('mem_receive_email') ? true : false)); ?> /> 수신
                        </label>
                    </div>
                </div>
            </li>
            <li>
                <span>SMS 문자수신</span>
                <div class="form-text text-primary group">
                    <div class="col-lg-8">
                        <div class="checkbox">
                            <label for="mem_receive_sms">
                                <input type="checkbox" name="mem_receive_sms" id="mem_receive_sms" value="1" <?php echo set_checkbox('mem_receive_sms', '1', ($this->member->item('mem_receive_sms') ? true : false)); ?> /> 수신
                            </label>
                        </div>
                    </div>
                </div>
            </li> -->
            <li style="text-align:right">
                <button style="width:30%;" type="submit" class="btn btn-success">수 정 하 기</button>
            </li>
        </ol>

    <section class="ad">
        <h4>ad</h4>
        <?php echo banner("mypage_banner_1") ?>
    </section>

    <?php echo form_close(); ?>
</div>

<?php
$this->managelayout->add_css(base_url('assets/css/datepicker3.css'));
$this->managelayout->add_js('http://dmaps.daum.net/map_js_init/postcode.v2.js');
$this->managelayout->add_js(base_url('assets/js/bootstrap-datepicker.js'));
$this->managelayout->add_js(base_url('assets/js/bootstrap-datepicker.kr.js'));
?>

<script type="text/javascript">
//<![CDATA[
$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    language: 'kr',
    autoclose: true,
    todayHighlight: true
});
//]]>
</script>
