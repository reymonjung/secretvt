<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<div class="wrap mypage">

    <section class="title02">
        <h2>회원 탈퇴</h2>
    </section>

    <section class="info_table">
        <table >
            <tr>
                <td>
                    <a href="<?php echo site_url('mypage'); ?>">내 정보</a>
                </td>
                <td>
                    <a href="<?php echo site_url('mypage/post'); ?>">나의 작성글</a>
                </td>
                <td>
                    <a href="<?php echo site_url('membermodify'); ?>" >정보수정</a>
                </td>
                <td class="active"> 
                   <a href="<?php echo site_url('membermodify/memberleave'); ?>">탈퇴하기</a>
                </td>
            </tr>
        </table>
    </section>


    <section class="info_logout">
        <figure>
            <img src="../assets/images/temp/info_img/info_bye.png" alt="bye">
            <figcaption>
               <p >안녕하세요 <b class="text-primary"><?php echo html_escape($this->member->item('mem_nickname')); ?></b>님, <br />
                회원님의 탈퇴가 정상적으로 진행되었습니다.<br />
                그 동안 저희 사이트를 이용해주셔서 감사합니다.
                </p> 
            </figcaption>
        </figure>

        <button>
            <a href="<?php echo site_url(); ?>" class="btn btn-danger" title="<?php echo html_escape($this->cbconfig->item('site_title'));?>" >홈페이지로 이동</a>
        </button> 
    </section>

    

        <section class="ad" style="margin-bottom:0;">
        <h4>ad</h4>
        <?php echo banner("review_post_banner_1") ?>
    </section>
</div>
