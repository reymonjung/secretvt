<div class="info" style="padding-top:25%">
    <form class="search_box text-right mb10" action="<?php echo current_url(); ?>" onSubmit="return faqSearch(this)">
        <input type="text" name="skeyword" value="<?php echo html_escape($this->input->get('skeyword')); ?>" class="input" placeholder="Search" />
        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
    </form>
    <div class="title">
        <h2><?php echo element('fgr_title', element('faqgroup', $view)); ?></h2>
        <p>총 <span><?php echo count(element('list', element('data', $view))) ?>개</span>의 FAQ가 있습니다.</p>
    </div>

<script type="text/javascript">
//<![CDATA[
function faqSearch(f) {
    var skeyword = f.skeyword.value.replace(/(^\s*)|(\s*$)/g,'');
    if (skeyword.length < 2) {
        alert('2글자 이상으로 검색해 주세요');
        f.skeyword.focus();
        return false;
    }
    return true;
}
//]]>
</script>
    <ul class="list04 ">
<?php
$i = 0;
if (element('list', element('data', $view))) {
    foreach (element('list', element('data', $view)) as $result) {
?>
        <li>
            
            <h2 class="heading" id="heading_<?php echo $i; ?>" onclick="return faq_open(<?php echo $i; ?>);">
            <img id="arrow_<?php echo $i; ?>" src="<?php echo base_url('assets/images/temp/arrow03.png'); ?>"><?php echo element('title', $result); ?></h2>
            <div class="answer" id="answer_<?php echo $i; ?>">
                <?php echo element('content', $result); ?>
            </div>
        </li>
<?php
        $i++;
    }
}
     echo '</ul>';
if ( ! element('list', element('data', $view))) {
?>
    <div class="table-answer nopost">내용이 없습니다</div>
<?php
}
?>
    <nav><?php echo element('paging', $view); ?></nav>
<?php
if ($this->member->is_admin() === 'super') {
?>
    <div class="text-center mb3per">
        <a href="<?php echo admin_url('page/faq'); ?>?fgr_id=<?php echo element('fgr_id', element('faqgroup', $view)); ?>" class="btn btn-black btn-sm" target="_blank" title="FAQ 수정">FAQ 수정</a>
    </div>
<?php
}
?>
<script type="text/javascript">
//<![CDATA[
function faq_open(val)
{
    var $con = $("#answer_"+val);

    if ($con.is(':visible')) {
        $("#arrow_"+val).attr('src','<?php echo base_url('assets/images/temp/arrow03.png'); ?>');
        $con.slideUp();
    } else {
        $('.answer:visible').css('display', 'none');
        $("ul.list04 li h2 img").attr('src','<?php echo base_url('assets/images/temp/arrow03.png'); ?>');
        $('#arrow_'+val).attr('src','<?php echo base_url('assets/images/temp/arrow02.png'); ?>');
        $con.slideDown();
    }
    return false;
}
//]]>
</script>
