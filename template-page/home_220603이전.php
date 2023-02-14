<?php
/**
 * Template Name: Home
 * Template Post Type: post, page
 */
$www = get_stylesheet_directory_uri();
get_header(); 


// 형량예측시스템 버튼 html (section2 ~ 6 상단에 보여지는 html)
$system_btn_html = '<div class="system_text" onclick="survey_popup_open()">형량예측시스템</div>';

// 전화상담 전화번호
$tel = '02-538-0337';

// 카카오상담 링크
$kakao = 'http://pf.kakao.com/_xjxlSfs/chat';

?>

<div class="hero" id="section1" style="background-image:url(/img/main_traffic/section1_bg.jpg); background-size: cover; position: relative;">
	<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="../css/main_traffic.css" />
	<link rel="stylesheet" href="../css/swiper-bundle.css" />
	<link rel="stylesheet" href="../css/swiper-bundle.min.css" />
	<script src="../js/swiper-bundle.min.js"></script>
	
	<!--제이쿼리 ui css-->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<!--제이쿼리 ui js-->
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	
	
	<div class="nav_box pc">
		<a href="http://traffic.anlab.co.kr/"><img class="traffic_logo pc" src="/img/main_traffic/traffic_logo_pc.png"></a>
		<span class="system_text" onclick="survey_popup_open()">형량예측시스템</span>
		<nav class="nav_meun section1">
			<ul>
				<li class="menu_1 selected" onclick="goTop('section1');" onselectstart="return false">에이앤랩</li>
				<li class="menu_2" onclick="goTop('section2');" onselectstart="return false">성공사례</li>
				<li class="menu_3" onclick="goTop('section3');" onselectstart="return false">변호사소개</li>
				<li class="menu_4" onclick="goTop('section4');" onselectstart="return false">음주<span class="pc">운전 / 측정거부</span></li>
				<li class="menu_5" onclick="goTop('section5');" onselectstart="return false">교통사고<span class="pc"> / 뺑소니</span></li>
				<li class="menu_6" onclick="goTop('section6');" onselectstart="return false">상담<span class="pc">안내</span></li>
			</ul>
		</nav>
	</div>
	
	<div class="top">
		<img class="logo mobile" src="/img/main_traffic/logo_w.png" onclick="goTop('section1');">
		<span class="system_text mobile" onclick="survey_popup_open()">형량예측<br>시스템</span>
		<a class="tel_box" href="tel:<?php echo $tel?>"><?php echo $tel?></a>
		<a href="<?php echo $kakao?>"><img class="kakao" src="/img/main_traffic/kakao_icon.png"></a>
		<img class="blackbox_logo pc" src="/img/main_traffic/blackbox_logo_pc2_w2.png">
	</div>
	
	<img class="lawyers pc" src="/img/main_traffic/lawyers.png">
	<img class="lawyers mobile" src="/img/main_traffic/lawyers_mobile.png">
	
	<div class="container1">
		<div class="swiper-container" id="first">
			<div class="swiper-wrapper">	
				<div class="swiper-slide first">
					<div class="consulting_container">
						<div class="container_title">
							형사사건로펌이 아닌<br>
						<span class="bold">교통음주특화로펌</span>이 필요한 이유
						</div>
						<img class="diagram pc" src="/img/main_traffic/section1_diagram.png">
						<img class="diagram mobile" src="/img/main_traffic/section1_diagram_mobile.png">
					</div>
				</div>
				<div class="swiper-slide first">
					<div class="consulting_container">
						<div class="container_title">
							회사원,공무원,교사 등 음주운전으로<br>
						<span class="bold">금고형 이상 선고시</span>
						</div>
						<img class="diagram pc" src="/img/main_traffic/section2_diagram.png">
						<img class="diagram mobile" src="/img/main_traffic/section2_diagram_mobile.png">
					</div>
				</div>
				
				<div class="swiper-slide second">
					<div class="consulting_container">
						<div class="container_title">
							교통음주 사건<br>
							<span class="bold">간편 상담신청</span>
						</div>
						<div class="consulting_application">
							<div class="text pc">성함과 연락처를 적어주시면 순차적으로 전화드려 상담을 도와드립니다</div>
							<div class="text mobile">성함과 연락처를 적어주시면<br>순차적으로 전화드려 상담을 도와드립니다</div>
							<div class="application">
								<label><div class="label">성　　　함</div><input id="name" name="name" type="text" placeholder="성함을 입력하세요" onclick="cursor_on();"></label><br>
								<label><div class="label">연　락　처</div><input id="tel" name="tel" type="text" placeholder="연락 가능한 번호를 입력하세요" onclick="cursor_on();"></label><br>
								<input id="current_url" name="current_url" type="hidden">
								<label><div class="label"> 상 담 분 야</div>
									<select id="category" name="category" onclick="cursor_on();">
										<option value="음주운전">음주운전</option>
										<option value="음주측정거부">음주측정거부</option>
										<option value="교통사고">교통사고</option>
										<option value="뺑소니">뺑소니</option>
										<option value="보복운전">보복운전</option>
										<option value="기타교통">기타교통</option>
									</select>
								</label><br>
								<div class="agree_area">
									<label for="agree"><input id="agree" name="agree" type="checkbox" value="1" onclick="cursor_on();"> 개인정보처리방침 동의</label><br>
									<span class="pc">*보내주신 성함과 연락처는 상담진행시에만 사용됩니다</span>
									<span class="mobile">*보내주신 성함과 연락처는<br>상담진행시에만 사용됩니다</span>
								</div>
								<span class="apply" onclick="submit();" onselectstart="return false">상담신청<span class="pc">하기</span></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="swiper-button-next" id="first"></div>
			<div class="swiper-button-prev" id="first"></div>
			<div class="swiper-pagination" id="first"></div>
		</div>
	</div>
</div>

<div class="certificate">
	<div class="container2">
		<?php
		$certificate_img_src = Array(
						'/img/main_traffic/증명서/certificate_1.jpg',
						'/img/main_traffic/증명서/certificate_2.png',
						'/img/main_traffic/증명서/certificate_3.png',
						'/img/main_traffic/증명서/certificate_4.png',
						'/img/main_traffic/증명서/certificate_5.png',
						'/img/main_traffic/증명서/certificate_6.png',
						'/img/main_traffic/증명서/certificate_7.png',
						'/img/main_traffic/증명서/certificate_8.png',
						'/img/main_traffic/증명서/certificate_9.png',
						'/img/main_traffic/증명서/certificate_10.png'
					);
		?>
		<div class="swiper-container" id="second">
			<div class="swiper-wrapper">	
				<?php for($i=0;$i<count($certificate_img_src);$i++){?>
					<div class="swiper-slide">
						<div class="img-box">
							<img src="<?php echo $certificate_img_src[$i]?>">
						</div>
					</div>
				<?php }?>
			</div>
		</div>
		<div class="swiper-button-next" id="second"></div>
		<div class="swiper-button-prev" id="second"></div>
	</div>
</div>

<script>
	function goTop(id){
		if(id == 'section1'){
			var offset = jQuery('html, body').offset();
		}else{
			var offset = jQuery("#" + id).offset();
		}
		
		if($(window).width() < 1025){
			offset.top = offset.top - jQuery('#section1 .top').outerHeight();
		}
		jQuery('html, body').animate({scrollTop: offset.top + 1}, 500);
	};

	
	var Swiper1 = new Swiper('#first.swiper-container',  {
		pagination: {
			el: '#first.swiper-pagination',
                  clickable : true,
		},
		navigation: {
			nextEl: '#first.swiper-button-next',
			prevEl: '#first.swiper-button-prev',
		},
		observer: true,
		observeParents: true,
		preloadImages: true,
		//loop: true,
		autoplay: {
		delay: 4000,
		},
	});
	
	var Swiper2 = new Swiper('#second.swiper-container',  {
		slidesPerView: 4,
		spaceBetween: 15,
		navigation: {
			nextEl: '#second.swiper-button-next',
			prevEl: '#second.swiper-button-prev',
		},
		observer: true,
		observeParents: true,
		preloadImages: true,
		loop: true,
		autoplay: {
		delay: 4000,
		},
		breakpoints : { // 반응형 설정이 가능 width값으로 조정
			700 : {
				slidesPerView : 4,
			},
			1000 : {
				slidesPerView : 8,
			},
		},
	});
	

	var move_true = false; // 이동되었는지 여부를 가리기위한 변수.
	
	$(window).on('scroll',function() {
		var scrolltop = $(window).scrollTop(); // 현재 스크롤 위치

		$(function (){
			if(location.href.indexOf('#section') != -1 && scrolltop < 10 && move_true == false){
				if(location.href.indexOf('http://') != -1){
					if(scrolltop < 10){
						setTimeout(goTop(location.href.replace('http://traffic.anlab.co.kr/#','')),1500);
						move_true = true;
					}
				}
				else if(location.href.indexOf('https://') != -1){
					if(scrolltop < 10){
						setTimeout(goTop(location.href.replace('https://traffic.anlab.co.kr/#','')),1500);
						move_true = true;
					}
				}
			}
		});
		
			
		// pc 화면 하단의 nav 메뉴, section2 영역 이하에 들어설 때 나타나게해주는 함수
		if($(window).width() > 770){
			if ($('#section1').height() / 2 > scrolltop) {
				jQuery('#section2 .nav_meun').fadeOut();
			}else{
				jQuery('#section2 .nav_meun').fadeIn();
			}
		}
		
		
		// 모바일에서 상단의 로고가 스크롤링 시에 바뀌도록 해주는 함수
		if($(window).width() < 1025){
			if(scrolltop > 10){
				if(jQuery('#section1 .top')[0].className.indexOf(' fixed') == -1){
					jQuery('#section1 .top')[0].className += ' fixed';
					jQuery('#section1 .top .logo.mobile')[0].src = jQuery('#section1 .top .logo.mobile')[0].src.replace('logo_w', 'logo_b');
				}
			}else{
				if(jQuery('#section1 .top')[0].className.indexOf(' fixed') != -1){
					jQuery('#section1 .top')[0].className = jQuery('#section1 .top')[0].className.replace(' fixed','');
					jQuery('#section1 .top .logo.mobile')[0].src = jQuery('#section1 .top .logo.mobile')[0].src.replace('logo_b', 'logo_w');
				}
			}
		}
		
		
		// 현재 스크롤의 위치에 따라 nav 메뉴의 버튼이 해당 section에 진입 시 클래스명 'selected'가 붙도록해주는 함수
		for(var i=1;i<7;i++){
			j = i + 1;
			if(i<6){
				if ($('#section'+i).offset().top - 300 <= scrolltop && $('#section'+j).offset().top - 300 > scrolltop) {
					if(jQuery('#section2 .nav_meun .menu_'+i)[0].className.indexOf(' selected') == -1){
						jQuery('#section2 .nav_meun .menu_'+i)[0].className += ' selected';
					}
				}else{
					jQuery('#section2 .nav_meun .menu_'+i)[0].className = jQuery('#section2 .nav_meun .menu_'+i)[0].className.replace(' selected','');
				}
			}else{
				if ($('#section'+i).offset().top - 300 <= scrolltop) {
					if(jQuery('#section2 .nav_meun .menu_'+i)[0].className.indexOf(' selected') == -1){
						jQuery('#section2 .nav_meun .menu_'+i)[0].className += ' selected';
					}
				}else{
					jQuery('#section2 .nav_meun .menu_'+i)[0].className = jQuery('#section2 .nav_meun .menu_'+i)[0].className.replace(' selected','');
				}
			}
		}
	});
	
	function checkVisible( elm, eval ) {
		eval = eval || "object visible";
		var viewportHeight = $(window).height(), // Viewport Height
			scrolltop = $(window).scrollTop(), // Scroll Top
			y = $(elm).offset().top,
			elementHeight = $(elm).height();   
    
		if (eval == "object visible") return ((y < (viewportHeight + scrolltop)) && (y > (scrolltop - elementHeight)));
		if (eval == "above") return ((y < (viewportHeight + scrolltop)));
	}
	
	
	// '간편 상담신청' input요소에 커서가 활성화 될 때 슬라이드의 오토플레이가 멈추도록 해주는 함수
	function cursor_on(){
		Swiper1.autoplay.stop();
	}
	
	jQuery('[name=current_url]').val(window.location.href);

	function submit() {
		if($('#name').val() == ''){
			alert('성함을 입력하세요');
			$('#name')[0].focus();
			return;
		}
		if($('#tel').val() == ''){
			alert('연락처를 입력하세요');
			$('#tel')[0].focus();
			return;
		}
		if($('#category').val() == ''){
			alert('상담분야를 선택하세요');
			$('#category')[0].focus();
			return;
		}
		if($('#agree')[0].checked != true){
			alert('간편 상담 신청은 개인정보처리방침에 동의 후 신청 가능합니다.');
			$('#agree')[0].focus();
			return;
		}

		
		var param = {
			"mode" : 'consulting',
			"name" : $('#name').val(),
			"tel" : $('#tel').val(),
			"category" : $('#category').val(),
			"url" : $('#current_url').val(),
			"agree" : $('#agree').val()
		};

		$.ajax({
			type: "POST",
			url: "/app/mail.php",
			timeout: 0,
			data: param,
			cache: false,
			dataType: "text",
			error: function(xhr, textStatus, errorThrown) {  alert("전송에 실패했습니다."); },
			success: function (data){
				if(data.indexOf('성공') != -1){
					console.log("통신 성공")
					alert($('#name').val() + '님의 상담 신청이 완료되었습니다.');
					window.location.reload();
				} else {
					alert(data);
					console.log(param)
				}
			}
		});
	}
</script>

<!-- 형량예측시스템 팝업 시작-->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">

<div class="popup_background">
	<div class="survey_popup">
		<div class="survey_header">
			<div class="row_1">
				<i class="xi-close" onclick="survey_popup_close()"></i>
				법무법인 에이앤랩<br>
				<span class="bold">음주운전 형량예측시스템</span>
			</div>
			<div class="row_2">
				교통음주 특화로펌 에이앤랩은 간단한 질의응답을 통해<br>
				형량을 계산하는 형량예측시스템을 운영하고 있습니다.<br>
				아래의 질문에 답변하여 제출해 주시면 <span class="under_bar"><br>축적된 데이터베이스를 기초로</span> 하여<br>
				형량을 예측한 뒤, 순차적으로 연락드리도록 하겠습니다.
			</div>
			<div class="survey_progress">
				<div class="progress_bar">
					<div class="progress_bar_inner" style="width:0%;"></div>
				</div>
				<div class="progress_number">
					<span class="selected_count">0</span> / <span class="total_count"></span>
				</div>
			</div>
		</div>
		<div class="survey_area">
			<div class="question_box">
				<div class="question_text"><span class="number">01</span> 음주측정 당시 혈중알코올농도 수치는 얼마였습니까?</div>
				<div class="answers">
					<label class="radio_btn" for="question_1_1"><input type="radio" name="question_1" id="question_1_1" value="0.03% ~ 0.08%" onclick="survey_check(1)">0.03% ~ 0.08%</label>
					<label class="radio_btn" for="question_1_2"><input type="radio" name="question_1" id="question_1_2" value="0.08% ~ 0.2%" onclick="survey_check(1)">0.08% ~ 0.2%</label>
					<label class="radio_btn" for="question_1_3"><input type="radio" name="question_1" id="question_1_3" value="0.02% 이상" onclick="survey_check(1)">0.02% 이상</label>
					<input type="hidden" id="question_1">
				</div>
			</div>
			
			<div class="question_box">
				<div class="question_text"><span class="number">02</span> 음주운전으로 처벌받은 전력이 있습니까?</div>
				<div class="answers">
					<label class="radio_btn" for="question_2_1"><input type="radio" name="question_2" id="question_2_1" value="없음" onclick="survey_check(2)">없음</label>
					<label class="radio_btn" for="question_2_2"><input type="radio" name="question_2" id="question_2_2" value="1회" onclick="survey_check(2)">1회</label>
					<label class="radio_btn" for="question_2_3"><input type="radio" name="question_2" id="question_2_3" value="2회" onclick="survey_check(2)">2회</label>
					<label class="radio_btn" for="question_2_4"><input type="radio" name="question_2" id="question_2_4" value="3회" onclick="survey_check(2)">3회</label>
					<label class="radio_btn" for="question_2_5"><input type="radio" name="question_2" id="question_2_5" value="4회 이상" onclick="survey_check(2)">4회 이상</label>
					<input type="hidden" id="question_2">
				</div>
			</div>
			
			<div class="question_box">
				<div class="question_text"><span class="number">03</span> 음주운전으로 처벌받은 마지막 년도는 언제입니까?</div>
				<div class="answers">
					<input type="text" id="question_3" name="question_3" placeholder="ex) 2013년 8월">
				</div>
			</div>
			
			<div class="question_box">
				<div class="question_text"><span class="number">04</span> 집행유예 또는 누범기간 중 적발되었습니까?</div>
				<div class="answers">
					<label class="radio_btn" for="question_4_1"><input type="radio" name="question_4" id="question_4_1" value="집행유예 기간 중" onclick="survey_check(4)">집행유예 기간 중</label>
					<label class="radio_btn" for="question_4_2"><input type="radio" name="question_4" id="question_4_2" value="누범기간 중" onclick="survey_check(4)">누범기간 중</label>
					<label class="radio_btn" for="question_4_3"><input type="radio" name="question_4" id="question_4_3" value="해당사항 없음" onclick="survey_check(4)">해당사항 없음</label>
					<input type="hidden" id="question_4">
				</div>
			</div>
			
			<div class="question_box">
				<div class="question_text"><span class="number">05</span> 대리기사를 호출한 사실이 있습니까?</div>
				<div class="answers">
					<label class="radio_btn" for="question_5_1"><input type="radio" name="question_5" id="question_5_1" value="있음" onclick="survey_check(5)">있음</label>
					<label class="radio_btn" for="question_5_2"><input type="radio" name="question_5" id="question_5_2" value="없음" onclick="survey_check(5)">없음</label>
					<input type="hidden" id="question_5">
				</div>
			</div>
			
			<div class="question_box">
				<div class="question_text"><span class="number">06</span> 생계형 운전자입니까? (운수업 종사자)</div>
				<div class="answers">
					<label class="radio_btn" for="question_6_1"><input type="radio" name="question_6" id="question_6_1" value="해당사항 있음" onclick="survey_check(6)">해당사항 있음</label>
					<label class="radio_btn" for="question_6_2"><input type="radio" name="question_6" id="question_6_2" value="해당사항 없음" onclick="survey_check(6)">해당사항 없음</label>
					<input type="hidden" id="question_6">
				</div>
			</div>
			
			<div class="question_box">
				<div class="question_text"><span class="number">07</span> 기타 양형에 참작될만한 특별한 사정이 있다면 기재해 주세요.</div>
				<div class="answers">
					<textarea id="question_7" name="question_7" placeholder="ex) 없음&#13;&#10;ex) 대리기사 호출 후 주차 위치만 변경했다&#13;&#10;ex) 차에서 대리기사를 기다리다 오작동 되었다 등"></textarea>
				</div>
			</div>
			
			<div class="question_box">
				<div class="question_text"><span class="number">08</span> 형량 예측 후 결과를 받으실 연락처와 성함을 입력해 주세요</div>
				<div class="answers">
					<label>성함 <input type="text" id="question_8_name" name="question_8" placeholder="익명 가능"></label>
					<label>연락처 <input type="text" id="question_8_tel" name="question_8" placeholder="010-0000-0000"></label>
					<input id="survey_current_url" name="survey_current_url" type="hidden">
				</div>
			</div>
			
			<div class="survey_agree">
				<label class="radio_btn" for="survey_agree"><input id="survey_agree" name="survey_agree" type="radio" value="1">개인정보처리방침 동의 <span>(보내주신 정보는 상담진행시에만 사용됩니다)</span></label>
			</div>
			
			<div class="survey_btn" onclick="survey_submit()">제출하기</div>
		</div>
	</div>
</div>

<script>
	function survey_popup_open(){
		jQuery('.popup_background').fadeIn();
	}

	function survey_popup_close(){
		jQuery('.popup_background').fadeOut();
	}
	
	jQuery('[name=survey_current_url]').val(window.location.href);
	
	function survey_submit(){
		if(parseInt(jQuery('.selected_count')[0].innerText) != jQuery('.question_box').length){
			alert('모든 질문에 응답해주세요');
			return;
		}
		if($('#survey_agree')[0].checked != true){
			alert('형량예측시스템은 개인정보처리방침에 동의 후 제출 가능합니다.');
			$('#survey_agree')[0].focus();
			return;
		}
		
		var param = {
			"mode" : 'survey',
			"answer_1" : $('#question_1').val(),
			"answer_2" : $('#question_2').val(),
			"answer_3" : $('#question_3').val(),
			"answer_4" : $('#question_4').val(),
			"answer_5" : $('#question_5').val(),
			"answer_6" : $('#question_6').val(),
			"answer_7" : $('#question_7').val(),
			"answer_8_name" : $('#question_8_name').val(),
			"answer_8_tel" : $('#question_8_tel').val(),
			"url" : $('#survey_current_url').val(),
			"survey_agree" : $('#survey_agree').val(),
			"question_1" : jQuery('.question_text')[0].innerText,
			"question_2" : jQuery('.question_text')[1].innerText,
			"question_3" : jQuery('.question_text')[2].innerText,
			"question_4" : jQuery('.question_text')[3].innerText,
			"question_5" : jQuery('.question_text')[4].innerText,
			"question_6" : jQuery('.question_text')[5].innerText,
			"question_7" : jQuery('.question_text')[6].innerText,
			"question_8" : jQuery('.question_text')[7].innerText
		};
		
		$.ajax({
			type: "POST",
			url: "/app/mail.php",
			timeout: 0,
			data: param,
			cache: false,
			dataType: "text",
			error: function(xhr, textStatus, errorThrown) {  alert("전송에 실패했습니다."); },
			success: function (data){
				if(data.indexOf('성공') != -1){
					console.log("통신 성공")
					alert($('#question_8_name').val() + '님의 형량예측시스템 신청이 완료되었습니다.');
					window.location.reload();
					//survey_popup_close();
				} else {
					alert(data);
					console.log(param)
				}
			}
		});
	}


	$(function (){
		jQuery('.total_count')[0].innerText = jQuery('.question_box').length;
		
		if($(window).width() < 770){ // 모바일 기기일 때 팝업창 survey_area 영역의 높이가 화면의 50%가 되도록 해주는 함수
			jQuery('.popup_background .survey_popup .survey_area').outerHeight((window.innerHeight / 10) * 5)
		}
	});
	
	var checked_array = []; // 체크된 문항들을 저장시키기 위한 배열.
	
	function survey_check(number){
		for(var i=0;i<jQuery('[name=question_'+number+']').length;i++){
			if(jQuery('[name=question_'+number+']')[i].checked == true){
				jQuery('#question_'+number).val(jQuery('[name=question_'+number+']')[i].value);
				
				if(checked_array.indexOf(number) == -1){// '체크된 문항들 배열' 중에 '현재 문항(number)'이 없다면 현재 if문 실행.
					jQuery('.selected_count')[0].innerText = parseInt(jQuery('.selected_count')[0].innerText) + 1;
					jQuery('.progress_bar_inner')[0].style.width = (100 / jQuery('.question_box').length) * jQuery('.selected_count')[0].innerText + '%';
					checked_array.push(number);
					console.log(checked_array)
				}
			}
		}
	}
	
	$('#question_3, #question_7').keyup(function() {
		survey_text_check(event.target.id.replace('question_',''));
	})
	
	function survey_text_check(number){
		var number = parseInt(number);
		if($('#question_'+number).val() != '' && checked_array.indexOf(number) == -1){// '체크된 문항들 배열' 중에 '현재 문항(number)'이 없다면 현재 if문 실행.
			jQuery('.selected_count')[0].innerText = parseInt(jQuery('.selected_count')[0].innerText) + 1;
			jQuery('.progress_bar_inner')[0].style.width = (100 / jQuery('.question_box').length) * jQuery('.selected_count')[0].innerText + '%';
			checked_array.push(number);
			console.log(checked_array)
		}
		else if(checked_array.indexOf(number) != -1 && $('#question_'+number).val() == ''){
			jQuery('.selected_count')[0].innerText = parseInt(jQuery('.selected_count')[0].innerText) - 1;
			jQuery('.progress_bar_inner')[0].style.width = (100 / jQuery('.question_box').length) * jQuery('.selected_count')[0].innerText + '%';
			for(var i=0;i<checked_array.length;i++){
				if(checked_array[i] === number){
					checked_array.splice(i, 1);
					console.log('제거함')
					break;
				}
			}
			console.log(checked_array)
		}
	}
	
	$('#question_8_name, #question_8_tel').keyup(function() {
		if($('#question_8_name').val() != '' && $('#question_8_tel').val() != '' && checked_array.indexOf(8) == -1){
			jQuery('.selected_count')[0].innerText = parseInt(jQuery('.selected_count')[0].innerText) + 1;
			jQuery('.progress_bar_inner')[0].style.width = (100 / jQuery('.question_box').length) * jQuery('.selected_count')[0].innerText + '%';
			checked_array.push(8);
			console.log(checked_array)
		}
		else if(checked_array.indexOf(8) != -1 && ($('#question_8_name').val() == '' || $('#question_8_tel').val() == '')){
			jQuery('.selected_count')[0].innerText = parseInt(jQuery('.selected_count')[0].innerText) - 1;
			jQuery('.progress_bar_inner')[0].style.width = (100 / jQuery('.question_box').length) * jQuery('.selected_count')[0].innerText + '%';
			for(var i=0;i<checked_array.length;i++){
				if(checked_array[i] === 8){
					checked_array.splice(i, 1);
					console.log('제거함')
					break;
				}
			}
			console.log(checked_array)
		}
	})
</script>
<!-- 형량예측시스템 팝업 끝-->


<main>
	<!-- section2 -->
    <section id="section2">
		<img class="logo pc" src="/img/main_traffic/logo_b.png">
		<img class="blackbox_logo2 pc" src="/img/main_traffic/blackbox_logo_pc2_b.png">
		<div class="top pc">
			<?php echo $system_btn_html;?>
			<a class="tel_box" href="tel:<?php echo $tel?>"><?php echo $tel?></a>
			<a href="<?php echo $kakao?>"><img class="kakao" src="/img/main_traffic/kakao_icon.png"></a>
		</div>
        <div class="container">
            <div class="row no-gutters fade-item">
                <div class="col-lg-12">
                    <div class="section__title">
                        <h2 style="text-align: center;">교통음주 성공사례 <a class="more_view_btn" href="http://traffic.anlab.co.kr/업무사례/">더보기</a></h2>
                    </div>
                </div>
            </div>
		</div>
		<div class="latest_container fade-item">
			<?=do_shortcode('[kboard_latest id="2" url="http://traffic.anlab.co.kr/업무사례/" rpp="1000"]')?>
		</div>
		<div class="gratitude_greeting fade-item">
			<span class="title">의뢰인 감사인사</span>
			<?php
			$gratitude_greeting_img_src = Array(
							'/img/main_traffic/감사인사/thx_1.png',
							'/img/main_traffic/감사인사/thx_2.png',
							'/img/main_traffic/감사인사/thx_3.png',
							'/img/main_traffic/감사인사/thx_4.png',
							'/img/main_traffic/감사인사/thx_5.png',
							'/img/main_traffic/감사인사/thx_6.png',
							'/img/main_traffic/감사인사/thx_7.png',
							'/img/main_traffic/감사인사/thx_8.png',
							'/img/main_traffic/감사인사/thx_9.png'
						);
			?>
			<div class="swiper-container" id="gratitude_greeting">
				<div class="swiper-wrapper">	
					<?php for($i=0;$i<count($gratitude_greeting_img_src);$i++){?>
						<div class="swiper-slide">
							<div class="img-box">
								<img src="<?php echo $gratitude_greeting_img_src[$i]?>">
							</div>
						</div>
					<?php }?>
				</div>
			</div>
		</div>
		
		<nav class="nav_meun">
			<img class="blackbox_logo mobile" src="/img/main_traffic/blackbox_logo_mobile.png">
			<ul>
				<li class="menu_1 selected" onclick="goTop('section1');" onselectstart="return false">에이앤랩</li>
				<li class="menu_2" onclick="goTop('section2');" onselectstart="return false">성공사례</li>
				<li class="menu_3" onclick="goTop('section3');" onselectstart="return false">변호사소개</li>
				<li class="menu_4" onclick="goTop('section4');" onselectstart="return false">음주<span class="pc">운전 / 측정거부</span></li>
				<li class="menu_5" onclick="goTop('section5');" onselectstart="return false">교통사고<span class="pc"> / 뺑소니</span></li>
				<li class="menu_6" onclick="goTop('section6');" onselectstart="return false">상담<span class="pc">안내</span></li>
			</ul>
		</nav>
	</section>
	<script>
		var gratitude_greeting_Swiper = new Swiper('#gratitude_greeting.swiper-container',  {
			slidesPerView: 2,
			spaceBetween: 15,
			observer: true,
			observeParents: true,
			preloadImages: true,
			loop: true,
			autoplay: {
			delay: 4000,
			},
			breakpoints : { // 반응형 설정이 가능 width값으로 조정
				700 : {
					slidesPerView : 4,
				},
				1000 : {
					slidesPerView : 5,
					centeredSlides: true,
				},
			},
		});
	</script>


	<!-- section3 -->
	<section id="section3">
		<img class="logo pc" src="/img/main_traffic/logo_w2.png">
		<img class="blackbox_logo2 pc" src="/img/main_traffic/blackbox_logo_pc2_w.png">
		<div class="top pc">
			<?php echo $system_btn_html;?>
			<a class="tel_box" href="tel:<?php echo $tel?>"><?php echo $tel?></a>
			<a href="<?php echo $kakao?>"><img class="kakao" src="/img/main_traffic/kakao_icon.png"></a>
		</div>
        <div class="container">
			<div class="section_title mobile fade-item">
				교통음주 전문변호사
			</div>
		
            <div class="left_side">
				<div class="page first fade-item" style="display:block;">
					<div class="sub_title">[사법시험]</div>
					<div class="title">서울중앙지검 검사출신</div>
					<div class="name">대표변호사 유선경</div>
					<br>
					고려대학교 법학과<br>
					제49회 사법시험 합격 / 제40기 사법연수원 수료<br>
					<br>
					前 서울중앙지방검찰청 검사<br>
					前 춘천지방검찰청 강릉지청 검사<br>
					前 법무법인(유) 태평양 변호사<br>
					<br>
					<span class="case_text">[CASE]</span><br>
					윤창호법위헌 재심청구하여 벌금 900만원 감액<br>
					교통사고 사망사건에서 운전자 변호해 벌금형 선고<br>
					음주운전 혐의를 받던 피고인 변호하여 무혐의 결정<br>
					면직위기의 회사임원 변호하여 구약식(벌금) 처분<br>
					뺑소니 사고 일으킨 피고인 변호하여 집행유예<br>
					외 다수
				</div>
				
				<div class="page second">
					<div class="sub_title">[사법시험]</div>
					<div class="title">태평양출신 형사법전문</div>
					<div class="name">대표변호사 조건명</div>
					<br>
					연세대학교 법학과<br>
					제53회 사법시험 합격 / 제43기 사법연수원 수료<br>
					<br>
					現 대한변협 등록 형사법 전문 변호사<br>
					前 법무법인(유) 태평양 변호사<br>
					前 법무부 법조인력과 법무관<br>
					<br>
					<span class="case_text">[CASE]</span><br>
					음주운전혐의 의뢰인 변호해 불송치(무혐의)결정<br>
					음주운전 2회, 음주측정거부 집행유예 판결<br>
					뺑소니(도주치상)혐의 피의자 변호하여 무혐의 처분<br>
					음주운전 3회 실형위기 피고인 집행유예 처분<br>
					음주운전 상해사고, 집행유예 처분<br>
					외 다수
				</div>
				
				<div class="page third">
					<div class="sub_title">[사법시험]</div>
					<div class="title">경찰서 자문변호사</div>
					<div class="name">대표변호사 김동우</div>
					<br>
					연세대학교 법학과<br>
					제53회 사법시험 합격 / 제43기 사법연수원 수료<br>
					<br>
					現 대한변협 등록 형사법 전문 변호사<br>
					現 서울수서경찰서 자문 변호사<br>
					現 과천경찰서 자문변호사<br>
					<br>
					<span class="case_text">[CASE]</span><br>
					음주운전 혐의를 받던 피고인 변호하여 무혐의 결정<br>
					음주운전 4회로 실형 위기에서 구약식(벌금형) 처분<br>
					동종전과가 있는 무면허운전자, 항소심에서 감형<br>
					무면허음주 실형받은 피고인 항소심서 집행유예로 감형<br>
					만취상태로 대인교통사고 피고인 변호하여 벌금형<br>
					외 다수
				</div>
				
				<div class="page fourth">
					<div class="sub_title">[사법시험]</div>
					<div class="title">교통범죄 합의 전문</div>
					<div class="name">대표변호사 박현식</div>
					<br>
					고려대학교 법학과 / 동대학원 석사,박사<br>
					제52회 사법시험 합격 / 제43기 사법연수원 수료<br>
					<br>
					前 서울중앙지방검찰청 법무관<br>
					前 인천지방검찰청 부천지청 법무관<br>
					前 수원지방검찰청 안산지청 검사직무대리<br>
					<br>
					<span class="case_text">[CASE]</span><br>
					운전 중 사망사고 일으킨 피의자 변호하여 기소유예<br>
					음주운전3회 실형위기 피고인 변호하여 집행유예<br>					
					음주운전 혐의를 받던 피고인 변호하여 무혐의 결정<br>
					뺑소니사고 일으킨 운전업종사자 집행유예<br>
					음주수치 0.2%이상임에도 법정형보다 낮은 벌금형<br>
					외 다수
				</div>
				
				<div class="page fifth">
					<div class="sub_title">[사법시험]</div>
					<div class="title">면허구제 행정법전문</div>
					<div class="name">대표변호사 신상민</div>
					<br>
					고려대학교 법학과 / 동대학원 석사,박사<br>
					제51회 사법시험 합격 / 제42기 사법연수원 수료<br>
					<br>
					現 산업통상자원부 고문 변호사<br>
					現 고려대학교 법학전문대학원 겸임교수<br>
					現 대한변협 등록 행정법 전문 변호사<br>
					<br>
					<span class="case_text">[CASE]</span><br>
					교통사망사건 피의자 변호하여 약식기소 결정<br>
					음주운전3회 피고인 변호하여 집행유예 판결<br>
					동종전과가 있는 무면허운전자, 항소심에서 감형<br>
					음주교통사고 피해자 4명, 집행유예 판결<br>
					횡단보도 교통사망사건 피고인, 벌금형<br>
					외 다수
				</div>
			</div>
			<div class="right_side">
				<div class="lawer_name">
					<li class="name on" onclick="lawer_on(0);" onselectstart="return false">유선경</li>
					<li class="name" onclick="lawer_on(1);" onselectstart="return false">조건명</li>
					<li class="name" onclick="lawer_on(2);" onselectstart="return false">김동우</li>
					<li class="name" onclick="lawer_on(3);" onselectstart="return false">박현식</li>
					<li class="name" onclick="lawer_on(4);" onselectstart="return false">신상민</li>
				</div>
			
				<div class="lawer_img first fade-item" style="display:inline-block;"></div>
				<div class="lawer_img second"></div>
				<div class="lawer_img third"></div>
				<div class="lawer_img fourth"></div>
				<div class="lawer_img fifth"></div>
			</div>
		</div>
	</section>
	
	<script>
		function lawer_on(number){
			if(event.target.className.indexOf(' on') == -1){
				for(var i=0;i<jQuery('.lawer_name .name').length;i++){
					jQuery('.lawer_name .name')[i].className = 'name';

					jQuery('.left_side .page').eq(i).fadeOut();
					jQuery('.right_side .lawer_img').eq(i).fadeOut();
				}
				event.target.className += ' on';

				var page = jQuery('.left_side .page').eq(number);
				var lawer_img = jQuery('.right_side .lawer_img').eq(number);

				page.fadeIn();
				lawer_img.fadeIn();
			}
		}
	</script>
	
	
	<!-- section4 -->
	<section id="section4">
		<img class="logo pc" src="/img/main_traffic/logo_b.png">
		<img class="blackbox_logo2 pc" src="/img/main_traffic/blackbox_logo_pc2_b.png">
		<div class="top pc">
			<?php echo $system_btn_html;?>
			<a class="tel_box" href="tel:<?php echo $tel?>"><?php echo $tel?></a>
			<a href="<?php echo $kakao?>"><img class="kakao" src="/img/main_traffic/kakao_icon.png"></a>
		</div>
		<div class="container">
            <div class="row no-gutters fade-item">
                <div class="col-lg-12">
                    <div class="section__title">
                        <h2 style="text-align: center;">음주운전 FAQ</h2>
                    </div>
                </div>
            </div>
		</div>
	
        <div class="container faq fade-item">
			<?php
			$drunk_question_menu = array(
							0 => '음주운전 처벌은<br>어떻게 되죠?',
							1 => '음주측정을<br>거부했습니다',
							2 => '면허구제를<br>받을 수 있나요?',
							3 => '변호인 선임이<br>필요할까요?'
							);
			?>
			<div class="question_menu pc">
				<li class="question on" onclick="drunk_question_on(0)" onselectstart="return false"><?php echo $drunk_question_menu[0]?></li>
				<li class="question" onclick="drunk_question_on(1)" onselectstart="return false"><?php echo $drunk_question_menu[1]?></li>
				<li class="question" onclick="drunk_question_on(2)" onselectstart="return false"><?php echo $drunk_question_menu[2]?></li>
				<li class="question" onclick="drunk_question_on(3)" onselectstart="return false"><?php echo $drunk_question_menu[3]?></li>
				<li class="question dummy" onselectstart="return false" style="background:unset; border:unset; box-shadow:unset;"></li>
				<!--<a href="#"><li class="system_application" onselectstart="return false">형량예측시스템<br>신청하기</li></a>-->
			</div>
			
			<div class="question_menu mobile">
				<div class="swiper-container" id="drunk_question_menu">
					<div class="swiper-wrapper">	
						<?php for($i=0;$i<count($drunk_question_menu);$i++){?>
							<div class="swiper-slide">
								<li class="question<?php if($i == 0){?> on<?php }?>" onclick="drunk_question_on(<?php echo $i?>)" onselectstart="return false"><?php echo $drunk_question_menu[$i]?></li>
							</div>
						<?php }?>
					</div>
				</div>
				<div class="swiper-button-next" id="drunk_question_menu"></div>
				<div class="swiper-button-prev" id="drunk_question_menu"></div>
			</div>
			
            <div class="answer_box">
				<div class="answer first" style="display:block;">
					음주로 인한 인명 피해 사례가 자주 보도되며 음주운전 처벌이 강화되고 있고, 초범이거나 단순 적발이어도 실형이 선고되는 경우도 있습니다.<br>
					<br>
					특히 음주운전으로 인명 사고를 낸 경우라면 특정범죄가중처벌법에 따라 가중처벌 되고, 3회 이상 음주, 0.2% 이상의 혈중알코올농도 수치, 음주 사고 후 뺑소니, 집행유예 기간 중 음주운전 등의 경우에는 구속 대상이 되므로 주의가 필요합니다.<br>
					<br>
					또한 기존에 음주운전 전과가 있는 경우 벌금으로 끝나지 않고 검찰에서 형사재판으로 회부하는 경우가 많으며, 재판에 회부된 이상 실형 가능성도 배제할 수 없습니다.<br>
					<br>
					따라서 음주운전 단속에 적발되었다면 반드시 경찰조사 초기 단계부터 음주운전 전문 변호사를 통해 경찰조사 이전 단계부터 재판에 이르기까지 밀착 변호를 받을 필요가 있습니다.
				</div>
				
				<div class="answer second">
					음주측정거부죄는 1년 이상 5년 이하의 징역이나 500만원 이상 2천만원 이하의 벌금에 처한다고 규정하고 있습니다.<br>						
					<br>
					대부분 과거에 음주운전 전력이 있어 추가 적발 시 중한 처벌을 받을까봐 음주측정을 거부하게 되는데, 음주측정거부는 단순 음주운전에 비해 죄질이 더 나쁘다고 평가되어 중한 형이 선고될 수 있고, 경우에 따라 공무집행방해 혐의도 추가될 수 있어 주의가 필요합니다. <br>
					<br>
					다만, 경찰관으로부터 음주측정을 요구받았을 때 ‘술에 취한 상태에 있다고 인정할 만한 상당한 이유’가 있는 상태였어야 범죄가 성립하게 되므로, 경우에 따라 무혐의 처분도 가능합니다. <br>
					<br>
					무고함을 주장하여 무혐의를 받을 것인지, 아니면 자백을 하고 감형을 받아야 하는지, 음주운전 전문 변호사로부터 정확하게 판단을 받고, 전략에 맞게 조사에 임해야 합니다.
				</div>
				
				<div class="answer third">
					음주운전에 적발되면 최소 면허 정지부터 면허 취소까지 행정적 처분이 뒤따르게 됩니다. 또한 일정 기간의 결격기간이 주어져 그동안 면허를 재취득하지 못하도록 하고 있습니다.<br>
					<br>
					만약 운전을 업으로 하는 경우라면 생계가 위험해질 수 있는 상황에 처해질 수도 있으므로, 음주운전 면허 취소 기간이 너무 길거나 처분이 부당하다고 판단된다면 이의신청, 행정심판, 행정소송을 통해 구제받을 수 있습니다.<br>
					<br>
					다만 혈중알코올농도 0.12%를 초과하는 경우, 인명 사고를 일으킨 경우, 음주측정에 불응한 경우 등은 구제가능성이 매우 낮습니다.
				</div>
				
				<div class="answer fourth">
					음주운전 사건은 경찰조사가 짧은 시간 내에 형식적으로 진행되고, 검찰 조사는 대부분 진행되지 않아, 음주운전 혐의를 받는 사람들은 자신에게 유리한 내용을 진술할 기회를 부여받지 못하고, 본인에게 유리한 자료도 제출하지 못한 상태로 수사가 종결되고 형을 선고받게 됩니다. 이는 곧 불리한 결과를 의미합니다.<br>
					<br>
					음주에 적발된 직후에 음주운전 전문 변호사를 선임한다면, 당장 진행될 경찰조사에서부터 든든한 조력을 받으실 수 있습니다. 구체적인 사건 내용에 따라 혐의 인정/부인에 대한 전략을 설정하고, 그에 맞추어 경찰 조사에 임할 수 있습니다. <br>
					<br>
					교통음주 특화 에이앤랩은 수많은 음주운전 사건을 다룬 경험과 실력을 바탕으로 우리만의 감형, 무혐의, 무죄 노하우를 보유하고 있습니다.<br>
					<br>
					심적으로 불안한 의뢰인들을 위해 경찰서 조사 동행을 비롯하여, 사건의 재구성, 마디모분석 등을 통해 유리한 정황들을 찾아내고 수사기관에 적극 어필함으로써 무혐의부터 처벌 수위를 낮추기 위한 도움을 드리고 있습니다. 
				</div>
			</div>
		</div>
	</section>
	
	<script>
		function drunk_question_on(number){
			if(event.target.className.indexOf(' on') == -1){
				for(var i=0;i<jQuery('#section4 .question_menu .question').length;i++){
					jQuery('#section4 .question_menu .question')[i].className = 'question';

					jQuery('#section4 .answer_box .answer').eq(i).fadeOut();
				}
				event.target.className += ' on';

				var answer = jQuery('#section4 .answer_box .answer').eq(number);

				answer.fadeIn();
			}
		}
		
		var drunk_question_menu_Swiper = new Swiper('#drunk_question_menu.swiper-container',  {
			slidesPerView: 2,
			spaceBetween: 5,
			navigation: {
				nextEl: '#drunk_question_menu.swiper-button-next',
				prevEl: '#drunk_question_menu.swiper-button-prev',
			},
			observer: true,
			observeParents: true,
			preloadImages: true,
			/*loop: true,
			autoplay: {
			delay: 4000,
			},*/
			breakpoints : { // 반응형 설정이 가능 width값으로 조정
				700 : {
					slidesPerView : 2,
				},
			},
		});
	</script>
	
	
	<!-- section5 -->
	<section id="section5">
		<img class="logo pc" src="/img/main_traffic/logo_b.png">
		<img class="blackbox_logo2 pc" src="/img/main_traffic/blackbox_logo_pc2_b.png">
		<div class="top pc">
			<?php echo $system_btn_html;?>
			<a class="tel_box" href="tel:<?php echo $tel?>"><?php echo $tel?></a>
			<a href="<?php echo $kakao?>"><img class="kakao" src="/img/main_traffic/kakao_icon.png"></a>
		</div>
		<div class="container">
            <div class="row no-gutters fade-item">
                <div class="col-lg-12">
                    <div class="section__title">
                        <h2 style="text-align: center;">교통사고/뺑소니 FAQ</h2>
                    </div>
                </div>
            </div>
		</div>
	
        <div class="container faq fade-item">
			<!--<?php
			$accident_question_menu = array(
									0 => '뺑소니 사고를<br>냈습니다',
									1 => '사망,상해사고를<br>일으켰어요',
									2 => '음주뺑소니를<br> 저질렀어요',
									3 => '변호인 선임 시<br>뭐가 달라지죠?'
									);
			?>-->
			<div class="question_menu pc">
				<li class="question on" onclick="accident_question_on(0)" onselectstart="return false"><?php echo $accident_question_menu[0]?></li>
				<li class="question" onclick="accident_question_on(1)" onselectstart="return false"><?php echo $accident_question_menu[1]?></li>
				<li class="question" onclick="accident_question_on(2)" onselectstart="return false"><?php echo $accident_question_menu[2]?></li>
				<li class="question" onclick="accident_question_on(3)" onselectstart="return false"><?php echo $accident_question_menu[3]?></li>
			</div>
			
			<div class="question_menu mobile">
				<div class="swiper-container" id="accident_question_menu">
					<div class="swiper-wrapper">	
						<?php for($i=0;$i<count($accident_question_menu);$i++){?>
							<div class="swiper-slide">
								<li class="question<?php if($i == 0){?> on<?php }?>" onclick="accident_question_on(<?php echo $i?>)" onselectstart="return false"><?php echo $accident_question_menu[$i]?></li>
							</div>
						<?php }?>
					</div>
				</div>
				<div class="swiper-button-next" id="accident_question_menu"></div>
				<div class="swiper-button-prev" id="accident_question_menu"></div>
			</div>
			
            <div class="answer_box">
				<div class="answer first" style="display:block;">
					교통사고로 상대방 차량에 피해를 입혔음에도 필요한 조치 등을 하지 않고 그대로 현장을 떠난 경우, 도로교통법(사고후미조치)위반죄가 성립할 수 있습니다.<br><br>

					교통사고로 상대 운전자 또는 동승자가 상해를 입거나 사망했음에도, 구호조치, 인적사항 제공 등을 하지 않고 그대로 현장을 떠난 경우, 특가법(도주치상, 도주치사)위반죄가 성립할 수 있습니다. 물적피해만 일으키고 도주한 경우보다 가중처벌되어 구속되거나 실형이 선고될 가능성이 매우 높습니다.<br><br>

					뺑소니는 피해정도, 사고 발생인식 여부,  피해자와의 합의 여부 등 여러 사정을 고려하여 처벌수위가 정해지므로, 교통사고 전문 변호사의 조력을 받아 CCTV, 블랙박스 분석 등을 통해 사실관계를 명확히 하고, 도주의 고의, 양형사유 등 법리적 주장으로 무혐의/무죄/감형을 받을 수 있습니다.
				</div>
				
				<div class="answer second">
					교통사고를 일으켜 상대방 운전자 또는 동승자가 사망하거나 상해를 입은 경우, 교통사고처리특례법에 따라 처벌받을 수 있습니다.<br><br>

					다만, 상대방 운전자 또는 동승자가 상해를 입은 경우라면, 피해자와 합의를 통해 처벌을 면할 수 있습니다. 따라서, 이 경우 피해자와 합의는 필수적이라 하겠습니다. 다만 피해자와의 합의는 신중하게 접근하여야 하므로, 교통사고 전문 변호사를 통하여 피해자와 원만한 합의를 이끌어 내는 것이 필요합니다.
				</div>
				
				<div class="answer third">
					음주뺑소니는 일반뺑소니에 비하여 죄질이 좋지 않기에 구속가능성이 매우 높은 범죄이므로, 수사단계에서부터 적극적으로 대응할 필요가 있습니다. <br><br>

					음주뺑소니의 경우 피해자와 합의하였더라도, 처벌을 면할 수는 없으나 피해자에게 사죄하고 원만한 합의를 통하여 구속을 피하고, 형을 감경받을 수 있습니다.<br><br>

					교통사고 전문 변호사의 조력을 통해 피해자와 원만한 합의를 이끌어 내고, 도주 당시 인식상태, 상황 등을 유리한 양형사유를 적극적으로 주장하여 실형 선고를 면할 수 있습니다.
				</div>
				
				<div class="answer fourth">
					교통사고 사건의 경우, CCTV, 블랙박스 영상을 과학적으로 분석하여, 사고 당시의 상황을 정확하게 파악한 후 수사 및 재판에 대응해야 합니다. 에이앤랩은 자체적으로 과학적인 블랙박스, CCTV 영상 분석시스템을 도입하고 있고, 분석 전문업체와도 협업하고 있습니다. <br><br>

					또한, 피해자와의 합의는 사건을 종결시키거나 유리한 양형사유로 작용할 수 있습니다. 교통사고 전문 변호사는 전문적인 합의 노하우를 바탕으로 피해자의 마음을 어루만져주는 동시에 원만한 합의를 이끌어 낼 수 있습니다.<br><br>

					음주/교통 특화로펌 법무법인 에이앤랩은 갑작스러운 사고와 수사에 걱정하는 의뢰인을 위하여 교통사고 경찰, 검찰 조사 동행을 비롯하여, CCTV, 블랙박스 영상 분석으로 사건의 재구성 등을 통해 유리한 정황들을 찾아내고, 이를 수사기관에 적극 주장함으로써 무혐의, 무죄, 감경을 위한 도움을 드립니다. 
				</div>
		</div>
	</section>
	
	<script>
		function accident_question_on(number){
			if(event.target.className.indexOf(' on') == -1){
				for(var i=0;i<jQuery('#section5 .question_menu .question').length;i++){
					jQuery('#section5 .question_menu .question')[i].className = 'question';

					jQuery('#section5 .answer_box .answer').eq(i).fadeOut();
				}
				event.target.className += ' on';

				var answer = jQuery('#section5 .answer_box .answer').eq(number);

				answer.fadeIn();
			}
		}
		
		var accident_question_menu_Swiper = new Swiper('#accident_question_menu.swiper-container',  {
			slidesPerView: 2,
			spaceBetween: 5,
			navigation: {
				nextEl: '#accident_question_menu.swiper-button-next',
				prevEl: '#accident_question_menu.swiper-button-prev',
			},
			observer: true,
			observeParents: true,
			preloadImages: true,
			/*loop: true,
			autoplay: {
			delay: 4000,
			},*/
			breakpoints : { // 반응형 설정이 가능 width값으로 조정
				700 : {
					slidesPerView : 2,
				},
			},
		});
	</script>
	
	
	<!-- section6 -->
	<section id="section6">
		<img class="logo pc" src="/img/main_traffic/logo_b.png">
		<img class="blackbox_logo2 pc" src="/img/main_traffic/blackbox_logo_pc2_b.png">
		<div class="top pc">
			<?php echo $system_btn_html;?>
			<a class="tel_box" href="tel:<?php echo $tel?>"><?php echo $tel?></a>
			<a href="<?php echo $kakao?>"><img class="kakao" src="/img/main_traffic/kakao_icon.png"></a>
		</div>
		<div class="container">
            <div class="row no-gutters fade-item">
                <div class="col-lg-12">
                    <div class="section__title">
                        <h2 style="text-align: center;">상담안내</h2>
						<h4 style="text-align: center;">교통음주 특화 법무법인 에이앤랩은<br>
						사안이 급박한 분들을 위해 <b>24시간 상담</b>을 진행합니다.</h4>
                    </div>
                </div>
            </div>
		</div>
		<div class="container btn_area fade-item">
			<div class="btn_box first">
				<div class="text">전화상담</div>
				<a class="btn" href="tel:<?php echo $tel?>"><?php echo $tel?></a>
			</div>
			<div class="btn_box second">
				<div class="text">카카오톡상담</div>
				<a class="btn" href="<?php echo $kakao?>">@에이앤랩</a>
			</div>
			<div class="btn_box third">
				<div class="text">긴급상담</div>
				<a class="btn" href="tel:010-2188-0337">010-2188-0337</a>
			</div>
		</div>
	</section>

	
	<!-- 수정사항(새로 생성), 미디어 섹션 -->
	<section class="media_section">
        <div class="container">
            <div class="row fade-item">
                <div class="column_1 col-lg-6 col-12">
					<div class="title">에이앤랩의 사무실</div>
					
					<?php
						$office_img = array(
										0 => 'https://trustnlab.co.kr/wp-content/uploads/2022/02/office1.png',
										1 => 'https://trustnlab.co.kr/wp-content/uploads/2022/02/office2.png',
										2 => 'https://trustnlab.co.kr/wp-content/uploads/2022/02/office3.png',
										3 => 'https://trustnlab.co.kr/wp-content/uploads/2022/02/office4.png',
										4 => 'https://trustnlab.co.kr/wp-content/uploads/2022/02/office5.png',
										5 => 'https://trustnlab.co.kr/wp-content/uploads/2022/02/office6.png'
									);
					?>
					<div class="swiper-container" id="office_slide">
						<div class="swiper-wrapper">
						<?php for($i=0;$i<count($office_img);$i++){?>
							<div class="swiper-slide">
								<div class="slide-box office_img" style="background: url('<?php echo $office_img[$i]?>'); background-size: cover; background-position: center; width:auto; max-width:590px; height:350px;">
								</div>
							</div>
						<?php }?>
						</div>
					</div>
                </div>
				
				<div class="column_2 col-lg-6 col-12">
					<div class="title">영상으로 보는 에이앤랩</div>
					<?php
						$youtube_url = 'vWcZ2bccFrk'; // 유튜브 영상 주소 중 마지막 즈음의 고유 ID값 (예: https://www.youtube.com/watch?v=HmZKgaHa3Fg )
					?>
					<iframe class="main_youtube" height="350" src="https://www.youtube.com/embed/<?php echo $youtube_url?>?autoplay=1&mute=1&loop=1&playlist=vWcZ2bccFrk&controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
		
		<style>
			.media_section {background: #f6f6f6;}
			.media_section .title {font-size: 1.3em; font-weight:bold; max-width: 590px; margin: 0 auto; margin-bottom: 20px;}
			.media_section #office_slide .office_img {margin:0 auto;}
			.media_section .main_youtube {width:100%; max-width: 590px; position: relative; left: 50%; transform: translateX(-50%);}
			
			@media all and (max-width: 991px){
				.media_section .column_1 {margin-bottom:80px;}
			}
			@media all and (max-width: 600px){
				.media_section #office_slide .office_img,
				.media_section .main_youtube {width: 100% !important;}
			}
		</style>
		
		<script>
			jQuery(document).ready(function(){
				for(var i=0;i<jQuery('.media_section .office_img').length;i++){
					jQuery('.media_section .office_img').eq(i).outerHeight(jQuery('.media_section .office_img').eq(i).outerWidth() / 1.69);
				}
				jQuery('.media_section .main_youtube').outerHeight(jQuery('.media_section .main_youtube').outerWidth() / 1.69);
			});
			jQuery(window).resize(function(){
				for(var i=0;i<jQuery('.media_section .office_img').length;i++){
					jQuery('.media_section .office_img').eq(i).outerHeight(jQuery('.media_section .office_img').eq(i).outerWidth() / 1.69);
				}
				jQuery('.media_section .main_youtube').outerHeight(jQuery('.media_section .main_youtube').outerWidth() / 1.69);
			});
		
			var office_slide = new Swiper('#office_slide.swiper-container',  {
				slidesPerView: 1,
				spaceBetween: 10,
				//autoHeight : true,
				/*
				pagination: {
					el: '#office_slide.swiper-pagination',
					clickable : true,
				},
				navigation: {
					nextEl: '#office_slide.swiper-button-next',
					prevEl: '#office_slide.swiper-button-prev',
				},
				*/
				preloadImages: true,
				loop: true,
				autoplay: {
					delay: 2000,
				},
				/*
				breakpoints : { // 반응형 설정이 가능 width값으로 조정
					700 : {
						slidesPerView : 3,
						centeredSlides: true,
					},
					1000 : {
						slidesPerView : 5,
						centeredSlides: true,
					},
				},*/
			});
		</script>
    </section>
	<!-- 수정사항(새로 생성), 미디어 섹션 -->
	
	
	
    <section class="office" style="background-image:url('<?php the_field('contact_bg');?>');">
        <div class="container">
            <div class="row section__title fade-item">
                <div class="col-lg-12">
                    <span class="line" style="background:#fff;"></span>
                    <h2>찾아오시는 길</h2>
                </div>
            </div>
            <div class="row section__desc fade-item">
                <div class="col-lg-6">
					<div class="location_btn on" id="location_seoul" onclick="map_make('서울')">서울사무소</div>
					<div class="location_btn" id="location_daegu" onclick="map_make('대구')">대구사무소</div>
                    <div class="info seoul">
                        <h4 >법무법인 에이앤랩</h4>
                        <ul>
                            <li>
                                <span class="key">주소</span>
                                <span class="value">서울시 서초구 강남대로 337, 337빌딩 10층, 13층</span>
                            </li>

                            <li>
                                <span class="key">전화</span>
                                <span class="value">02-538-0337</span>
                            </li>
                            <li>
                                <span class="key">팩스</span>
                                <span class="value">02-538-4876</span>
                            </li>
                            <li>
                                <span class="key">이메일</span>
                                <span class="value">help@anlab.co.kr</span>
                            </li>
                        </ul>    
                        <article>
                            <h4>대중교통안내</h4>
                            <ul>
                                <li>
                                    <span class="trans bg-green">2호선</span>
                                    <span class="trans bg-red">신분당선</span>
                                    <span class="value">
                                        강남역 5번출구 3분거리
                                    </span>
                                    
                                </li>
                            </ul>
                        </article>
                    </div>
					
					<div class="info daegu" style="display:none;">
                        <h4 >법무법인 에이앤랩(대구)</h4>
                        <ul>
                            <li>
                                <span class="key">주소</span>
                                <span class="value">대구광역시 달서구 장산남로 21, 706호</span>
                            </li>

                            <li>
                                <span class="key">전화</span>
                                <span class="value">02-538-0339</span>
                            </li>
                            <li>
                                <span class="key">팩스</span>
                                <span class="value">02-538-4876</span>
                            </li>
                            <li>
                                <span class="key">이메일</span>
                                <span class="value">help@anlab.co.kr</span>
                            </li>
                        </ul>    
                        <article style="display:none;">
                            <h4>대중교통안내</h4>
                            <ul>
                                <li>
                                    <span class="trans bg-green">2호선</span>
                                    <span class="trans bg-red">신분당선</span>
                                    <span class="value">
                                        강남역 5번출구 3분거리
                                    </span>
                                    
                                </li>
                            </ul>
                        </article>
                    </div>
                </div>
                <div class="col-lg-6">
                    <script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId=1tepevxu97"></script>
					<div id="map" style="width:100%;height:380px;"></div>
					
					<style>
						.location_btn {display: inline-block; font-size: 18px; background: #3b598b; position: absolute; padding: 5px 30px; top: -37px; right: 15px; cursor: pointer;}
						.location_btn.on {background: rgba(0,0,0,.5);}
						
						@media all and (max-width:430px){
							section.office .section__title {margin-bottom:50px;}
							.location_btn {font-size:15px; top: -33px;}
						}
						
						@media all and (min-width:992px){
							#map {top: -37px;}
						}
					</style>
					<script>
						$(function(){
							jQuery('#location_seoul.location_btn')[0].style.right = 'calc(15px + '+jQuery('#location_daegu.location_btn').outerWidth()+'px)';
							
							jQuery('#map').outerHeight(jQuery('.location_btn').outerHeight() + jQuery('.info.seoul').outerHeight());
						});
						$(window).resize(function(){
							jQuery('#location_seoul.location_btn')[0].style.right = 'calc(15px + '+jQuery('#location_daegu.location_btn').outerWidth()+'px)';
						});
						
						function map_make(location){
							if(location == '서울'){
								if(jQuery('#location_seoul.location_btn')[0].className.indexOf(' on') == -1){
									jQuery('#location_seoul.location_btn')[0].className += ' on';
								}
								if(jQuery('#location_daegu.location_btn')[0].className.indexOf(' on') != -1){
									jQuery('#location_daegu.location_btn')[0].className = jQuery('#location_daegu.location_btn')[0].className.replace(' on','');
								}
								jQuery('.office .info.daegu')[0].style.display = 'none';
								jQuery('.office .info.seoul').fadeIn();
							}
							else if(location == '대구'){
								if(jQuery('#location_daegu.location_btn')[0].className.indexOf(' on') == -1){
									jQuery('#location_daegu.location_btn')[0].className += ' on';
								}
								if(jQuery('#location_seoul.location_btn')[0].className.indexOf(' on') != -1){
									jQuery('#location_seoul.location_btn')[0].className = jQuery('#location_seoul.location_btn')[0].className.replace(' on','');
								}
								jQuery('.office .info.seoul')[0].style.display = 'none';
								jQuery('.office .info.daegu').fadeIn();
							}
							
							jQuery('#map')[0].innerHTML = '';
							
							
							var HOME_PATH = window.HOME_PATH || '.';
							
							if(location == '서울'){
								var cityhall = new naver.maps.LatLng(37.4930632,127.0294633)
							}
							else if(location == '대구'){
								var cityhall = new naver.maps.LatLng(35.851707,128.5280119)//35.851707,128.5258119
							}
							
								var map = new naver.maps.Map('map', {
									center: cityhall.destinationPoint(0, 50),
									
									zoom: 16
								}),
								marker = new naver.maps.Marker({
									map: map,
									position: cityhall
								});

							if(location == '서울'){
								var contentString = [
										'<div class="iw_inner">',
										'   <h6>법무법인 에이앤랩</h6>',
										'   <p>서울시 서초구 강남대로 337 10층, 13층 </p>',
										' <div class="link"><a href="http://naver.me/xuI1R0X8" target="_blank">네이버 지도 보기</a></div>',
										'</div>'
									].join('');
							}
							else if(location == '대구'){
								var contentString = [
									'<div class="iw_inner">',
									'   <h6>법무법인 에이앤랩</h6>',
									'   <p>대구광역시 달서구 장산남로 21, 706호 </p>',
									' <div class="link"><a href="https://map.naver.com/v5/entry/address/14307677.368083049,4280225.596392581,%EB%8C%80%EA%B5%AC%EA%B4%91%EC%97%AD%EC%8B%9C%20%EB%8B%AC%EC%84%9C%EA%B5%AC%20%EC%9A%A9%EC%82%B0%EB%8F%99%20230-21,jibun?c=14307641.1447207,4280233.1913266,19,0,0,0,dh" target="_blank">네이버 지도 보기</a></div>',
									'</div>'
								].join('');
							}

							var infowindow = new naver.maps.InfoWindow({
								content: contentString,
								maxWidth: 240,
							});

							naver.maps.Event.addListener(marker, "click", function(e) {
								if (infowindow.getMap()) {
									infowindow.close();
								} else {
									infowindow.open(map, marker);
								}
							});

							infowindow.open(map, marker);
						}
						
						map_make('서울');
					</script>	
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
