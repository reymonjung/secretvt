<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<div class="wrap02 final">

    <div class="table-box">

        <section class="title02">
            <h2>회원가입을 축하합니다</h2>
        </section>

    <section class="info_logout">
        <figure>
            <img src="../assets/images/temp/login_img/login_cong.png">
            <figcaption>
                <b class="text-primary"><?php echo html_escape($this->session->flashdata('nickname')); ?></b>
                님의 Secret Philippines 회원가입을<br/> 진심으로 축하드립니다. <br />
                <?php echo $this->session->flashdata('email_auth_message'); ?>
            </figcaption>
        </figure>

    <button>
    <a href="<?php echo site_url(); ?>" class="btn btn-danger" title="<?php echo html_escape($this->cbconfig->item('site_title'));?>">홈페이지로 이동</a>
    </button>
    </section>

    

    <section class="ad" style="margin-bottom:0;">
        <h4>ad</h4>
        <?php echo banner("mypage_banner_1") ?>
    </section>

    </div>
</div>
