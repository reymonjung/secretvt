<script>
	$(document).ready(function(){
		
			var cover_height = $('body > div').height();
			$('.cover').css('height' , cover_height)

		/*작성하기 클릭시 관련 팝업 스크립트*/
			$('.wrap05 .write_area button').click(function(){
				$('.cover').css('display' , 'block');
				$('.pop_up').css('display' , 'block');
			});

			$('.pop_up button').click(function(){
				$('.pop_up').css('display' , 'none');
				$('.cover').css('display' , 'none');
			});

			/*삭제버튼 클릭시 관련 팝업 스크립트*/
			$('.wrap05 .inquire ul li div button:nth-child(2)').click(function(){
				$('.cover').css('display' , 'block');
				$('.pop_up02').css('display' , 'block');
			});


			$('.pop_up02 button').click(function(){
				$('.pop_up02').css('display' , 'none');
				$('.cover').css('display' , 'none');
			});

			/*팝업창 스크롤바 따라다니기 스크립트*/
			$(window).scroll(function(){
				var scrollTop = $(document).scrollTop() + 230;
				if(scrollTop < 200){
					scrollTop = 200;
				}
				$('.pop_up').stop();
				$('.pop_up').animate({'top' : scrollTop });

				$('.pop_up02').stop();
				$('.pop_up02').animate({'top' : scrollTop });
			});
		});
</script>

<style>
	body > div{
		width: 100%;
		position: relative;
	}
</style>
<div class="cover" style="position: absolute; top: 0; left: 0; background-color: rgba(0,0,0,0.5); width:100%; z-index: 200000000; display: none;">
</div>

<div class="pop_up" style="width: 280px; height: 162px; background-color: #fff; border-radius: 5px; position:absolute; top:200px; right: 0; left: 0; margin: auto; z-index: 300000000000; display: none; text-align:center; box-sizing: border-box; padding: 10px;">
	<figure>
		<img src="assets/images/temp/write_finish.png" alt="write_finish" style="width: 30%; margin-left: 8%; margin-bottom: 3%;">
		<h2 style="margin-bottom: 5%;">
			등록완료 되었습니다.
			<span style="display: block; font-weight: normal; margin-top: 2%;">
				작성글 은 목록에서 확인 가능 합니다. 
			</span>
		</h2>

		<button style="border:0; background-color: #231b26; font-size: 11px; color:#fff; border-radius: 3px; padding-top:2px; padding-bottom: 2px; outline: none;">
		확 인
		</button>
	</figure>
</div>

<div class="pop_up02" style="width: 230px; height: 174px; background-color: #fff; border-radius: 5px; position:absolute; top:200px; right: 0; left: 0; margin: auto; z-index: 300000000000; display: none; text-align:center; box-sizing: border-box; padding: 10px;">
	<figure>
		<img src="assets/images/temp/stop.png" alt="stop" style="width: 40%; margin-left: 8%; margin-bottom: 3%;">
		<h2 style="margin-bottom: 5%;">
			정말로 삭제 하시겠습니까 ?
			<span style="display: block; font-weight: normal; margin-top: 2%;">
				작성글 은 목록에서 확인 가능 합니다. 
			</span>
		</h2>

		<button style="width: 25%; border:0; background-color: #231b26; font-weight: bold; font-size: 11px; color:#fff; border-radius: 3px; padding-top:2px; padding-bottom: 3px; outline: none;">
		확 인
		</button>

		<button style="width: 25%; border:0; background-color: #231b26; font-weight: bold; font-size: 11px; color:#fff; border-radius: 3px; padding-top:2px; padding-bottom: 3px; outline: none;">
		취 소
		</button>
	</figure>
</div>

<div class="wrap05">
<section class="title">
		<div></div>
		<h2>
			업체할인 & 이벤트 정보
			<span>
				제휴업체 할인, 이벤트, 현지 정보 제공
			</span>
		</h2>
		<img src="assets/images/temp/middle_bn02.png">
</section>

<section class="talk">
		<figure>
			<img src="assets/images/temp/talk_logo.png">
			<figcaption>
				<h2><span>Kakaotalk ID</span> secrettv17</h2>
				<p>
					카카오톡 친구추가를 하시고<br>
					상담 요청을 하실 수 있습니다.
				</p> 
			</figcaption>
		</figure>
</section>

<section class="write_area">
	<input type="text" maxlength="30" value="" placeholder="제목글을 작성해 주세요.리스트에 노출됩니다." onfocus="this.placeholder=''" onblur="this.placeholder='제목글을 작성해 주세요. 리스트에 노출됩니다.'">
	<textarea
	 placeholder="호텔예약,골프부팅,가이드 요청 관련한 문의글을 작성해 주세요.
카톡 아이디를 내용에 적어 주시면 운영자가
카톡으로 실시간 상담해 드립니다."
	onfocus="this.placeholder=''"
	onblur="this.placeholder='관련 문의글을 작성해 주세요. \n카톡 아이디를 내용에 적어 주시면 운영자가 \n카톡으로 실시간 상담해 드립니다.'"></textarea>

	<button>
		작 성 하 기
	</button>
</section>

<section class="inquire">
		<ul>
			<li>
				<h3>
					호텔예약 문의 드립니다.
					<span>
						본인글 | 2017-08-26
					</span>
				</h3>
				<div>
					<button>
						수 정
					</button>

					<button>
						삭 제
					</button>

					<p>
						답변대기
					</p>
				</div>
			</li>

			<li>
				<h3>
					호텔예약 문의 드립니다.
					<span>
						본인글 | 2017-08-26
					</span>
				</h3>
				<div>
					<p class="answer">
						답변완료
					</p>
				</div>
			</li>

			<li>
				<h3>
					호텔예약 문의 드립니다.
					<span>
						본인글 | 2017-08-26
					</span>
				</h3>
				<div>
					<p class="answer">
						답변완료
					</p>
				</div>
			</li>

			<li>
				<h3>
					호텔예약 문의 드립니다.
					<span>
						본인글 | 2017-08-26
					</span>
				</h3>
				<div>
					<p class="answer">
						답변완료
					</p>
				</div>
			</li>

			<li>
				<h3>
					호텔예약 문의 드립니다.
					<span>
						본인글 | 2017-08-26
					</span>
				</h3>
				<div>
					<button>
						수 정
					</button>

					<button>
						삭 제
					</button>

					<p>
						답변대기
					</p>
				</div>
			</li>

			<li>
				<h3>
					호텔예약 문의 드립니다.
					<span>
						본인글 | 2017-08-26
					</span>
				</h3>
				<div>
					<p class="answer">
						답변완료
					</p>
				</div>
			</li>

			<li>
				더보기 <span> > </span>
			</li>
		</ul>
</section>

<section class="caution">
		<h2>
			필독! 주의사항
		</h2>
		<pre> 01. 욕설이나 미풍양속에 어긋나는 메시지는 삭제되며, 
       그러한 경우 법적으로 불이익을 받을 수 있습니다.</pre>

        <pre> 02. 본인이 작성한 글의 내용과 그에 대한 답변만 볼 수 있습니다.</pre>

        <pre> 03. 작성한 모든 내용은 시크릿베트남에 저장 됩니다.</pre>

        <pre> 04. 기타 자세한 내용은 시크릿베트남 이용약관을 참조해 주세요.</pre>
</section>
</div>