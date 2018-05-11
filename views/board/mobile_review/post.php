<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>
<?php    $this->managelayout->add_js(base_url('plugin/zeroclipboard/ZeroClipboard.js')); ?>

<?php
if (element('syntax_highlighter', element('board', $view)) OR element('comment_syntax_highlighter', element('board', $view))) {
    $this->managelayout->add_css(base_url('assets/js/syntaxhighlighter/styles/shCore.css'));
    $this->managelayout->add_css(base_url('assets/js/syntaxhighlighter/styles/shThemeMidnight.css'));
    $this->managelayout->add_js(base_url('assets/js/syntaxhighlighter/scripts/shCore.js'));
    $this->managelayout->add_js(base_url('assets/js/syntaxhighlighter/scripts/shBrushJScript.js'));
    $this->managelayout->add_js(base_url('assets/js/syntaxhighlighter/scripts/shBrushPhp.js'));
    $this->managelayout->add_js(base_url('assets/js/syntaxhighlighter/scripts/shBrushCss.js'));
    $this->managelayout->add_js(base_url('assets/js/syntaxhighlighter/scripts/shBrushXml.js'));
?>
    <script type="text/javascript">
    SyntaxHighlighter.config.clipboardSwf = '<?php echo base_url('assets/js/syntaxhighlighter/scripts/clipboard.swf'); ?>';
    var is_SyntaxHighlighter = true;
    SyntaxHighlighter.all();
    </script>
<?php } ?>

<?php echo element('headercontent', element('board', $view)); ?>

<div class="wrap">
    <?php echo show_alert_message($this->session->flashdata('message'), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>'); ?>
   <!--  <h3>
        <?php if (element('category', element('post', $view))) { ?>[<?php echo html_escape(element('bca_value', element('category', element('post', $view)))); ?>] <?php } ?>
        <?php echo html_escape(element('post_title', element('post', $view))); ?>
    </h3> -->
    

    <?php /*if (element('extra_content', $view)) { ?>
        <div class="table-box">
            <table class="table-body">
                <tbody>
                <?php foreach (element('extra_content', $view) as $key => $value) { ?>
                    <tr>
                        <th class="px150"><?php echo html_escape(element('display_name', $value)); ?></th>
                        <td><?php echo nl2br(html_escape(element('output', $value))); ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>몰
    <?php } */?>
    <section class="title">
        <h2 class="bottom_02">[업소후기] <?php echo element('post_title', element('post',$view)) ?></h2>
        <table>
            <tr>
             <td style="width:25%;" class="active">
                    <a href="">
                        <img src="<?php echo base_url('assets/images/temp/submenu13.png')?>" alt="sub01"> 
                        업소후기
                    </a>
                </td>
                <td style="width:25%;">
                    <a href="<?php echo element('list_url', $view); ?>">
                        <img src="<?php echo base_url('assets/images/temp/submenu09.png')?>" alt="sub01"> 
                        목록보기
                    </a>
                </td>
                <td style="width:25%;">
                    <a href="<?php echo element('write_url', $view); ?>">
                        <img src="<?php echo base_url('assets/images/temp/submenu13.png')?>" alt="sub02">
                        글쓰기
                    </a>
                </td>
                <td style="width:25%;">
                   <a href="tel:<?php echo element('tel1',element('post_parent_extravars', $view)) ?>">
                        <img src="<?php echo base_url('assets/images/temp/submenu11.png')?>" alt="sub02">
                        전화걸기
                    </a>
                </td>
            </tr>
        </table>
    </section>


    <section class="title02" style="border-bottom:0;">
        <h4>작성일</h4>
        <p>작성일 : <?php echo element('display_datetime', element('post', $view)); ?></p>
    </section>  

    <section class="content">
       <!-- <ul>
                <li><a href="<?php echo element('list_url', $view); ?>">목록보기</a></li>
                <li><a href="<?php echo base_url('document/map/'.element('post_id', element('post', $view))); ?>">위치확인</a></li>
                <li><a href="">문자전송</a></li>
                <li><a href="">전화하기</a></li>
            </ul> -->
        <div class="contents-view">
            <div class="contents-view-img">
                <?php
                if (element('file_image', $view)) {
                    foreach (element('file_image', $view) as $key => $value) {
                ?>
                    <img src="<?php echo element('thumb_image_url', $value); ?>" alt="<?php echo html_escape(element('pfi_originname', $value)); ?>" title="<?php echo html_escape(element('pfi_originname', $value)); ?>" class="view_full_image" data-origin-image-url="<?php echo element('origin_image_url', $value); ?>" style="max-width:100%;" />
                <?php
                    }
                }
                ?>
            </div>

            <!-- 본문 내용 시작 -->
            <div class="document"><?php echo element('content', element('post', $view)); ?></div>
            <!-- 본문 내용 끝 -->
        </div>

        <div class="border_button">
                <div class="btn-group" role="group" aria-label="...">
                    <?php if (element('modify_url', $view)) { ?>
                        <a href="<?php echo element('modify_url', $view); ?>" class="btn btn-default btn-sm">수정</a>
                    <?php } ?>
                    <?php    if (element('delete_url', $view)) { ?>
                        <a href="<?php echo element('delete_url', $view); ?>" class="btn btn-default btn-sm btn-one-delete">삭제</a>
                    <?php } ?>
                    <?php if (element('search_list_url', $view)) { ?>
                            <a href="<?php echo element('search_list_url', $view); ?>" class="btn btn-default btn-sm">검색목록</a>
                    <?php } ?>
                    <?php if (element('prev_post', $view)) { ?>
                        <a href="<?php echo element('url', element('prev_post', $view)); ?>" class="btn btn-default btn-sm">◀이전 글</a>
                    <?php } ?>
                    <?php if (element('next_post', $view)) { ?>
                        <a href="<?php echo element('url', element('next_post', $view)); ?>" class="btn btn-default btn-sm">다음 글▶</a>
                    <?php } ?>
                </div>
        </div>
    </section>
    

    <?php if ( ! element('post_del', element('post', $view)) && (element('use_post_like', element('board', $view)) OR element('use_post_dislike', element('board', $view)))) { ?>
        <div class="recommand">
            <?php if (element('use_post_like', element('board', $view))) { ?>
                <a class="good" href="javascript:;" id="btn-post-like" onClick="post_like('<?php echo element('post_id', element('post', $view)); ?>', '1', 'post-like');" title="추천하기"><span class="post-like"><?php echo number_format(element('post_like', element('post', $view))); ?></span><br /><i class="fa fa-thumbs-o-up fa-lg"></i></a>
            <?php } ?>
            <?php if (element('use_post_dislike', element('board', $view))) { ?>
                <a class="bad" href="javascript:;" id="btn-post-dislike" onClick="post_like('<?php echo element('post_id', element('post', $view)); ?>', '2', 'post-dislike');" title="비추하기"><span class="post-dislike"><?php echo number_format(element('post_dislike', element('post', $view))); ?></span><br /><i class="fa fa-thumbs-o-down fa-lg"></i></a>
            <?php } ?>
        </div>
    <?php } ?>


    <?php
    if (element('use_sns_button', $view)) {
        $this->managelayout->add_js(base_url('assets/js/sns.js'));
        if ($this->cbconfig->item('kakao_apikey')) {
            $this->managelayout->add_js('https://developers.kakao.com/sdk/js/kakao.min.js');
    ?>
        <script type="text/javascript">Kakao.init('<?php echo $this->cbconfig->item('kakao_apikey'); ?>');</script>
    <?php } ?>
        <div class="sns_button">
            <a href="javascript:;" onClick="sendSns('facebook', '<?php echo element('short_url', $view); ?>', '<?php echo html_escape(element('post_title', element('post', $view)));?>');" title="이 글을 페이스북으로 퍼가기"><img src="<?php echo element('view_skin_url', $layout); ?>/images/social_facebook.png" width="22" height="22" alt="이 글을 페이스북으로 퍼가기" title="이 글을 페이스북으로 퍼가기" /></a>
            <a href="javascript:;" onClick="sendSns('twitter', '<?php echo element('short_url', $view); ?>', '<?php echo html_escape(element('post_title', element('post', $view)));?>');" title="이 글을 트위터로 퍼가기"><img src="<?php echo element('view_skin_url', $layout); ?>/images/social_twitter.png" width="22" height="22" alt="이 글을 트위터로 퍼가기" title="이 글을 트위터로 퍼가기" /></a>
            <?php if ($this->cbconfig->item('kakao_apikey')) { ?>
                <a href="javascript:;" onClick="kakaolink_send('<?php echo html_escape(element('post_title', element('post', $view)));?>', '<?php echo element('short_url', $view); ?>');" title="이 글을 카카오톡으로 퍼가기"><img src="<?php echo element('view_skin_url', $layout); ?>/images/social_kakaotalk.png" width="22" height="22" alt="이 글을 카카오톡으로 퍼가기" title="이 글을 카카오톡으로 퍼가기" /></a>
            <?php } ?>
            <a href="javascript:;" onClick="sendSns('kakaostory', '<?php echo element('short_url', $view); ?>', '<?php echo html_escape(element('post_title', element('post', $view)));?>');" title="이 글을 카카오스토리로 퍼가기"><img src="<?php echo element('view_skin_url', $layout); ?>/images/social_kakaostory.png" width="22" height="22" alt="이 글을 카카오스토리로 퍼가기" title="이 글을 카카오스토리로 퍼가기" /></a>
            <a href="javascript:;" onClick="sendSns('band', '<?php echo element('short_url', $view); ?>', '<?php echo html_escape(element('post_title', element('post', $view)));?>');" title="이 글을 밴드로 퍼가기"><img src="<?php echo element('view_skin_url', $layout); ?>/images/social_band.png" width="22" height="22" alt="이 글을 밴드로 퍼가기" title="이 글을 밴드로 퍼가기" /></a>
        </div>
    <?php } ?>

    <div class="clearfix"></div>

    <?php
    if (element('use_comment', element('board', $view))) {
        if ( ! element('post_hide_comment', element('post', $view))) { ?>
            <section class="reply_02">
                <div><?php   $this->load->view(element('view_skin_path', $layout) . '/comment_write'); ?></div>
                <div id="viewcomment"></div>
            </section>
        <?php
        }
    }
    ?>
 
    




    <section class="ad">
        <h4>ad</h4>
        <?php echo banner("review_post_banner_1") ?>
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
