<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<div class="wrap02 final">

    <div class="table-box">

        <section class="title02">
            <h2>회원가입을 축하합니다</h2>
        </section>

    <div class="msg_content mt3per" style="text-align:center; font-size: 15px; line-height: 19px;">
        <img src="../assets/images/temp/cong.png" alt="congratulation" style="width: 45%; margin-bottom: 0%">
        <b class="text-primary"><?php echo html_escape($this->session->flashdata('nickname')); ?></b>님의 Secret Vietnam 회원가입을<br/> 진심으로 축하드립니다. <br />
            <?php echo $this->session->flashdata('email_auth_message'); ?> 
    </div>

    <p class="btn_final" style="width: 30%; background-color: #231b26;; padding:1.5% 0 1%; box-sizing:border-box; border-radius: 4px; outline: none; margin:3% auto 10%;">
                <a href="<?php echo site_url(); ?>" class="btn btn-danger" title="<?php echo html_escape($this->cbconfig->item('site_title'));?>" style="color:#fff;">홈페이지로 이동</a>
    </p>

    <section class="ad">
        <h4>ad</h4>
        <?php echo banner("mypage_banner_1") ?>
    </section>

    </div>
</div>
