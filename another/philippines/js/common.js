$(document).ready(function () {
    /*대메뉴의 스크롤바를 항상 왼쪽으로 위치 시키는 스크립트*/
        $('.main_menu02').animate({ scorllLeft : 0 } , 300);

    /*footer 확장영역*/
            $('.footer > nav > ul > li:first-child').click(function(){
                if( $('.footer > nav > ul > li:nth-child(2)').css('display') === 'none'){
                    $('.footer > nav > ul > li:first-child > span').css('transform' , 'rotate(45deg)');
                    $('.footer > nav > ul > li:nth-child(2)').slideDown();
                    $('html,body').animate({scrollTop : $(document).height()} , 400);
                }
                else{
                    $('.footer > nav > ul > li:first-child > span').css('transform' , 'rotate(0deg)');
                    $('.footer > nav > ul > li:nth-child(2)').slideUp();
                }
            });

    /*Top 보튼 클릭시 스크롤바 맨위로 이동 하는 스크립트*/
            $('.footer > nav > ul > li:nth-child(4)').click(function(){
                $('html , body').animate({scrollTop : 0} , 300);
            });

    

        });