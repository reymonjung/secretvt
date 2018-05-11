<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>


<?php 
$menuName="";
$contentsId="";
$board_key_arr=explode("_",element('board_key', $view));
if(count($board_key_arr) > 1) $menu_key=$board_key_arr[0]."_".$board_key_arr[1];
else $menu_key=element('board_key', $view);


if (element('menu', $layout)) {
                $menu = element('menu', $layout);
                if (element(0, $menu)) {
                    foreach (element(0, $menu) as $mkey => $mval) {
                        if(strpos($mval['men_link'],$menu_key) !==false) {
                            $menuName=html_escape(element('men_name', $mval));
                            $contentsId=$mkey;
                        }
                    }
                }
            }
            
 ?>


<?php echo element('headercontent', element('board', element('list', $view))); ?>

<div class="wrap">

    <section class="title">
        <h4>
                title
            </h4>
        <div></div>
        <h2><?php echo $menuName?></h2>
        <?php
    if (element('use_category', element('board', element('list', $view))) && element('cat_display_style', element('board', element('list', $view))) === 'tab') {
        $category = element('category', element('board', element('list', $view)));
    ?>
        <table>
            <tr>
            <td onClick="contentsAjax('contents_<?php echo $contentsId?>','<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?findex=<?php echo html_escape($this->input->get('findex')); ?>&category_id=');" role="presentation" <?php if ( ! $this->input->get('category_id')) { ?>class="active" <?php } ?>><img src="<?php echo base_url('assets/images/temp/sub_img/sub_all.png'); ?>" alt="sub01">전체</td>
            <?php
            if (element(0, $category)) {
                foreach (element(0, $category) as $ckey => $cval) {
            ?>
                <td onClick="contentsAjax('contents_<?php echo $contentsId?>','<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?findex=<?php echo html_escape($this->input->get('findex')); ?>&category_id=<?php echo element('bca_key', $cval); ?>')" role="presentation" <?php if ($this->input->get('category_id') === element('bca_key', $cval)) { ?>class="active" <?php } ?>><img src="<?php echo base_url('assets/images/temp/sub_all/msg0'.($ckey+1).'.png'); ?>" alt="sub01"><?php echo html_escape(element('bca_value', $cval)); ?></td>
            <?php
                }
            }
            ?>
            </tr>
        </table>
    <?php } ?>
    </section>
    <div class="table-top">
        <?php if ( ! element('access_list', element('board', element('list', $view))) && element('use_rss_feed', element('board', element('list', $view)))) { ?>
            <a href="<?php echo rss_url(element('brd_key', element('board', element('list', $view)))); ?>" class="btn btn-default btn-sm" title="<?php echo html_escape(element('board_name', element('board', element('list', $view)))); ?> RSS 보기"><i class="fa fa-rss"></i></a>
        <?php } ?>
        <!-- <select class="input" onchange="location.href='<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?category_id=<?php echo html_escape($this->input->get('categroy_id')); ?>&amp;findex=' + this.value;">
            <option value="">정렬하기</option>
            <option value="post_datetime desc" <?php echo $this->input->get('findex') === 'post_datetime desc' ? 'selected="selected"' : '';?>>날짜순</option>
            <option value="post_hit desc" <?php echo $this->input->get('findex') === 'post_hit desc' ? 'selected="selected"' : '';?>>조회수</option>
            <option value="post_comment_count desc" <?php echo $this->input->get('findex') === 'post_comment_count desc' ? 'selected="selected"' : '';?>>댓글수</option>
            <?php if (element('use_post_like', element('board', element('list', $view)))) { ?>
                <option value="post_like desc" <?php echo $this->input->get('findex') === 'post_like desc' ? 'selected="selected"' : '';?>>추천순</option>
            <?php } ?>
        </select> -->
        <?php if (element('use_category', element('board', element('list', $view))) && ! element('cat_display_style', element('board', element('list', $view)))) { ?>
            <select class="input" onchange="location.href='<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?findex=<?php echo html_escape($this->input->get('findex')); ?>&category_id=' + this.value;">
                <option value="">카테고리선택</option>
                <?php
                $category = element('category', element('board', element('list', $view)));
                function ca_select($p = '', $category = '', $category_id = '')
                {
                    $return = '';
                    if ($p && is_array($p)) {
                        foreach ($p as $result) {
                            $exp = explode('.', element('bca_key', $result));
                            $len = (element(1, $exp)) ? strlen(element(1, $exp)) : '0';
                            $space = str_repeat('-', $len);
                            $return .= '<option value="' . html_escape(element('bca_key', $result)) . '"';
                            if (element('bca_key', $result) === $category_id) {
                                $return .= 'selected="selected"';
                            }
                            $return .= '>' . $space . html_escape(element('bca_value', $result)) . '</option>';
                            $parent = element('bca_key', $result);
                            $return .= ca_select(element($parent, $category), $category, $category_id);
                        }
                    }
                    return $return;
                }

                echo ca_select(element(0, $category), $category, $this->input->get('category_id'));
                ?>
            </select>
        <?php } ?>
        <!-- <div class="col-md-6">
            <div class=" searchbox">
                <form class="navbar-form navbar-right pull-right" action="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>" onSubmit="return postSearch(this);">
                    <input type="hidden" name="findex" value="<?php echo html_escape($this->input->get('findex')); ?>" />
                    <input type="hidden" name="category_id" value="<?php echo html_escape($this->input->get('category_id')); ?>" />
                    <div class="form-group">
                        <select class="input" name="sfield">
                            <option value="post_both" <?php echo ($this->input->get('sfield') === 'post_both') ? ' selected="selected" ' : ''; ?>>제목+내용</option>
                            <option value="post_title" <?php echo ($this->input->get('sfield') === 'post_title') ? ' selected="selected" ' : ''; ?>>제목</option>
                            <option value="post_content" <?php echo ($this->input->get('sfield') === 'post_content') ? ' selected="selected" ' : ''; ?>>내용</option>
                            <option value="post_nickname" <?php echo ($this->input->get('sfield') === 'post_nickname') ? ' selected="selected" ' : ''; ?>>회원명</option>
                            <option value="post_userid" <?php echo ($this->input->get('sfield') === 'post_userid') ? ' selected="selected" ' : ''; ?>>회원아이디</option>
                        </select>
                        <input type="text" class="input px100" placeholder="Search" name="skeyword" value="<?php echo html_escape($this->input->get('skeyword')); ?>" />
                        <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="searchbuttonbox">
                <button class="btn btn-primary btn-sm pull-right" type="button" onClick="toggleSearchbox();"><i class="fa fa-search"></i></button>
            </div>
            <?php if (element('point_info', element('list', $view))) { ?>
                <div class="point-info pull-right mr10">
                    <button type="button" class="btn-link btn-point-info" ><i class="fa fa-info-circle"></i></button>
                    <div class="point-info-content alert alert-warning"><strong>포인트안내</strong><br /><?php echo element('point_info', element('list', $view)); ?></div>
                </div>
            <?php } ?>
        </div> -->
        <script type="text/javascript">
        //<![CDATA[
        function postSearch(f) {
            var skeyword = f.skeyword.value.replace(/(^\s*)|(\s*$)/g,'');
            if (skeyword.length < 2) {
                alert('2글자 이상으로 검색해 주세요');
                f.skeyword.focus();
                return false;
            }
            return true;
        }
        function toggleSearchbox() {
            $('.searchbox').show();
            $('.searchbuttonbox').hide();
        }
        <?php
        if ($this->input->get('skeyword')) {
            echo 'toggleSearchbox();';
        }
        ?>
        $(document).on('click', '.btn-point-info', function() {
            $('.point-info-content').toggle();
        });
        //]]>
        </script>
    </div>

    

    <?php
    $attributes = array('name' => 'fboardlist'.$contentsId, 'id' => 'fboardlist'.$contentsId);
    echo form_open('', $attributes);
    ?>

    <?php if (element('is_admin', $view)) { ?>
        <div><label for="all_boardlist_check" class='label'><input id="all_boardlist_check" onclick="if (this.checked) all_boardlist_checked(true,<?php echo $contentsId ?>); else all_boardlist_checked(false,<?php echo $contentsId ?>);" type="checkbox" /> 전체선택</label></div>
    <?php } ?>

    <?php
    if (element('notice_list', element('list', $view))) {
    ?>
        <table class="table">
            <tbody>
            <?php
            foreach (element('notice_list', element('list', $view)) as $result) {
            ?>
                <tr>
                    <?php if (element('is_admin', $view)) { ?><th scope="row"><input type="checkbox" name="chk_post_id[]" value="<?php echo element('post_id', $result); ?>" /></th><?php } ?>
                    <td><span class="label label-primary">공지</span></td>
                    <td>
                        <?php if (element('post_reply', $result)) { ?><span class="label label-primary" style="margin-left:<?php echo strlen(element('post_reply', $result)) * 10; ?>px">Re</span><?php } ?>
                        <a href="<?php echo element('post_url', $result); ?>" style="
                            <?php
                            if (element('post_id', element('post', $view)) === element('post_id', $result)) {
                                echo 'font-weight:bold;';
                            }
                            ?>
                        " title="<?php echo html_escape(element('title', $result)); ?>"><?php echo html_escape(element('title', $result)); ?></a>
                        <?php if (element('is_mobile', $result)) { ?><span class="fa fa-wifi"></span><?php } ?>
                        <?php if (element('post_file', $result)) { ?><span class="fa fa-download"></span><?php } ?>
                        <?php if (element('post_secret', $result)) { ?><span class="fa fa-lock"></span><?php } ?>
                        <?php if (element('post_comment_count', $result)) { ?><span class="label label-warning">+<?php echo element('post_comment_count', $result); ?></span><?php } ?>
                    <td><?php echo element('display_name', $result); ?></td>
                    <td><?php echo element('display_datetime', $result); ?></td>
                    <td><?php echo number_format(element('post_hit', $result)); ?></td>
                </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
    <?php
    }
    ?>
    <section class="title02">
        <h2>업소정보 - <span><?php echo html_escape(element(element('region', $view),config_item('region_category')));?></span></h2>
        <p>총 <span><?php echo (count(element('list', element('main_data', element('list', $view))))+count(element('list', element('data', element('list', $view))))) ?>개</span>의 업소가 있습니다.</p>
    </section>
    <section class="store_list">
    <div class="table-image">
    <?php
    $i = 0;
    $open = false;
    $cols = 2;
    
    if (element('list', element('main_data', element('list', $view)))) {
        foreach (element('list', element('main_data', element('list', $view))) as $result) {

            if ($cols && $i % $cols === 0) {
                echo '<ul class="">';
                $open = true;
            }
            $marginright = (($i+1)% $cols === 0) ? 0 : 2;
    ?>
        <li class="gallery-box" style="width:49%;margin-right:<?php echo $marginright;?>%;">
            <?php if (element('is_admin', $view)) { ?><input type="checkbox" name="chk_post_id[]" value="<?php echo element('post_id', $result); ?>" /><?php } ?>
            <a href="<?php echo element('post_url', $result); ?>" title="<?php echo html_escape(element('title', $result)); ?>">
            <figure>
                <img src="<?php echo element('thumb_url', $result); ?>" alt="<?php echo html_escape(element('title', $result)); ?>" title="<?php echo html_escape(element('title', $result)); ?>"/>
            
                <figcaption>
                    <h2 class="info_subject">[<?php echo html_escape(element('bca_value',element('category', $result))); ?>]<?php echo html_escape(element('title', $result)); ?></h2>
                    
                    <p class="sub_subject"><?php if(element('sub_subject',element('extravars', $result))) echo element('sub_subject',element('extravars', $result)); ?>
                        
                    </p>
                    <span>
                        <?php if (element('open_time',element('extravars', $result))) { 
                           echo  element('open_time',element('extravars', $result));
                        }
                        ?>
                    </span>
                </figcaption>
            </figure>

            
            </a>
        </li>
        <?php
                $i++;
                if ($cols && $i > 0 && $i % $cols === 0 && $open) {
                    echo '</ul>';
                    $open = false;
                }
            }
        } else {
            echo '<div class="table-answer nopost">내용이 없습니다</div>';
                    
        }
        if ($open) {
            echo '</ul>';
            $open = false;
        }
        ?>
        </div>
    </section>
    <section class="ad" style="margin-bottom:4%">
        <h4>ad</h4>
        <?php echo banner("msg_list_banner_1") ?>
    </section>
    <section class="store_list02">
    <div class="table-image">
    <?php
    $i = 0;
    $open = false;
    $cols = element('gallery_cols', element('board', element('list', $view)));
    
    if (element('list', element('data', element('list', $view)))) {
        foreach (element('list', element('data', element('list', $view))) as $result) {
            if ($cols && $i % $cols === 0) {
                echo '<ul class="" >';
                $open = true;
            }
            $marginright = (($i+1)% $cols === 0) ? 0 : 2;
    ?>
        <li class="gallery-box" style="width:<?php echo element('gallery_percent', element('board', element('list', $view))); ?>%;margin-right:<?php echo $marginright;?>%;background: url('<?php echo element('thumb_url', $result)?>') no-repeat left top;background-size: 38.5%;" onClick="location.href='<?php echo element('post_url', $result); ?>'">
            <?php if (element('is_admin', $view)) { ?><input type="checkbox" name="chk_post_id[]" value="<?php echo element('post_id', $result); ?>" /><?php } ?>
            <a>
            
            <h2 >[<?php echo html_escape(element('bca_value',element('category', $result))); ?>]<?php echo html_escape(element('title', $result)); ?></h2>
            
            <p class="sub_subject"><?php if(element('sub_subject',element('extravars', $result))) echo element('sub_subject',element('extravars', $result)); ?>
            </p>
            <span>
                <?php if (element('open_time',element('extravars', $result))) { 
                   echo  element('open_time',element('extravars', $result));
                }
                ?>
            </span>

            
            </a>
        </li>
        <?php
                $i++;
                if ($cols && $i > 0 && $i % $cols === 0 && $open) {
                    echo '</ul>';
                    $open = false;
                }
            }
        } else {
            echo '<div class="table-answer nopost">내용이 없습니다</div>';
                    
        }
        if ($open) {
            echo '</ul>';
            $open = false;
        }
        ?>
        </div>
    </section>
    
    <?php echo form_close(); ?>
    <div class="border_button">
        <div class="pull-left mr10">
            <!-- <a href="<?php echo element('list_url', element('list', $view)); ?>" class="btn btn-default btn-sm">목록</a> -->
            <?php if (element('search_list_url', element('list', $view))) { ?>
                <a href="<?php echo element('search_list_url', element('list', $view)); ?>" class="btn btn-default btn-sm">검색목록</a>
            <?php } ?>
        </div>
        <?php if (element('is_admin', $view)) { ?>
            <div class="pull-right mb10">
                <a onClick="post_multi_action('multi_delete', '0', '선택하신 글들을 완전삭제하시겠습니까?','<?php echo $contentsId ?>');" class="btn btn-default btn-sm">선택삭제</a>

                <!-- <button type="button" class="btn btn-default btn-sm admin-manage-list"><i class="fa fa-cog big-fa"></i>관리</button>
                <div class="btn-admin-manage-layer admin-manage-layer-list">
                    <?php if (element('is_admin', $view) === 'super') { ?>
                        <div class="item" onClick="document.location.href='<?php echo admin_url('board/boards/write/' . element('brd_id', element('board', element('list', $view)))); ?>';"><i class="fa fa-cog"></i> 게시판설정</div>
                        <div class="item" onClick="post_multi_copy('copy');"><i class="fa fa-files-o"></i> 복사하기</div>
                        <div class="item" onClick="post_multi_copy('move');"><i class="fa fa-arrow-right"></i> 이동하기</div>
                        <div class="item" onClick="post_multi_change_category();"><i class="fa fa-tags"></i> 카테고리변경</div>
                    <?php } ?>
                    <div class="item" onClick="post_multi_action('multi_delete', '0', '선택하신 글들을 완전삭제하시겠습니까?');"><i class="fa fa-trash-o"></i> 선택삭제하기</div>
                    <div class="item" onClick="post_multi_action('post_multi_secret', '0', '선택하신 글들을 비밀글을 해제하시겠습니까?');"><i class="fa fa-unlock"></i> 비밀글해제</div>
                    <div class="item" onClick="post_multi_action('post_multi_secret', '1', '선택하신 글들을 비밀글로 설정하시겠습니까?');"><i class="fa fa-lock"></i> 비밀글로</div>
                    <div class="item" onClick="post_multi_action('post_multi_notice', '0', '선택하신 글들을 공지를 내리시겠습니까?');"><i class="fa fa-bullhorn"></i> 공지내림</div>
                    <div class="item" onClick="post_multi_action('post_multi_notice', '1', '선택하신 글들을 공지로 등록 하시겠습니까?');"><i class="fa fa-bullhorn"></i> 공지올림</div>
                    <div class="item" onClick="post_multi_action('post_multi_blame_blind', '0', '선택하신 글들을 블라인드 해제 하시겠습니까?');"><i class="fa fa-exclamation-circle"></i> 블라인드해제</div>
                    <div class="item" onClick="post_multi_action('post_multi_blame_blind', '1', '선택하신 글들을 블라인드 처리 하시겠습니까?');"><i class="fa fa-exclamation-circle"></i> 블라인드처리</div>
                    <div class="item" onClick="post_multi_action('post_multi_trash', '', '선택하신 글들을 휴지통으로 이동하시겠습니까?');"><i class="fa fa-trash"></i> 휴지통으로</div>
                </div> -->
            </div>
        <?php } ?>
        <?php if (element('write_url', element('list', $view))) { ?>
            <div class="pull-left">
                <a href="<?php echo element('write_url', element('list', $view)); ?>" class="btn btn-default btn-sm">글쓰기</a>
            </div>
        <?php } ?>
        
    </div>
    <nav><?php echo element('paging', element('list', $view)); ?></nav>

    <!-- 광고 배너 영역 -->
        <section class="ad">
            <h4>ad</h4>
            <?php echo banner("msg_list_banner_2") ?>
        </section>
        <!-- ===== -->
</div>

<?php echo element('footercontent', element('board', element('list', $view))); ?>

<?php
if (element('highlight_keyword', element('list', $view))) {
    $this->managelayout->add_js(base_url('assets/js/jquery.highlight.js')); ?>
<script type="text/javascript">
//<![CDATA[
$('#fboardlist<?php echo $contentsId ?>').highlight([<?php echo element('highlight_keyword', element('list', $view));?>]);
//]]>
</script>
<?php } ?>
