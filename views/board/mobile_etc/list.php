<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<?php echo element('headercontent', element('board', element('list', $view))); ?>

<div class="wrap05" style="padding-top:0px;" >
    <section class="inquire">
    
        <div class="board">
            <div class="col-md-6">
                <div class="col-md-6">
                    <form class="navbar-form navbar-right pull-right" action="<?php echo current_full_url() ?>" onSubmit="return postSearch(this);">
                        <input type="hidden" name="findex" value="<?php echo html_escape($this->input->get('findex')); ?>" />
                        <input type="hidden" name="category_id" value="<?php echo html_escape($this->input->get('category_id')); ?>" />
                        <input type="hidden" name="sfield" value="post_title" />
                        <div class="form-group">
                            
                            <input type="text" class="input px200 mr10" placeholder="Search" name="skeyword" value="<?php echo html_escape($this->input->get('skeyword')); ?>" />
                            <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
               
                
            </div>
            <script type="text/javascript">
            //<![CDATA[
            function postSearch(f) {
                var skeyword = f.skeyword.value.replace(/(^\s*)|(\s*$)/g,'');
                if (skeyword.length < 2) {
                    alert('2글자 이상으로 검색해 주세요');
                    f.skeyword.focus();
                    return false;
                }
                return true;
            }
            // function toggleSearchbox() {
            //     $('.searchbox').show();
            //     $('.searchbuttonbox').hide();
            // }
            <?php

                // if ($this->input->get('skeyword')) {
                //     echo 'toggleSearchbox();';
                // }
            ?>
            $(document).on('click', '.btn-point-info', function() {
                $('.point-info-content').toggle();
            });
            //]]>
            </script>
        </div>

        <?php
        $attributes = array('name' => 'fboardlist', 'id' => 'fboardlist');
        echo form_open('', $attributes);
        ?>
            <ul >
            
            <?php
            if (element('list', element('data', element('list', $view))))   {
                foreach (element('list', element('data', element('list', $view))) as  $key => $result) {

            ?>
                <?php if (element('brd_key',element('board', $view)) ==='vtn_discount' || element('is_admin', $view) || element('modify_url', $result)) { ?>
                <li class="" id="heading_<?php echo $key; ?>" onclick="return faq_open(this);">
                <?php } else {?>
                <li id="heading_<?php echo $key; ?>" onclick="alert('본인의 글 이외의 열람이 금지되어있습니다.');">
                <?php } ?>
                
                <div class="table-box">
                    <h3 <?php echo element('brd_key',element('board', $view))==='vtn_discount' ? 'style=width:100%;':''; ?>><?php echo html_escape(element('post_title', $result)); ?></h3>
                        <div class="question " style = "width:100%;" id="answer_<?php echo $key; ?>">
                            <?php if (element('brd_key',element('board', $view)) ==='vtn_discount' || element('is_admin', $view) || element('modify_url', $result)) { ?>
                                <div class="question-content"><?php echo display_html_content(
                        element('post_content', $result),
                        element('post_html', $result));  ?></div>
                            <?php } ?>
                            <?php if (element(abs(element('post_num', $result)),element('reply_content', element('reply_data', element('list', $view))))) { ?>

                                <ul>
                                    <li><p><?php echo display_html_content(element(abs(element('post_num', $result)),element('reply_content', element('reply_data', element('list', $view)))),
                        element('post_html', $result)) ?>
                                    </p>

                                <div class='button' >
                                <?php if (element(abs(element('post_num', $result)),element('modify_url', element('reply_data', element('list', $view))))) { ?>
                                <button type="button" class="" onClick="event.stopPropagation();location.href='<?php echo element(abs(element('post_num', $result)),element('modify_url', element('reply_data', element('list', $view)))); ?>';">
                                    수 정
                                </button>
                                <?php } ?>
                                <?php if (element('is_admin', $view) || element(abs(element('post_num', $result)),element('delete_url', element('reply_data', element('list', $view))))) { ?>
                                <button  type="button" onClick="event.stopPropagation();btn_one_delete_click(this);" data-one-delete-url="<?php echo element(abs(element('post_num', $result)),element('delete_url', element('reply_data', element('list', $view)))); ?>">
                                    삭 제
                                </button>
                                <?php } ?>
                                </div>
                                    </li>
                                </ul>
                            <?php } ?>
                        </div>
                        <?php if(element('brd_key',element('board', $view))!=='vtn_discount'){ ?>
                        <?php if (element(abs(element('post_num', $result)),element('reply_content', element('reply_data', element('list', $view))))) { ?>
                                <span class="color">답변완료</span>
                            <?php } else {?>
                                <span>답변대기</span>
                            <?php }?>
                        <?php } ?>
                        <div class="clear">
                            <div class="button" style="float: left">
                                <?php if (element('modify_url', $result)) { ?>
                                    <button type="button" onClick="event.stopPropagation();location.href='<?php echo element('modify_url', $result); ?>';">
                                        수 정
                                    </button>
                                <?php } ?>
                                <?php if ((element('is_admin', $view) || element('reply_url', $result)) && !element(abs(element('post_num', $result)),element('reply_content', element('reply_data', element('list', $view))))) { ?>
                                <button type="button" onClick="event.stopPropagation();location.href='<?php echo element('reply_url', $result); ?>';">
                                    답 변
                                </button>
                                <?php } ?>
                                <?php if (element('is_admin', $view) || element('delete_url', $result)) { ?>
                                <button  type="button" onClick="event.stopPropagation();btn_one_delete_click(this);" data-one-delete-url="<?php echo element('delete_url', $result); ?>">
                                    삭 제
                                </button>
                                <?php } ?>
                            </div>     
                            <p>
                                <?php echo element('display_name', $result); ?> | 작성일 : <?php echo element('display_datetime', $result); ?>
                            </p>
                        </div>
                    </div>

                </li>
            <?php
                }
            }
            if ( ! element('notice_list', element('list', $view)) && ! element('list', element('data', element('list', $view)))) {
            ?>
                <li>
                    <h3>게시물이 없습니다</h3>
                </li>
            <?php } ?>
            
        </ul>
        <?php echo form_close(); ?>
    </section>
        <div class="table-bottom mt3per mb3per">
            <div class="pull-left mr10">
                <?php if (element('search_list_url', element('list', $view))) { ?>
                    <a href="<?php echo element('search_list_url', element('list', $view)); ?>" class="btn btn-default btn-sm">전체목록</a>
                <?php } ?>
            </div>
            
            
        </div>
        <nav><?php echo element('paging', element('list', $view)); ?></nav>
    
    <section class="caution">
            <h2>
                필독! 주의사항
            </h2>
            <p> <strong>01.</strong> 욕설이나 미풍양속에 어긋나는 메시지는 삭제되며, 
                그러한 경우 법적으로 불이익을 받을 수 있습니다.<br>
                <br>
                <strong>02.</strong> 본인이 작성한 글의 내용과 그에 대한 답변만 볼 수 있습니다.<br>
                <br>
                <strong>03.</strong> 작성한 모든 내용은 시크릿베트남에 저장 됩니다.<br>
                <br>
                <strong>04.</strong> 기타 자세한 내용은 시크릿베트남 이용약관을 참조해 주세요.
                <br>
            </p>
    </section>
</div>
<div id="dialog_tour"  style="display:none">
    <?php 

    $attributes = array('class' => 'form-horizontal', 'name' => 'fwrite', 'id' => 'fwrite', 'onsubmit' => 'return submitContents(this)');
    echo form_open_multipart(current_full_url(), $attributes);
     ?>
    <input type="hidden" name="<?php echo element('primary_key', $view); ?>"    value="<?php echo element(element('primary_key', $view), element('post', $view)); ?>" />
        <div >
       
        
            
            <input type="text" name="post_title" id="post_title" <?php echo $readonly ?> value="<?php echo element('reply', $view) && element('origin', $view) ? 'RE) '.set_value('post_title', element('post_title', element('origin', $view))) : set_value('post_title', element('post_title', element('post', $view))); ?>" placeholder="제목글을 작성해 주세요.리스트에 노출됩니다." onfocus="this.placeholder=''" onblur="this.placeholder='제목글을 작성해 주세요. 리스트에 노출됩니다.'" />
     </div>
    <?php echo form_close(); ?>
  <div class="popup_layer_footer" >
    <div style="width:70%; border-right: 1px solid #fff; box-sizing: border-box;" class="popup_layer_reject pull-left text-center" data-wrapper-id="popup_layer_gps">다시보지않기
    </div>
    <div style="width:30%" class="popup_layer_close pull-right text-center" >닫기
    </div>
  </div>
</div>
<?php echo element('footercontent', element('board', element('list', $view))); ?>


<script type="text/javascript">
//<![CDATA[
function faq_open(el)
{

    var $con = $(el).find('div.table-box div.question');

    if ($con.is(':visible')) {
        $con.slideUp();
    } else {
        $('.table-answer.answer:visible').css('display', 'none');
        $con.slideDown();
    }
    return false;
}


function btn_one_delete_click(el) {
    if (confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
        document.location.href= $(el).attr('data-one-delete-url');
        return true;
    } else {
        return false;
    }
}
//]]>

</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.inquire .form-group input').css('width' , $('.inquire .form-group').width()-35);


        $( "#dialog_tour" ).dialog({
          autoOpen: false,
          modal : true,
          
          
          hide: {
            effect: "fade",
            duration: 300
          },
          open: function() { jQuery('div.ui-widget-overlay').bind('click', function() { jQuery('#dialog_tour').dialog('close'); }) }
        });

        $( ".popup_layer_close" ).on( "click", function() {
          $( "#dialog_tour" ).dialog( "close" );
        });
    });

</script>