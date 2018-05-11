<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<div class="wrap mypage">

    <section class="title02">
        <h2>회원탈퇴 하기</h2>
        <p><span>회원탈퇴</span>를 하실 수 있습니다.</p>
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
                <td>
                    <a href="<?php echo site_url('membermodify'); ?>">정보수정</a>
                </td>
                <td class="active">
                   <a href="<?php echo site_url('membermodify/memberleave'); ?>">탈퇴하기</a>
                </td>
            </tr>
        </table>
    </section>



    
    
    <div class="form-horizontal mt3per">
        <?php
        $attributes = array('class' => 'form-horizontal', 'name' => 'fconfirmpassword', 'id' => 'fconfirmpassword', 'onsubmit' => 'return confirmleave()');
        echo form_open(current_url(), $attributes);
        ?>  
    <section class="logout">
        <h2>
            <img src="<?php echo base_url('/assets/images/temp/stop.png') ?>" alt="stop" style="width: 30%;">
                정말 탈퇴 하시겠습니까?
                <br/>
            <span>
                회원 탈퇴 시 모든 정보가 삭제되며,<br/>
                어떠한 경우에도 복구되지 않습니다.<br/>
                <br/>
                탈퇴 시 동일한 아이디, 이메일의 재가입은<br/> 
                1개월 이내로는 불가능하며<br/>
                사용하신 모든 내역정보가 소멸됩니다.
                <br/>
                <br/>
                그래도 탈퇴 하시겠습니까?
            </span>
        </h2>
        <?php
        echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>');
        echo show_alert_message(element('message', $view), '<div class="alert alert-auto-close alert-dismissible alert-warning"><button type="button" class="close alertclose" >&times;</button>', '</div>');
        ?>
            <ol class="text-center">
                <li>
                <div class="group modify_01">
                    <span class="modify_02">비밀번호</span>
                    <input type="password" class="input px150 modify_03" id="mem_password" name="mem_password"  />
                    <button class="btn btn-primary modify_04" type="submit">확인</button>
                </div>
                </li>
            </ol>
        <?php echo form_close(); ?>
  </section>  
  <section class="ad">
        <h4>ad</h4>
        <?php echo banner("mypage_banner_1") ?>
    </section>
    </div>

</div>

<script type="text/javascript">
//<![CDATA[

function confirmleave() {
    if (confirm('정말 회원 탈퇴를 하시겠습니까? 탈퇴한 회원정보는 복구할 수 없으므로 신중히 선택하여주세요. 확인을 누르시면 탈퇴가 완료됩니다 ')) {
        return true;
    } else {
        return false;
    }
}
//]]>
</script>
