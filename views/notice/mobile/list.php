<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<div class="wrap04">

    <section class="title">
        <div></div>
        <h2>공지사항</h2>
        <!-- <span>시크릿 베트남에서 알려 드립니다.</span> -->
        <table class="table02">
            <tr>
                <td style="background-color:#f7edf1">
                    <figure>
                        <img src="<?php echo base_url('assets/images/temp/de_img/de_bell.png')?>" alt="sub01"> 
                        <figcaption>
                             공지사항
                        </figcaption>
                    </figure>
                </td>

                <td>
                    <a href="<?php echo element('document_board_url', $view); ?>" title="이벤트">
                        <figure>
                            <img src="<?php echo base_url('assets/images/temp/de_img/de_gift.png')?>" alt="sub01"> 
                            <figcaption>
                                이벤트
                            </figcaption>
                        </figure>
                    </a>
                </td>
            </tr>
        </table>
    </section>
    
    <section class="notice_list">
        <table >
            <?php
            if (element('list', element('data', $view))) {
                foreach (element('list', element('data', $view)) as $result) {
            ?>
                <tr>
                    <td>
                    <!-- <td style="padding:0px"><?php if (element('thumb_url', $result)) { ?><img class="media-object" src="<?php echo element('thumb_url', $result); ?>" alt="<?php echo html_escape(element('post_title', $result)); ?>" title="<?php echo html_escape(element('post_title', $result)); ?>" style="width:50px;height:40px;" /><?php } ?></td> -->
                    <h2><span>[공지]</span><a href="<?php echo element('post_url', $result); ?>" title="<?php echo html_escape(element('noti_title', $result)); ?>"><?php echo html_escape(element('noti_title', $result)); ?></a></h2>
        
                    
                    <p><?php echo element('display_datetime', $result); ?></p>
                    </td>
                </tr>
            <?php
                }
            }
            if ( ! element('list', element('data', $view))) {
            ?>
                <tr>
                    <td colspan="3" class="nopost">공지사항이 없습니다</td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>

       
    
    <nav><?php echo element('paging', $view); ?></nav>
    </section>
    <section class="ad" style="margin-bottom:0;">
        <h4>ad</h4>
        <?php echo banner("mypage_banner_1") ?>
    </section>

    
</div>
