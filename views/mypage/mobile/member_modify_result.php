<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<div class="wrap mypage">
    <section class="title02">
        <h2>
            정보수정 완료
        </h2>
    </section>
    <section class="title">
        <table class="main_01">
            <tr>
                <td>
                    <a href="<?php echo site_url('mypage'); ?>">내 정보</a>
                </td>
                <td>
                    <a href="<?php echo site_url('mypage/post'); ?>">작성글</a>
                </td>
                <td class="active">
                    <a href="<?php echo site_url('membermodify'); ?>" >정보수정</a>
                </td>
                <td>
                   <a href="<?php echo site_url('membermodify/memberleave'); ?>">탈퇴하기</a>
                </td>
            </tr>
        </table>
    </section>




    <div class="final">
        <div class="table-box">
            <div class="table-body">
                <div class="msg_content" style="text-align:center;">
                        <img src="<?php echo base_url('/assets/images/temp/check.png')?>">
                    <?php echo element('result_message', $view); ?>
                    <p class="btn_final final_01">
                        <a href="<?php echo site_url(); ?>"  style="color:#fff" class="btn btn-danger" title="<?php echo html_escape($this->cbconfig->item('site_title'));?>">홈페이지로 이동
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <section class="ad">
        <h4>ad</h4>
        <?php echo banner("mypage_banner_1") ?>
    </section>

</div>
