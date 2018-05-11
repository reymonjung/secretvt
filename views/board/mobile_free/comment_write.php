<?php
if ( ! element('post_hide_comment', element('post', $view)) && element('is_admin', $view)) {
?>
    <div class="chk_comment_all_wrapper"><label for="chk_comment_all" class='label'><input id="chk_comment_all" onclick="all_commentlist_checked(this.checked);" type="checkbox"> 코멘트 전체선택</label>
    <a  onClick="comment_multi_action('viewcomment', '<?php echo element('post_id', element('post', $view)); ?>', 'comment_multi_delete', '0', '선택하신 글들을 완전삭제하시겠습니까?');" class="btn btn-default btn-sm pull-right">선택삭제</a>
    </div>
    
    
<?php
}
if (element('can_comment_write', element('comment', $view)) OR element('show_textarea', element('comment', $view))) {
?>
    <div id="comment_write_box">
        <div class="well ">
            <div class="alert alert-auto-close alert-dismissible alert-comment-message" style="display:none;"><button type="button" class="close alertclose">×</button><span class="alert-comment-message-content"></span></div>
            <?php
            $attributes = array('name' => 'fcomment', 'id' => 'fcomment');
            echo form_open('', $attributes);
            ?>
                <input type="hidden" name="mode" id="mode" value="c" />
                <input type="hidden" name="post_id" value="<?php echo element('post_id', element('post', $view)); ?>" />
                <input type="hidden" name="cmt_id" value="" id="cmt_id" />
                <input type="hidden" name="cmt_page" value="" id="cmt_page" />
                <?php
                if (element('is_comment_name', element('comment', $view))) {
                ?>
                    <ol>
                        <li>
                            <span>이름</span>
                            <input type="text" class="input" id="cmt_nickname" name="cmt_nickname" value="<?php echo set_value('cmt_nickname'); ?>" />
                        </li>
                        <li>
                            <span>비밀번호</span>
                            <input type="password" class="input" id="cmt_password" name="cmt_password" />
                        </li>
                    </ol>
                <?php
                }
                ?>
                <h2>댓글작성하기</h2>
                <textarea class="" name="cmt_content" id="cmt_content"  accesskey="c" <?php if ( ! element('can_comment_write', element('comment', $view))) {echo 'onClick="alert(\'' . html_escape(element('can_comment_write_message', element('comment', $view))) . '\');return false;"';} else { echo 'onClick="if(this.value==\'다른 사람의 권리를 침해하거나 명예를 훼손하는 게시물은 이용약관 및 관련 법률에 의해 제제를 받을 수 있습니다.\'){this.value=\'\'}";';}?>><?php echo set_value('cmt_content', element('cmt_content', element('comment', $view))); ?></textarea>
                <?php if (element('comment_min_length', element('board', $view)) OR element('comment_max_length', element('board', $view))) { ?>
                    <div>
                         <strong><span id="char_count">0</span>/<?php if (element('comment_max_length', element('board', $view))) { ?>
                            <span><?php echo number_format(element('comment_max_length', element('board', $view))); ?></span>
                        <?php } ?></strong> 
                        
                    </div>
                <?php } ?>
                <div class="">
                    <div class="" style="display: inline-block; width: 100%;">
                        <button type="button" class="btn btn-danger btn-sm" id="cmt_btn_submit" onClick="<?php if ( ! element('can_comment_write', element('comment', $view))) {echo 'alert(\'' . html_escape(element('can_comment_write_message', element('comment', $view))) . '\');return false;"';} else { ?>add_comment(this.form, '<?php echo element('post_id', element('post', $view)); ?>');<?php } ?> ">등 록</button>
                    </div>
                    <div class="btn-group pull-right" role="group" aria-label="...">
                        <?php if (element('can_comment_secret', element('comment', $view))) { ?>
                            <div class="checkbox pull-left mr10">
                                <label for="cmt_secret">
                                    <input type="checkbox" name="cmt_secret" id="cmt_secret" value="1" <?php echo set_checkbox('cmt_secret', '1', (element('cmt_secret', element('comment', $view)) ? true : false)); ?> /> 비밀글
                                </label>
                            </div>
                        <?php } ?>
                       <!--  <button type="button" class="btn btn-default btn-sm" title="새글등록" onClick="comment_box('', 'c');"><i class="fa fa-pencil fa-lg"></i></button>
                        <button type="button" class="btn btn-default btn-sm" title="창을크게" onClick="resize_textarea('cmt_content', 'down');"><i class="fa fa-plus fa-lg"></i></button>
                        <button type="button" class="btn btn-default btn-sm" title="창을작게" onClick="resize_textarea('cmt_content', 'up');"><i class="fa fa-minus fa-lg"></i></button> -->
                    </div>
                </div>
                <?php if ($this->member->is_member() === false) { ?>
                    <div class="form-inline passcord">
                        <?php if ($this->cbconfig->item('use_recaptcha')) { ?>
                            <div class="captcha" id="recaptcha"></div>
                            <button type="button" id="captcha" style="display:none;"></button>
                            <input type="hidden" name="recaptcha" />
                        <?php } else { ?>
                            <div class="form-group"><img src="<?php echo base_url('assets/images/preload.png'); ?>" width="160" height="40" id="captcha" alt="captcha" title="captcha" /></div>
                            <div class="form-group">
                                <input type="text" class="input col-md-4" id="captcha_key" name="captcha_key" />
                            </div>
                            <div class="form-group">자동등록방지 숫자를 순서대로 입력하세요.</div>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php echo form_close(); ?>
        </div>
    </div>
<?php
}
?>
<script type="text/javascript">
// 글자수 제한
var char_min = parseInt(<?php echo element('comment_min_length', element('board', $view)) + 0; ?>); // 최소
var char_max = parseInt(<?php echo element('comment_max_length', element('board', $view)) + 0; ?>); // 최대

<?php if (element('comment_min_length', element('board', $view)) OR element('comment_max_length', element('board', $view))) { ?>

check_byte('cmt_content', 'char_count');
$(function() {
    $(document).on('keyup', '#cmt_content', function() {
        check_byte('cmt_content', 'char_count');
    });
});
<?php } ?>
</script>
<script type="text/javascript" src="<?php echo base_url('assets/js/comment.js'); ?>"></script>

<script type="text/javascript">
//<![CDATA[
$(document).ready(function($) {
    view_comment('viewcomment', '<?php echo element('post_id', element('post', $view)); ?>', '', '');
});
//]]>
</script>

<?php if (element('is_comment_name', element('comment', $view))) { ?>
    <?php if ($this->cbconfig->item('use_recaptcha')) { ?>
        <script type="text/javascript" src="<?php echo base_url('assets/js/recaptcha.js'); ?>"></script>
    <?php } else { ?>
        <script type="text/javascript" src="<?php echo base_url('assets/js/captcha.js'); ?>"></script>
    <?php } ?>
<?php } ?>
<script type="text/javascript">
//<![CDATA[
$(function() {
    $('#fcomment').validate({
        rules: {
<?php if (element('is_comment_name', element('comment', $view))) { ?>
            cmt_nickname: {required :true, minlength:2, maxlength:20},
            cmt_password: {required :true, minlength:<?php echo element('password_length', element('comment', $view)); ?>},
<?php if ($this->cbconfig->item('use_recaptcha')) { ?>
            recaptcha : {recaptchaKey:true},
<?php } else { ?>
            captcha_key : {required: true, captchaKey:true},
<?php } ?>
<?php } ?>
            cmt_content: {required :true},
            mode : {required : true}
        },
        messages: {
            recaptcha: '',
            captcha_key: '자동등록방지용 코드가 올바르지 않습니다.'
        }
    });
});
//]]>
</script>
