<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<div class="wrap04">

    <section class="title">
        <div></div>
        <h2>이벤트</h2>
        <span>다양한 이벤트를 만나보세요.</span>
        <table class="table02">
            <tr>
                <td><a href="<?php echo element('document_board_url', $view); ?>" title="공지사항">공지사항</a></td>
                <td style="background-color:rgb(239, 208, 222)">이벤트</td>
            </tr>
        </table>
    </section>
    
    <section class="event_list">
        <ul>
        <?php
        if (element('list', element('data', $view))) {
            foreach (element('list', element('data', $view)) as $result) {
        ?>
            <li>
                <a href="<?php echo element('post_url', $result); ?>" title="<?php echo html_escape(element('eve_title', $result)); ?>">
                <figure>
                    <img src="<?php echo element('thumb_url', $result); ?>" alt="<?php echo html_escape(element('eve_title', $result)); ?>" title="<?php echo html_escape(element('eve_title', $result)); ?>"/>

                     <figcaption>
                        <h3>
                            <?php echo html_escape(element('eve_title', $result)); ?>
                            <span>
                            <?php echo element('eve_start_date', $result); ?>~<?php echo element('eve_start_date', $result); ?>
                            </span>
                        </h3>
                    </figcaption>
                </figure>
              </a>
            </li>
        <?php
            }
        }
        if ( ! element('list', element('data', $view))) {
        ?>
            <li>
                이벤트가 없습니다
            </li>
        <?php
        }
        ?>
        </ul>
    <nav><?php echo element('paging', $view); ?></nav>
    </section>
    <section class="ad">
        <h4>ad</h4>
        <?php echo banner("mypage_banner_1") ?>
    </section>

    
</div>