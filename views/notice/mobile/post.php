<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>


<div class="wrap04">
    <?php echo show_alert_message($this->session->flashdata('message'), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>'); ?>

    <section class="title">
        <h2 >[공지]<?php echo element('noti_title', element('data', $view)); ?></h2>
         <table class="table02">
            <tr>
                <td style="background-color:rgb(239, 208, 222)">공지사항</td>
                <td><a href="<?php echo element('document_board_url', $view); ?>" title="이벤트">이벤트</a></td>
            </tr>
        </table>
    </section>

    <section class="title02" style="border-bottom:0;">
        <h4>작성일</h4>
        <p>작성일 : <?php echo element('display_datetime', $view); ?></p>
    </section>

    <section class="content">
        <div class="contents-view" style="margin-bottom: 0;">
            <!-- 본문 내용 시작 -->
            <div id="post-content"><?php echo element('content', element('data', $view)); ?></div>
            <!-- 본문 내용 끝 -->
        </div>
    </section>
    <!-- 광고 배너 영역 -->
    
    



    

    <div class="clearfix"></div>
    <div class="border_button  mb3per">
        <div class="btn-group pull-right" role="group" aria-label="...">
            <?php if ($this->member->is_admin() === 'super') { ?>
                <a href="<?php echo admin_url('page/notice/write/' . element('noti_id', element('data', $view))); ?>" class="btn btn-default btn-sm" target="_blank">수 정</a>
            <?php } ?>
                <a href="<?php echo element('list_url', $view); ?>" class="btn btn-default btn-sm">목 록</a>
            <?php if (element('prev_post', $view)) { ?>
                <a href="<?php echo element('url', element('prev_post', $view)); ?>" class="btn btn-default btn-sm">◀이전 글</a>
            <?php } ?>
            <?php if (element('next_post', $view)) { ?>
                <a href="<?php echo element('url', element('next_post', $view)); ?>" class="btn btn-default btn-sm">다음 글▶</a>
            <?php } ?>
        </div>
    </div>

     <?php
    if (element('use_comment', element('board', $view))) {
        if ( ! element('post_hide_comment', element('data', $view))) {
        ?>
        <section>
            <div id="viewcomment"></div>
        </section>
        <?php
            $this->load->view(element('view_skin_path', $layout) . '/comment_write');
        }
    }
    ?>
    <section class="ad">
        <h4>ad</h4>
        <?php echo banner("karaoke_post_banner_1") ?>
    </section>
</div>

<?php echo element('footercontent', element('board', $view)); ?>

<?php if (element('target_blank', element('board', $view))) { ?>
<script type="text/javascript">
//<![CDATA[
$(document).ready(function() {
    $("#post-content a[href^='http']").attr('target', '_blank');
});
//]]>
</script>
<?php } ?>

<script type="text/javascript">
//<![CDATA[
var client = new ZeroClipboard($('.copy_post_url'));
client.on('ready', function( readyEvent ) {
    client.on('aftercopy', function( event ) {
        alert('게시글 주소가 복사되었습니다. \'Ctrl+V\'를 눌러 붙여넣기 해주세요.');
    });
});
//]]>
</script>
<?php
if (element('highlight_keyword', $view)) {
    $this->managelayout->add_js(base_url('assets/js/jquery.highlight.js')); ?>
<script type="text/javascript">
//<![CDATA[
$('#post-content').highlight([<?php echo element('highlight_keyword', $view);?>]);
//]]>
</script>
<?php } ?>
