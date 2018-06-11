<div class="alert-auto-close alert-dismissible alert-comment-list-message reply_msg" style="display:none;"><!-- <button type="button" class="close alertclose">×</button> --><span class="alert-comment-list-message-content"></span></div>

<?php
if (element('list', element('data', $view))) {
    foreach (element('list', element('data', $view)) as $result) {
?>
    <div  id="comment_<?php echo element('cmt_id', $result); ?>" >
        <?php if (element('use_comment_profile', element('board', $view))) { ?>
            <div class="media-left">
                <img class="media-object member-photo" src="<?php echo element('member_photo_url', $result); ?>" width="64" height="64" alt="<?php echo html_escape(element('cmt_nickname', $result)); ?>" title="<?php echo html_escape(element('cmt_nickname', $result)); ?>" />
            </div>
        <?php } ?>
        <ul>
            <li class="reply_list">
                
                <?php if (element('is_admin', $view)) { ?><input type="checkbox" name="chk_comment_id[]" value="<?php echo element('cmt_id', $result); ?>" /><?php } ?>
                <div class="reply_cont pull-right per95" ><?php echo element('content', $result); ?></div>
                <div class="pull-right"><img src="/assets/images/temp/write_img/reply_arrow.png"></div>
                <div class="reply_info pull-right" >
                    <?php echo element('display_name', $result); ?> | 
                    작성일 : <?php echo element('display_datetime', $result); ?>
                
                    
                    <?php
                    if ( ! element('post_del', element('post', $view)) && ! element('cmt_del', $result)) {
                    ?>
                        <div class="reply_edit">
                            <?php if (element('use_comment_like', element('board', $view))) { ?>
                                <a class="good" href="javascript:;" id="btn-comment-like-<?php echo element('cmt_id', $result); ?>" onClick="comment_like('<?php echo element('cmt_id', $result); ?>', '1', 'comment-like-<?php echo element('cmt_id', $result); ?>');" title="추천하기"><i class="fa fa-thumbs-o-up fa-xs"></i> 추천 <span class="comment-like-<?php echo element('cmt_id', $result); ?>"><?php echo number_format(element('cmt_like', $result)); ?></span></a>
                            <?php } ?>
                            <?php if (element('use_comment_dislike', element('board', $view))) { ?>
                                <a class="bad" href="javascript:;" id="btn-comment-dislike-<?php echo element('cmt_id', $result); ?>" onClick="comment_like('<?php echo element('cmt_id', $result); ?>', '2', 'comment-dislike-<?php echo element('cmt_id', $result); ?>');" title="비추하기"><i class="fa fa-thumbs-o-down fa-xs"></i> 비추 <span class="comment-dislike-<?php echo element('cmt_id', $result); ?>"><?php echo number_format(element('cmt_dislike', $result)); ?></span></a>
                            <?php } ?>
                            <?php if (element('use_comment_blame', element('board', $view)) && ( ! element('comment_blame_blind_count', element('board', $view)) OR element('cmt_blame', $result) < element('comment_blame_blind_count', element('board', $view)))) { ?>
                                <a href="javascript:;" id="btn-blame" onClick="comment_blame('<?php echo element('cmt_id', $result); ?>', 'comment-blame-<?php echo element('cmt_id', $result); ?>');" title="신고하기"><i class="fa fa-bell fa-xs"></i><span class="comment-blame-<?php echo element('cmt_id', $result); ?>"><?php echo element('cmt_blame', $result) ? '+' . number_format(element('cmt_blame', $result)) : ''; ?></span></a>
                            <?php } ?>

                            <?php if (element('can_update', $result)) { ?>
                                <a href="javascript:;" onClick="comment_box('<?php echo element('cmt_id', $result); ?>', 'cu'); return false;">수정</a>
                            <?php } ?>
                            <?php if (element('can_delete', $result)) { ?>
                                <a href="javascript:;" onClick="delete_comment('<?php echo element('cmt_id', $result); ?>', '<?php echo element('post_id', $result); ?>', '<?php echo element('page', $view); ?>');">삭제</a>
                            <?php } ?>
                            <?php
                            if (element('is_admin', $view) && element('use_comment_secret', element('board', $view))) {
                                if (element('cmt_secret', $result)) {
                            ?>
                                <a href="javascript:;" onClick="post_action('comment_secret', '<?php echo element('cmt_id', $result); ?>', '0');"><i class="fa fa-lock"></i></a>
                            <?php } else { ?>
                                <a href="javascript:;" onClick="post_action('comment_secret', '<?php echo element('cmt_id', $result); ?>', '1');"><i class="fa fa-unlock"></i></a>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>


            <div id="edit_<?php echo element('cmt_id', $result); ?>" class="reply_write"></v><!-- 수정 -->
            

            <sdivpan id="reply_<?php echo element('cmt_id', $result); ?>"></div><!-- 답변 -->
            <input type="hidden" value="<?php echo element('cmt_secret', $result); ?>" id="secret_comment_<?php echo element('cmt_id', $result); ?>" />
            <textarea id="save_comment_<?php echo element('cmt_id', $result); ?>" style="display:none"><?php echo html_escape(element('cmt_content', $result)); ?></textarea>
            </li>
        </div>
<?php
    }
}
?>
<nav><?php echo element('paging', $view); ?></nav>
