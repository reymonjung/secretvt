<div class="wrap">
<!-- 타이틀 -->
    <section class="title02">
        <h2><?php echo html_escape(element('doc_title', element('data', $view))); ?></h2>
    </section>
<!-- ===== -->
    <section class="agree">
        <div class="document" style="height: 400px;">
<?php echo element('content', element('data', $view)); ?>
        </div>
    </section>

    <?php if ($this->member->is_admin() === 'super') { ?>
    <div class="pull-right mb10">
        <a href="<?php echo admin_url('page/document/write/' . element('doc_id', element('data', $view))); ?>" class="btn btn-danger btn-sm" target="_blank">내용수정</a>
    </div>
<?php } ?>
    
    <section class="ad">
        <h4>ad</h4>
        <?php echo banner("document_banner_1"); ?>
    </section>
</div>
