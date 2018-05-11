<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css?'.$this->cbconfig->item('browser_cache_version')); ?>
<?php echo element('headercontent', element('board', $view)); ?>
<?php 

$readonly='';
if ($this->member->is_member() === false) {
    $readonly = 'readonly="readonly"';
}
?>

<div class="wrap05">

    <section class="title">
            <div></div>
            <h2>
                 <?php echo(element('board_name',element('board', $view)));
 ?>
                <span>
                    <?php 
                    switch (element('brd_key',element('board', $view))) {
                        case 'vtn_tour':
                            echo '호텔예약 , 골프부킹 , 가이드요청 , 예약서비스';
                            break;

                        case 'vtn_renta':
                            echo '7인,16인,25인,45인,리무진,차량 요청서비스';
                            break;

                        case 'vtn_safevisa':
                            echo '관광단수 및 복수 , DN 비즈니스 거주증 및 문제비자 문의';
                            break;

                        case 'vtn_discount':
                            echo '제휴업체 할인, 이벤트, 현지 정보 제공';
                            break;
                        
                        default:
                            # code...
                            break;
                    }
                    ?>
                </span>
            </h2>

            <?php if(element('brd_key',element('board', $view)) !== 'vtn_discount'){ ?>
            <figure style="position: relative;">
                <img src="<?php echo base_url('assets/images/temp/bottom_'.element('brd_key',element('board', $view)).'.png'); ?>">
                <figcaption style="position: absolute; width:188px; height: 40px; top: 0; bottom: 0; margin:auto; left: 3%; color: #fff;">
                    <p style="margin-bottom:2%; text-align: left; font-size: 10px; line-height: 12px; ">
                        베트남 현지 대형 여행사와 특정 제휴하여<br>
                        가장 좋은 조건으로 안전하게 타사보다 <br>
                        무조건 저렴하게 견적 드립니다.
                    </p>
                </figcaption>
            </figure>
            <?php }else { ?>
                
                <img src="<?php echo base_url('assets/images/temp/bottom_'.element('brd_key',element('board', $view)).'.png'); ?>">
            <?php } ?>
    </section>

    <section class="talk">
            <figure>
                <img src="<?php echo base_url('assets/images/temp/talk_logo.png'); ?>">
                <figcaption>
                    <h2><span>Kakaotalk ID</span>eco0322</h2>
                    <p>
                        카카오톡 친구추가를 하시고<br>
                        상담 요청을 하실 수 있습니다.
                    </p> 
                </figcaption>
            </figure>
    </section>
<?php if(element('brd_key',element('board', $view))!=='vtn_discount' || element('is_admin', $view) ) {?>
<section class="write_area">
    
    <?php
    echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>');
    echo show_alert_message(element('message', $view), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
    echo show_alert_message($this->session->flashdata('message'), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>'); 
    $attributes = array('class' => 'form-horizontal', 'name' => 'fwrite', 'id' => 'fwrite', 'onsubmit' => 'return submitContents(this)');
    echo form_open_multipart(current_full_url(), $attributes);
    ?>
        <input type="hidden" name="<?php echo element('primary_key', $view); ?>"    value="<?php echo element(element('primary_key', $view), element('post', $view)); ?>" />
        <div >
       
        
            
            <input type="text" class="input per95" name="post_title" id="post_title" <?php echo $readonly ?> value="<?php echo element('reply', $view) && element('origin', $view) ? 'RE) '.set_value('post_title', element('post_title', element('origin', $view))) : set_value('post_title', element('post_title', element('post', $view))); ?>" placeholder="제목글을 작성해 주세요.리스트에 노출됩니다." onfocus="this.placeholder=''" onblur="this.placeholder='제목글을 작성해 주세요. 리스트에 노출됩니다.'" />
        
        <?php if ( ! element('use_dhtml', element('board', $view)) AND (element('post_min_length', element('board', $view)) OR element('post_max_length', element('board', $view)))) { ?>
            <div class="well well-sm" style="margin-bottom:15px;">
                현재 <strong><span id="char_count">0</span></strong> 글자이며,
                <?php if (element('post_min_length', element('board', $view))) { ?>
                    최소 <strong><?php echo number_format(element('post_min_length', element('board', $view))); ?></strong> 글자 이상
                <?php } if (element('post_max_length', element('board', $view))) { ?>
                    최대 <strong><?php echo number_format(element('post_max_length', element('board', $view))); ?></strong> 글자 이하
                <?php } ?>
                입력하실 수 있습니다.
            </div>
        <?php } ?>
        <div class="form-group ">
            <?php echo display_dhtml_editor('post_content', set_value('post_content', element('post_content', element('post', $view))), $classname = '"" placeholder="호텔예약,골프부팅,가이드 요청 관련한 문의글을 작성해 주세요.
카톡 아이디를 내용에 적어 주시면 운영자가
카톡으로 실시간 상담해 드립니다." '.$readonly.'
    onfocus="this.placeholder=\'\'"
    onblur="this.placeholder=\'관련 문의글을 작성해 주세요. \n카톡 아이디를 내용에 적어 주시면 운영자가 \n카톡으로 실시간 상담해 드립니다.\'"', $is_dhtml_editor = element('use_dhtml', element('board', $view)), $editor_type = $this->cbconfig->item('post_editor_type')); ?>
        </div>
        <?php
        if (element('link_count', element('board', $view)) > 0) {
            $link_count = element('link_count', element('board', $view));
            for ($i = 0; $i < $link_count; $i++) {
                $link = html_escape(element('pln_url', element($i, element('link', $view))));
                $link_column = $link ? 'post_link_update[' . element('pln_id', element($i, element('link', $view))) . ']' : 'post_link[' . $i . ']';
        ?>
            <li>
                <span>링크 #<?php echo $i+1; ?></span>
                <input type="text" class="input per95" name="<?php echo $link_column; ?>" value="<?php echo set_value($link_column, $link); ?>" />
            </li>
        <?php
            }
        }
        if (element('use_upload', element('board', $view))) {
            $file_count = element('upload_file_count', element('board', $view));
            for ($i = 0; $i < $file_count; $i++) {
                $download_link = html_escape(element('download_link', element($i, element('file', $view))));
                $file_column = $download_link ? 'post_file_update[' . element('pfi_id', element($i, element('file', $view))) . ']' : 'post_file[' . $i . ']';
                $del_column = $download_link ? 'post_file_del[' . element('pfi_id', element($i, element('file', $view))) . ']' : '';
        ?>
            <li>
                <span>파일 #<?php echo $i+1; ?></span>
                <input type="file" class="input" name="<?php echo $file_column; ?>" />
                <?php if ($download_link) { ?>
                    <a href="<?php echo $download_link; ?>"><?php echo html_escape(element('pfi_originname', element($i, element('file', $view)))); ?></a>
                    <label for="<?php echo $del_column; ?>">
                        <input type="checkbox" name="<?php echo $del_column; ?>" id="<?php echo $del_column; ?>" value="1" <?php echo set_checkbox($del_column, '1'); ?> /> 삭제
                    </label>
                <?php } ?>
            </li>
        <?php
            }
        }
        ?>
        
            <div class="table-bottom text-center ">
                <?php if(element('post_id',element('post', $view))){ ?>
                <button type="submit" class="" style="width:45%">수정하기</button>
                <button type="button" class="btn-history-back" style="width:45%">취소하기</button>
                <?php } else { ?>

                <button type="submit" class="">작 성 하 기</button>
                <?php } ?>
            </div>
        </div>
    <?php echo form_close(); ?>
</div>
<?php } ?>
<?php echo element('footercontent', element('board', $view)); ?>


<script type="text/javascript">
// 글자수 제한
var char_min = parseInt(<?php echo element('post_min_length', element('board', $view)) + 0; ?>); // 최소
var char_max = parseInt(<?php echo element('post_max_length', element('board', $view)) + 0; ?>); // 최대

<?php if ( ! element('use_dhtml', element('board', $view)) AND (element('post_min_length', element('board', $view)) OR element('post_max_length', element('board', $view)))) { ?>

check_byte('post_content', 'char_count');
$(function() {
    $('#post_content').on('keyup', function() {
        check_byte('post_content', 'char_count');
    });
});
<?php } ?>
function submitContents(f) {
    if ($('#char_count')) {
        if (char_min > 0 || char_max > 0) {
            var cnt = parseInt(check_byte('post_content', 'char_count'));
            if (char_min > 0 && char_min > cnt) {
                alert('내용은 ' + char_min + '글자 이상 쓰셔야 합니다.');
                $('#post_content').focus();
                return false;
            } else if (char_max > 0 && char_max < cnt) {
                alert('내용은 ' + char_max + '글자 이하로 쓰셔야 합니다.');
                $('#post_content').focus();
                return false;
            }
        }
    }
    var title = '';
    var content = '';
    $.ajax({
        url: cb_url + '/postact/filter_spam_keyword',
        type: 'POST',
        data: {
            title: f.post_title.value,
            content: f.post_content.value,
            csrf_test_name : cb_csrf_hash
        },
        dataType: 'json',
        async: false,
        cache: false,
        success: function(data) {
            title = data.title;
            content = data.content;
        }
    });
    if (title) {
        alert('제목에 금지단어(\'' + title + '\')가 포함되어있습니다');
        f.post_title.focus();
        return false;
    }
    if (content) {
        alert('내용에 금지단어(\'' + content + '\')가 포함되어있습니다');
        f.post_content.focus();
        return false;
    }
}
</script>

<?php
if (element('is_post_name', element('post', $view))) {
    if ($this->cbconfig->item('use_recaptcha')) {
        $this->managelayout->add_js(base_url('assets/js/recaptcha.js'));
    } else {
        $this->managelayout->add_js(base_url('assets/js/captcha.js'));
    }
}
?>
<script type="text/javascript">
//<![CDATA[
$(function() {
    $('#fwrite').validate({
        rules: {
            post_title: {required :true, minlength:2, maxlength:60},
            post_content : {<?php echo (element('use_dhtml', element('board', $view))) ? 'required_' . $this->cbconfig->item('post_editor_type') : 'required'; ?> : true }
<?php if (element('is_post_name', element('post', $view))) { ?>
            , post_nickname: {required :true, minlength:2, maxlength:20}
            , post_email: {required :true, email:true}
<?php } ?>
<?php if ($this->member->is_member() === false) { ?>
            , post_password: {required :true, minlength:4, maxlength:100}
<?php if ($this->cbconfig->item('use_recaptcha')) { ?>
            , recaptcha : {recaptchaKey:true}
<?php } else { ?>
            , captcha_key : {required: true, captchaKey:true}
<?php } ?>
<?php } ?>
<?php if (element('use_category', element('board', $view))) { ?>
            , post_category : {required: true}
<?php } ?>
        },
        messages: {
            recaptcha: '',
            captcha_key: '자동등록방지용 코드가 올바르지 않습니다.'
        }
    });
});
<?php if ($this->member->is_member() === false) { ?>
    $("#post_title").bind('click',function(){location.href='<?php echo site_url('login?url=' . urlencode(current_full_url()));?>';});
    $("#post_title").bind('focus',function(){location.href='<?php echo site_url('login?url=' . urlencode(current_full_url()));?>';});
    $("#post_content").bind('click',function(){location.href='<?php echo site_url('login?url=' . urlencode(current_full_url()));?>';});
    $("#post_content").bind('focus',function(){location.href='<?php echo site_url('login?url=' . urlencode(current_full_url()));?>';});
<?php } ?>
<?php if (element('has_tempsave', $view)) { ?>get_tempsave(cb_board); <?php } ?>
<?php if ( ! element('post_id', element('post', $view))) { ?>window.onbeforeunload = function () { auto_tempsave(cb_board); } <?php } ?>
//]]>
</script>
