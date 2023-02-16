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
$tel_txt = '02)<b>538-0337</b>';

// 카카오상담 링크
$kakao = '/gatepage_kakao.html';


//'성공사례 영역'의 성공 사례 건 수
$success_case_count = '3618';
?>

<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
<!--
header.php 파일로 옮겨둠 - 22.12.19
<link rel="stylesheet" href="../css/main_traffic.css" />
-->
<link rel="stylesheet" href="../css/swiper-bundle.min.css" />
<script src="../js/swiper-bundle.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">

<!--제이쿼리 ui css-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!--제이쿼리 ui js-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!--iOS tel 링크 색상-->
<head>
<meta name="format-detection" content="telephone=no" />
</head>

<!-- section1 -->
<div class="hero" id="section1">
	<div class="txt">
		<div class="main_txt">
			<b>음주/교통 사건,</b><br>
			<span class="animate_txt" style="display: none;">단순 자백이 아닌 디테일한 전략</span><br>
			<span class="gold2 fade_in" style="opacity: 0;"><b>'답'은 에이앤랩</b></span>
		</div>
		
		<!--<img src="/img/main_traffic_new/venn_diagram.png">-->
	</div>

	<img class="honeycomb pc" src="/img/main_traffic_new/section_1_honeycomb.png">
	<div class="honeycomb mobile">
		<div class="row">
			<div class="item">
				서울중앙지검 검사출신
			</div>
			<div class="item">
				대형로펌출신 형사법전문
			</div>
		</div>
		
		<div class="row">
			<div class="item">
				행정법전문 면허구제
			</div>
			<div class="item">
				서울·경기경찰서 자문위원
			</div>
		</div>
	</div>
	
	<div class="section1_resource mobile">
		<img src="/img/main_traffic_new/section1_resource_mobile.png">
	</div>
	
	<div class="consulting_container" id="consulting_container">
		<div class="col pc">
			<div class="container_title">
				<div class="main_title">
					<span class="navy"><b>상담안내</b></span>가 필요하신가요?
				</div>
				<div class="sub_title pc">
					간단한 정보 남겨주시면,<br>
					전문변호사와 상담이 가능합니다.
				</div>
				<div class="sub_title mobile">
					간단한 정보 남겨주시면, 전문변호사와 상담이 가능합니다.
				</div>
			</div>
			<div class="tag_area">
				<span class="tag">#24시간</span>
				<span class="tag">#주말/야간</span>
				<span class="tag">#15분/30분</span>
				<span class="tag">#비밀상담</span>
			</div>
		</div>
		
		<div class="consulting_application pc">
			<div class="application">
				<div class="element">
					<div class="input_set">
						<div class="radio_area">
							<?php
							$category_val = array(
												'음주운전',
												'음주측정거부',
												'교통사고',
												'뺑소니',
												'보복운전',
												'기타'
											);
											
							for($i=0; $i<count($category_val); $i++){?>
								<label><input id="category_<?php echo $i?>" type="radio" name="category" value="<?php echo $category_val[$i]?>"<?php if($i == 0){?> checked<?php }?>><label for="category_<?php echo $i?>" data-label="<?php echo $category_val[$i]?>"></label></label>
								<?php if($i == 2){?><br><?php }?>
							<?php }?>
						</div>
						<div class="input_area">
							<input id="name" name="name" type="text" placeholder="이름">
							<input id="tel" name="tel" type="text" placeholder="연락처">
							<input id="current_url" name="current_url" type="hidden">
						</div>
					</div>
					
					<span class="apply" onclick="submit();" onselectstart="return false">
						<span class="pc">
							간편상담<br>
							신청하기
						</span>
						<span class="mobile">
							간편상담 신청하기
						</span>
					</span>
				</div>
				
				<div class="agree_area">
					<label for="agree"><input id="agree" name="agree" type="checkbox" value="1"> 개인정보취급방침 동의</label> <span class="main_privacy_btn" onclick="main_privacy_open();">[전문보기]</span><br>
				</div>
			</div>
			
			<!--<a class="kakao_btn pc" href="<?php echo $kakao?>">
				<img src="/img/icon/icon_kakao_32x30.png"><br>
				카카오톡<br>
				상담하기
			</a>-->
		</div>
	</div>
	
	<div class="blue_bg pc"></div>
</div>

<script>
	var move_true = false; // 이동되었는지 여부를 가리기위한 변수.
	
	$(window).on('scroll',function() {
		var scrolltop = $(window).scrollTop(); // 현재 스크롤 위치

		$(function (){
			if(location.href.indexOf('#section') != -1 && scrolltop < 10 && move_true == false){
				if(scrolltop < 10){
					setTimeout(goTop(location.href.replace(location.origin + '/#', '')), 1500);
					move_true = true;
				}
			}
		});
		
			
		// pc 화면 하단의 nav 메뉴, section2 영역 이하에 들어설 때 나타나게해주는 함수
		/*
		if($(window).width() > 770){
			if ($('#section1').height() / 2 > scrolltop) {
				jQuery('#lawyer_slide_section .nav_meun').fadeOut();
			}else{
				jQuery('#lawyer_slide_section .nav_meun').fadeIn();
			}
		}
		*/
		
		
		// 현재 스크롤의 위치에 따라 nav 메뉴의 버튼이 해당 section에 진입 시 클래스명 'selected'가 붙도록해주는 함수
		/*
		for(var i=1;i<7;i++){
			j = i + 1;
			if(i<6){
				if ($('#section'+i).offset().top - 300 <= scrolltop && $('#section'+j).offset().top - 300 > scrolltop) {
					if(jQuery('#lawyer_slide_section .nav_meun .menu_'+i)[0].className.indexOf(' selected') == -1){
						jQuery('#lawyer_slide_section .nav_meun .menu_'+i)[0].className += ' selected';
					}
				}else{
					jQuery('#lawyer_slide_section .nav_meun .menu_'+i)[0].className = jQuery('#lawyer_slide_section .nav_meun .menu_'+i)[0].className.replace(' selected','');
				}
			}else{
				if ($('#section'+i).offset().top - 300 <= scrolltop) {
					if(jQuery('#lawyer_slide_section .nav_meun .menu_'+i)[0].className.indexOf(' selected') == -1){
						jQuery('#lawyer_slide_section .nav_meun .menu_'+i)[0].className += ' selected';
					}
				}else{
					jQuery('#lawyer_slide_section .nav_meun .menu_'+i)[0].className = jQuery('#lawyer_slide_section .nav_meun .menu_'+i)[0].className.replace(' selected','');
				}
			}
		}
		*/
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

	
	jQuery('[name=current_url]').val(window.location.href);

	function submit() {
		if($('#name').val() == ''){
			alert('이름을 입력하세요');
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
			alert('간편 상담 신청은 개인정보취급방침에 동의 후 신청 가능합니다.');
			$('#agree')[0].focus();
			return;
		}

		
		var param = {
			"mode" : 'consulting',
			"name" : $('#name').val(),
			"tel" : $('#tel').val(),
			"category" : $('[name=category]:checked').val(),
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
					//NAVER SCRIPT
					if (typeof(wcs) != "undefined") {
					if (!wcs_add) var wcs_add={};
					wcs_add["wa"] = "s_41a2b1b1795b";
					var _nasa={};
					_nasa["cnv"] = wcs.cnv("4","1");
					wcs_do(_nasa);
					}
					alert($('#name').val() + '님의 상담 신청이 완료되었습니다.');
					window.location.reload();
				} else {
					alert(data);
					console.log(param)
				}
			}
		});
	}
	
	
	// 타이핑 애니메이션 함수
	function type_animation(tag, letter){
		tag.innerHTML = '';
		for(let i=0; i < letter.length; i++){
			setTimeout(function(){
				tag.innerHTML += letter[i]
			}, (i+1)*50)
		}
	}
	
	jQuery(window).on('load', function(){
		var type_ani_delay = jQuery('.animate_txt').text().length * 50;
		
		setInterval(function() {
			jQuery('.animate_txt').show();
			type_animation( jQuery('.animate_txt')[0], jQuery('.animate_txt').text() );

			setTimeout(function(){ jQuery('.fade_in').animate( {opacity: '1'}, 1500); }, type_ani_delay);
			setTimeout(function(){ jQuery('.fade_in').css('opacity', '0') }, type_ani_delay + 1500 + 100);
		}, type_ani_delay + 1500);
	});
</script>

<!-- 형량예측시스템 팝업 시작-->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">

<div class="popup_background">
	<div class="survey_popup">
		<div class="survey_header">
			<div class="row_1">
				<i class="xi-close" onclick="survey_popup_close()"></i>
				법무법인 에이앤랩<br>
				<b>음주운전 형량예측시스템</b>
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
				<label class="radio_btn" for="survey_agree"><input id="survey_agree" name="survey_agree" type="radio" value="1">개인정보수집이용 동의 <span>(보내주신 정보는 상담진행시에만 사용됩니다)</span></label><br>
				<span class="survey_privacy_btn" onclick="survey_privacy_open();">
					개인정보수집이용 동의서 펼쳐보기
				</span>
			</div>

			<div class="survey_privacy_modal">
				<div class="survey_privacy_title">
					법무법인 에이앤랩 개인정보 수집•이용 관련 동의서
				</div>
				<div class="survey_privacy_content">
					법무법인 <b>에이앤랩</b>(이하 "회사")는 아래의 목적으로 개인정보를 수집 및 이용하며, 고객의 개인정보를 안전하게 취급하는데 최선을 다합니다.
					<table>
						<thead>
							<tr>
								<td>개인정보 항목</td>
								<td>수집•이용 목적</td>
								<td>보유기간</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>성명, 전화번호, 양형예측 관련 고객 기입정보</td>
								<td>양형예측결과 제공 및 관련 법률 서비스 제공, 고충처리</td>
								<td>개인정보의 수집 및 이용목적 달성시까지(다만, 법령에 따라 보유ㆍ이용기간이 정해진 경우에는 그에 따름)</td>
							</tr>
						</tbody>
					</table>
					고객은 개인정보 수집 동의를 거부하실 수 있습니다. 다만 필수항목의 수집 및 이용을 거부하는 경우 양형예측결과 제공 및 법률상담 등 서비스 제공이 불가할 수 있습니다.
				</div>
			</div>

			<style>
				.survey_privacy_btn,
				.survey_privacy_modal_close_btn {cursor: pointer;}
				
				.survey_privacy_modal {display:none; font-size: 14px; width: 90%; max-width: 500px; height: 230px; margin: 0 auto; padding: 20px; background: #f8f8f8; overflow-y: scroll;}
				.survey_privacy_modal .survey_privacy_title {font-size: 1.5em; font-weight: bold; text-align: center; margin-bottom: 20px;}
				
				.survey_privacy_modal .survey_privacy_content {line-height: 22px;}
				
				.survey_privacy_modal table {font-size: .9em; margin: 15px 0;}
				.survey_privacy_modal table td {border: 1px solid #858585;}
				.survey_privacy_modal table thead td {padding-top: 5px; border-bottom-width: 0;}
				.survey_privacy_modal table tbody td {padding: 10px;}
				
				.survey_privacy_modal .survey_privacy_modal_close_btn {position: absolute; top: 15px; right: 15px; cursor: pointer; width: 35px; height: 35px;}
				.survey_privacy_modal .survey_privacy_modal_close_btn:before {content: ""; display: inline-block; position: absolute; width: 1px; height: 35px; background-color: #000; left: 50%; transform: rotate(-45deg) translateX(-50%);}
				.survey_privacy_modal .survey_privacy_modal_close_btn:after {content: ""; display: inline-block; position: absolute; width: 1px; height: 35px; background-color: #000; left: 50%; transform: rotate(-135deg) translateX(-50%);}
				
				@media all and (max-width: 770px){
					
				}
				@media all and (max-width: 600px){
					
				}
			</style>

			<div class="survey_btn" onclick="survey_submit()">제출하기</div>
		</div>
	</div>
</div>

<script>
	function survey_privacy_open(){
		jQuery('.survey_privacy_modal').slideDown();
		jQuery('.survey_privacy_btn')[0].innerText = jQuery('.survey_privacy_btn')[0].innerText.replace('펼쳐보기', '접기');
		jQuery('.survey_privacy_btn')[0].setAttribute('onclick', 'survey_privacy_close();');
	}
	function survey_privacy_close(){
		jQuery('.survey_privacy_modal').slideUp();
		jQuery('.survey_privacy_btn')[0].innerText = jQuery('.survey_privacy_btn')[0].innerText.replace('접기', '펼쳐보기');
		jQuery('.survey_privacy_btn')[0].setAttribute('onclick', 'survey_privacy_open();');
	}
	

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


<!-- 대시보드 -->
<?php
//누적 상담 건수
$count_number1 = 13112;
//누적 성공사례
$count_number2 = 3618;
//변호사 평균 법조 경력
$count_number3 = 10.7;
?>
<div class="dashboard pc">
	<div class="area first">
		수치로 증명하는 <br>에이앤랩
	</div>
	<div class="area">
		<div class="box1"><span class="under">누적 상담 건수</span><br><span class="under2">에이앤랩에 대한 믿음</span></div>
		<div class="box2"><span class="count_number one"><?php echo $count_number1?></span>건</div><!--2022년 8월분까지 합산-->
	</div>
	<div class="area">
		<div class="box1"><span class="under">누적 성공사례</span><br><span class="under2">에이앤랩의 저력</span></div>
		<div class="box2"><span class="count_number two"><?php echo $count_number2?></span>건</div><!--2022년 8월분까지 합산-->
	</div>
	<div class="area">
		<div class="box1"><span class="under">변호사 평균 법조 경력</span><br><span class="under2">에이앤랩의 역사</span></div>
		<div class="box2"><span class="count_number three"><?php echo $count_number3?></span>년</div>
	</div>
</div>
<div class="dashboard mobile">
	<div class="area">
		<div class="box2"><span class="count_number one"><?php echo $count_number1?></span>건</div><!--22년 8월까지 합산-->
		<div class="box1"><span class="under">누적 상담 건수</span><br>에이앤랩에 대한 믿음</div>
	</div>
	<div class="area">
		<div class="box2"><span class="count_number two"><?php echo $count_number2?></span>건</div><!--22년 8월까지 합산-->
		<div class="box1"><span class="under">누적 성공사례</span><br>에이앤랩의 저력</div>
	</div>
	<div class="area">
		<div class="box2"><span class="count_number three"><?php echo $count_number3?></span>년</div>
		<div class="box1"><span class="under">평균 법조 경력</span><br>에이앤랩의 역사</div>
	</div>
</div>
	
<script>
	//천 단위 콤마 붙여주기 위한 함수
	function comma(price) {
		return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
	}

	var count_number1 = <?php echo $count_number1?>;//$('.count_number.one')[0].innerHTML;
	var count_number2 = <?php echo $count_number2?>;//$('.count_number.two')[0].innerHTML;
	var count_number3 = <?php echo $count_number3?>;//$('.count_number.three')[0].innerHTML;
	
	var isVisible = false;

	$(window).on('scroll',function() {
		if ( ( checkVisible($('.dashboard.pc')) || checkVisible($('.dashboard.mobile')) )&&!isVisible) {
			$({ val : 0 }).animate({ val : count_number1 }, {
				duration: 2500,
				step: function() {
					var num = comma(Math.floor(this.val));
					$(".count_number.one").text(num);
				},
				complete: function() {
					var num = comma(Math.floor(this.val));
					$(".count_number.one").text(num);
				}
			});
	
			$({ val : 0 }).animate({ val : count_number2 }, {
				duration: 2500,
				step: function() {
					var num = comma(Math.floor(this.val));
					$(".count_number.two").text(num);
				},
				complete: function() {
					var num = comma(Math.floor(this.val));
					$(".count_number.two").text(num);
				}
			});
	
			$({ val : 0 }).animate({ val : count_number3 }, {
				duration: 2500,
				step: function() {
					var num = comma(Math.floor(this.val));
					$(".count_number.three").text(num);
				},
				complete: function() {
					var num = comma(Math.floor(this.val));
					$(".count_number.three").text(num);
				}
			});
			isVisible=true;
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
</script>


<main>
	<!-- 변호사 섹션 -->
	<section id="lawyer_slide_section">
		<?php
		$lawyer_arr = array('you', 'joe', 'kim', 'park', 'shin');
		
		//김동우 변호사 슬로건
		$kim_slogan		= '치밀하게 법리를 분석합니다.<br>결국, 사건은 법리싸움에서 이겨야 승소합니다.';
		
		//김동우 변호사 학력
		$kim_academic	= array(
							'연세대학교 법학과',
							'연세대학교 대학원 법학과 석사(행정법)',
							'<span class="gold2">제53회 사법시험 합격(2011년)</span>',
							'제43기 사법연수원 수료'
							);
		//김동우 변호사 경력
		$kim_career		= array(
							'<span class="gold2">대한변호사협회 등록 형사법 전문 변호사</span>',
							'<span class="gold2">서울수서경찰서/과천경찰서 자문위원</span>',
							'제5회, 제6회 변호사시험 시험위원',
							'광주지방검찰청 검사직무대리'
							);
							
		//박현식 변호사 슬로건
		$park_slogan	= '의뢰인과 적극적으로 소통합니다.<br>형사사건, 그 두려움은 변호사와의 적극적 소통을 통해 없앨 수 있습니다.';
		
		//박현식 변호사 학력
		$park_academic	= array(
							'고려대학교 법학과',
							'고려대학교 대학원 법학과 석사 졸업',
							'고려대학교 대학원 법학과 박사 수료',
							'<span class="gold2">제52회 사법시험 합격(2010년)</span>',
							'제43기 사법연수원 수료'
							);
		//박현식 변호사 경력
		$park_career	= array(
							'서울중앙지방검찰청 법무관',
							'인천지방검찰청 부천지청 법무관',
							'수원지방검찰청 안산지청 검사직무대리',
							'대한법률구조공단 춘천지부 영월출장소 법무관'
							);
							
		//유선경 변호사 슬로건
		$you_slogan		= '사건의 맥을 짚습니다.<br>검사출신으로서 사실관계를 치밀하게 파악하고, 증거를 분석하여 사건의 핵심을 알려드립니다.';
		
		//유선경 변호사 학력
		$you_academic	= array(
							'고려대학교 법학과',
							'<span class="gold2">제49회 사법시험 합격(2007년)</span>',
							'제40기 사법연수원 수료'
							);
		//유선경 변호사 경력
		$you_career		= array(
							'<span class="gold2">서울중앙지방검찰청 검사</span>',
							'춘천지방검찰청 강릉지청 검사',
							'<span class="gold2">법무법인(유) 태평양 변호사</span>',
							'<span class="gold2">대한변호사협회 등록 형사법 전문변호사</span>'
							);
							
		//조건명 변호사 슬로건
		$joe_slogan		= '의뢰인과 함께 합니다.<br>경찰/검찰 조사, 재판에서 직접 검사와 재판부에 적극 주장하며,  의뢰인이 가장 어려울 때 곁에서 함께 합니다.';
		
		//조건명 변호사 학력
		$joe_academic	= array(
							'연세대학교 법학과',
							'<span class="gold2">제53회 사법시험 합격(2011년)</span>',
							'제43기 사법연수원 수료'
							);
		//조건명 변호사 경력
		$joe_career		= array(
							'광주지방법원 민사조정위원',
							'광주고등검찰청/법무부 법조인력과 법무관',
							'제54/56회 사법시험, 제1/4회/5회/6회 변호사시험 시험위원',
							'<span class="gold2">법무법인(유) 태평양 변호사</span>',
							'<span class="gold2">대한변호사협회 등록 형사법 전문변호사</span>'
							);
		
		//신상민 변호사 슬로건
		$shin_slogan	= '결과를 예측하고, 방향을 제시합니다.<br>변호 방향을 정하고, 변호활동을 시작해야 결과를 만들 수 있습니다.';
		
		//신상민 변호사 학력
		$shin_academic	= array(
							'고려대학교 법학과',
							'고려대학교 대학원 법학과 석사 졸업, 박사 수료(행정법)',
							'<span class="gold2">제51회 사법시험 합격(2009년)</span>',
							'제42기 사법연수원 수료'
							);
		//신상민 변호사 경력
		$shin_career	= array(
							'산업통상자원부 규제개혁법무과 법무관',
							'산업통상자원부 고문 변호사',
							'고려대학교 법학전문대학원 행정법 겸임교수'
							);
		?>
		<div class="lawyer">
			<div class="logo_area">
				<img src="/img/main_traffic_new/logo_spo_61x61.png">
				<img src="/img/main_traffic_new/logo_court_61x61.png">
				<img src="/img/main_traffic_new/logo_lawyer_61x61.png">
				<img src="/img/main_traffic_new/logo_police_61x61.png">
				<img src="/img/main_traffic_new/logo_moj_61x61.png">
			</div>
			
			<div class="title">
				<!--<div class="sub_title">
					법무법인 에이앤랩
				</div>-->
				<div class="main_title">
					당신의 음주/교통사건,<br>
					직접해결 할 대표변호사들입니다. 
				</div>
			</div>
			
			<div class="lawyer_area">
				<div class="img_area pc">
					<?php for($i=0; $i<count($lawyer_arr); $i++){?>
						<img src="/img/main_traffic_new/lawyer_<?php echo $lawyer_arr[$i]?>_none.png" onclick="lawyer_hover('<?php echo $lawyer_arr[$i]?>')" onmouseover="lawyer_hover('<?php echo $lawyer_arr[$i]?>')">
					<?php }?>
				</div>
				
				<div class="img_area mobile">
					<div class="swiper-container" id="lawyer_slide">
						<div class="swiper-wrapper">
							<?php for($i=0; $i<count($lawyer_arr); $i++){?>
								<div class="swiper-slide img_box">
									<?php if($i == 0){?>
										<img src="/img/main_traffic_new/lawyer_<?php echo $lawyer_arr[$i]?>_hover_mobile.png">
									<?php }else{?>
										<img src="/img/main_traffic_new/lawyer_<?php echo $lawyer_arr[$i]?>_blur_mobile.png">
									<?php }?>
								</div>
							<?php }?>
						</div>
					</div>
					<div class="swiper-button-next" id="lawyer_slide"></div>
					<div class="swiper-button-prev" id="lawyer_slide"></div>
				</div>
				
				<div class="intro_area">
					<?php global $wpdb;
						for($i=0; $i<count($lawyer_arr); $i++){
							$lawyer_name = $lawyer_arr[$i];
							
							switch($lawyer_name){
								case 'you' : $name = '유선경'; break;
								case 'joe' : $name = '조건명'; break;
								case 'kim' : $name = '김동우'; break;
								case 'park' : $name = '박현식'; break;
								case 'shin' : $name = '신상민'; break;
							}
							?>
						<div class="<?php echo $lawyer_name?>_slogan<?php if($i == 0){?> on<?php }?> gold2">
							<div class="slogan">
								"<?php echo ${$lawyer_name.'_slogan'}?>"
							</div>
							
							<div class="lawyer_name">
								- <?php echo $name?> 변호사
							</div>
						</div>
							
						<div class="<?php echo $lawyer_name?>_intro<?php if($i == 0){?> on<?php }?>">
							<div class="keycases">
								<div class="title">
									주요사례
								</div>
								
								<?php
								$from = "`{$wpdb->prefix}kboard_board_content` LEFT JOIN `{$wpdb->prefix}kboard_board_option` ON `{$wpdb->prefix}kboard_board_content`.`uid`=`{$wpdb->prefix}kboard_board_option`.`content_uid`";
								$where = "`{$wpdb->prefix}kboard_board_content`.`board_id`='2' AND (`{$wpdb->prefix}kboard_board_option`.`option_key`='keycases' AND `{$wpdb->prefix}kboard_board_option`.`option_value` LIKE '%{$name}%') AND (`{$wpdb->prefix}kboard_board_content`.`notice`='' OR NOT `{$wpdb->prefix}kboard_board_content`.`notice`='') AND (`{$wpdb->prefix}kboard_board_content`.`status` IS NULL OR `{$wpdb->prefix}kboard_board_content`.`status`='' OR `{$wpdb->prefix}kboard_board_content`.`status`='pending_approval')";
								
								$lawyer_keycases_sql = $wpdb->get_results("SELECT * FROM {$from} WHERE {$where} ORDER BY `{$wpdb->prefix}kboard_board_option`.`content_uid` DESC LIMIT 4", OBJECT);
								
								for($j=0; $j<count($lawyer_keycases_sql); $j++){?>
									<a href="/업무사례/?uid=<?php echo $lawyer_keycases_sql[$j]->content_uid?>&mod=document">
										· <?php echo $lawyer_keycases_sql[$j]->title?>
									</a>
								<?php }?>
							</div>
							<div class="career">
								<div class="col_1">
									<div class="title">
										학력
										<i class="xi-angle-up mobile"></i>
									</div>
									
									<div class="txt">
										<?php for($j=0; $j<count(${$lawyer_name.'_academic'}); $j++){?>
											· <?php echo ${$lawyer_name.'_academic'}[$j]?>
											<?php if($j != count(${$lawyer_name.'_academic'}) - 1){?>
												<br>
											<?php }?>
										<?php }?>
									</div>
								</div>
								
								<div class="col_2">
									<div class="title">
										경력
										<i class="xi-angle-up mobile"></i>
									</div>
									
									<div class="txt">
										<?php for($j=0; $j<count(${$lawyer_name.'_career'}); $j++){?>
											· <?php echo ${$lawyer_name.'_career'}[$j]?>
											<?php if($j != count(${$lawyer_name.'_career'}) - 1){?>
												<br>
											<?php }?>
										<?php }?>
									</div>
								</div>
							</div>
						</div>
					<?php }?>
				</div>
			</div>
			
			
			<div class="conveyor_area">
				<div class="title">
				</div>
				
				<div class="conveyor_img_area">
					<?php
					$conveyor_img_arr = array(
											'/img/main/lawyer_conveyor/01.png',
											'/img/main/lawyer_conveyor/02.png',
											'/img/main/lawyer_conveyor/03.png',
											'/img/main/lawyer_conveyor/04.png',
											'/img/main/lawyer_conveyor/05.png',
											'/img/main/lawyer_conveyor/06.png',
											'/img/main/lawyer_conveyor/07.png',
											'/img/main/lawyer_conveyor/08.png'
										);
					for($k=0; $k<2; $k++){
						for($i=0; $i<count($conveyor_img_arr); $i++){?>
						<img src="<?php echo $conveyor_img_arr[$i]?>">
						<?php }?>
					<?php }?>
				</div>
			</div>
			
		</div>
	</section>
	
	<script>
		// PC용
		function lawyer_hover(lawyer){
			var target = jQuery('#lawyer_slide_section .lawyer .lawyer_area .img_area.pc img[src*='+lawyer+']'),
				hover_src = target.attr('src').replace('none', 'hover');
		
			for(var i=0; i<jQuery('#lawyer_slide_section .lawyer .lawyer_area .img_area.pc img').length; i++){
				var none_src = jQuery('#lawyer_slide_section .lawyer .lawyer_area .img_area.pc img').eq(i).attr('src').replace('hover', 'none');
				jQuery('#lawyer_slide_section .lawyer .lawyer_area .img_area.pc img').eq(i).attr('src', none_src);
			}

			target.attr('src', hover_src);


			//jQuery('#lawyer_slide_section .lawyer .lawyer_area .intro_area [class*=_intro]').removeClass('on');
			//jQuery('#lawyer_slide_section .lawyer .lawyer_area .intro_area .' + lawyer + '_intro').addClass(' on');
			jQuery('#lawyer_slide_section .lawyer .lawyer_area .intro_area [class*=_intro]').css('display', 'none');
			jQuery('#lawyer_slide_section .lawyer .lawyer_area .intro_area .' + lawyer + '_intro').fadeIn();
			
			jQuery('#lawyer_slide_section .lawyer .lawyer_area .intro_area [class*=_slogan]').removeClass('on');
			jQuery('#lawyer_slide_section .lawyer .lawyer_area .intro_area .' + lawyer + '_slogan').addClass('on');
		}
		
		// pc ver 변호사 소개 이미지 영역의 현재 활성화되고있는 index 값을 담기 위한 변수.
		var x = 0;
		

		var certificate_swiper = new Swiper('#certificate.swiper-container',  {
			slidesPerView: 8,
			spaceBetween: 10,
			centeredSlides: true,
			speed: 21000,
			observer: true,
			observeParents: true,
			preloadImages: true,
			loop: false,
			autoplay: {
				delay: 0,
			},
		});
		
		
		// mobile용
		var lawyer_slide_swiper = new Swiper('#lawyer_slide.swiper-container',  {
			slidesPerView: 2,
			spaceBetween: 10,
			navigation: {
				nextEl: '#lawyer_slide.swiper-button-next',
				prevEl: '#lawyer_slide.swiper-button-prev',
			},
			centeredSlides: true,
			observer: true,
			observeParents: true,
			preloadImages: true,
			loop: false,
			autoplay: false,/*{
				delay: 1000,
			},*/
		}).on('slideChange', function() {
			var current_slide_index = lawyer_slide_swiper.realIndex,
				lawyer = '';

			switch(current_slide_index){
				<?php for($i=0; $i<count($lawyer_arr); $i++){?>
					case <?php echo $i?> : lawyer = '<?php echo $lawyer_arr[$i]?>'; break;
				<?php }?>
			}

			var target = jQuery('#lawyer_slide_section .lawyer .lawyer_area .img_area.mobile img[src*='+lawyer+']'),
				hover_src = target.attr('src').replace('blur', 'hover');

		
			for(var i=0; i<jQuery('#lawyer_slide_section .lawyer .lawyer_area .img_area.mobile img').length; i++){
				var blur_src = jQuery('#lawyer_slide_section .lawyer .lawyer_area .img_area.mobile img').eq(i).attr('src').replace('hover', 'blur');
				jQuery('#lawyer_slide_section .lawyer .lawyer_area .img_area.mobile img').eq(i).attr('src', blur_src);
			}

			target.attr('src', hover_src).css('width', '');


			jQuery('#lawyer_slide_section .lawyer .lawyer_area .intro_area [class*=_intro]').removeClass('on');
			jQuery('#lawyer_slide_section .lawyer .lawyer_area .intro_area [class*=_intro]').eq(current_slide_index).addClass(' on');
			//jQuery('#lawyer_slide_section .lawyer .lawyer_area .intro_area [class*=_intro]').css('display', 'none');
			//jQuery('#lawyer_slide_section .lawyer .lawyer_area .intro_area [class*=_intro]').eq(current_slide_index).fadeIn();
			
			jQuery('#lawyer_slide_section .lawyer .lawyer_area .intro_area [class*=_slogan]').removeClass('on');
			jQuery('#lawyer_slide_section .lawyer .lawyer_area .intro_area [class*=_slogan]').eq(current_slide_index).addClass(' on');
		});
		
		
		jQuery('#lawyer_slide_section .lawyer .lawyer_area .intro_area [class*=_intro] .career [class^=col_]').on('click', function(){
			if(jQuery(window).outerWidth() < 1025){
				var target = jQuery(event.target);

				if(target.hasClass('title')){
					if(target.children('[class^=xi-angle-]').hasClass('xi-angle-down')){
						var new_class = target.children('[class^=xi-angle-]').attr('class').replace('down', 'up');
					}else{
						var new_class = target.children('[class^=xi-angle-]').attr('class').replace('up', 'down');
					}
					
					target.children('[class^=xi-angle-]').attr('class', new_class);
					target.parent().children('.txt').slideToggle();
				}
				
				if(target.hasClass('xi-angle-down') || target.hasClass('xi-angle-up')){
					if(target.hasClass('xi-angle-down')){
						var new_class = target.attr('class').replace('down', 'up');
					}else{
						var new_class = target.attr('class').replace('up', 'down');
					}
					
					target.attr('class', new_class);
					target.closest('[class^=col_]').children('.txt').slideToggle();
				}
				
				lawyer_slide_swiper.autoplay.stop();
			}
		});
		
		
		function mobile_lawyer_slide_setting(){
			setTimeout(function(){
				var active_img_width = jQuery('#lawyer_slide_section .lawyer .lawyer_area .img_area .img_box.swiper-slide-active img').outerWidth(),
					active_img_height = jQuery('#lawyer_slide_section .lawyer .lawyer_area .img_area .img_box.swiper-slide-active img').outerHeight(),
					prev_img = jQuery('#lawyer_slide_section .lawyer .lawyer_area .img_area.mobile .img_box.swiper-slide-prev img'),
					next_img = jQuery('#lawyer_slide_section .lawyer .lawyer_area .img_area.mobile .img_box.swiper-slide-next img'),
					calc_width = (active_img_width / 100) * 80;
					
				prev_img.css('width', calc_width + 'px');
				next_img.css('width', calc_width + 'px');
				
				var prev_img_height = prev_img.outerHeight(),
					calc_top = (active_img_height - prev_img_height) / 2,
					custom_style = '<style id="custom_css">#lawyer_slide_section .lawyer .lawyer_area .img_area.mobile .img_box.swiper-slide-prev img, #lawyer_slide_section .lawyer .lawyer_area .img_area.mobile .img_box.swiper-slide-next img {top: '+calc_top+'px; width: '+calc_width+'px;}</style>';
					
				if(jQuery('#custom_css')[0]){
					jQuery('#custom_css').remove();
				}
				jQuery('head').append(custom_style);
			}, 500);
		}
		
		
		// 자동으로 'lawyer_hover'를 작동시키기 위한 함수
		start_progress = function() {
			auto_lawyer_hover = setInterval(function() {
				/* 자동으로 loop되지 않도록 하기 위해 주석 처리 해둠 - 22.12.21
				if(jQuery(window).outerWidth() > 1024){// 1024보다 크다면..
					if(x == jQuery('#lawyer_slide_section .lawyer .lawyer_area .img_area.pc img').length) x = 0;
					
					jQuery('#lawyer_slide_section .lawyer .lawyer_area .img_area.pc img').eq(x).click();
					x++;
				}*/
			}, 2000);
		};

		stop_progress = function() {
			clearInterval(auto_lawyer_hover);
		};
		
		
		
		jQuery(window).on('load', function(){
			// 자동으로 작동되는 함수를 정지 시켜주기 위한 함수.
			jQuery('#lawyer_slide_section .lawyer .lawyer_area .img_area.pc img, #lawyer_slide_section .lawyer .lawyer_area .intro_area [class*=_intro] .keycases').on('mouseover', function(){
				stop_progress();
			});
			jQuery('#lawyer_slide_section .lawyer .lawyer_area .img_area.pc img, #lawyer_slide_section .lawyer .lawyer_area .intro_area [class*=_intro] .keycases').on('mouseleave', function(){
				// 현재 선택되었던 index의 다음 요소부터 다시 작동시키기 위해 x값 재정의
				x = jQuery(event.target).index() + 1;
				
				start_progress();
			});
			
			
			if(jQuery(window).outerWidth() < 1025){// 1025보다 작다면..
				//mobile_lawyer_slide_setting();
				start_progress();
				stop_progress();
			}else{
				jQuery('#lawyer_slide_section .lawyer .lawyer_area .intro_area [class*=_intro]').css('display', 'none');
				
				lawyer_hover('<?php echo $lawyer_arr[0]?>');
				start_progress();
			}
		});
		
		jQuery(window).on('resize', function(){
			if(jQuery(window).outerWidth() < 1025){// 1025보다 작다면..
				stop_progress();
				
				jQuery('#lawyer_slide_section .lawyer .lawyer_area .intro_area [class*=_intro]').css('display', '');
				
				var lawyer_slide_swiper = new Swiper('#lawyer_slide.swiper-container',  {
					slidesPerView: 2,
					spaceBetween: 10,
					navigation: {
						nextEl: '#lawyer_slide.swiper-button-next',
						prevEl: '#lawyer_slide.swiper-button-prev',
					},
					centeredSlides: true,
					observer: true,
					observeParents: true,
					preloadImages: true,
					loop: false,
					autoplay: false,/*{
						delay: 5000,
					},*/
				}).on('slideChange', function() {
					var current_slide_index = lawyer_slide_swiper.realIndex,
						lawyer = '';

					switch(current_slide_index){
						<?php for($i=0; $i<count($lawyer_arr); $i++){?>
							case <?php echo $i?> : lawyer = '<?php echo $lawyer_arr[$i]?>'; break;
						<?php }?>
					}

					var target = jQuery('#lawyer_slide_section .lawyer .lawyer_area .img_area.mobile img[src*='+lawyer+']'),
						hover_src = target.attr('src').replace('blur', 'hover');

				
					for(var i=0; i<jQuery('#lawyer_slide_section .lawyer .lawyer_area .img_area.mobile img').length; i++){
						var blur_src = jQuery('#lawyer_slide_section .lawyer .lawyer_area .img_area.mobile img').eq(i).attr('src').replace('hover', 'blur');
						jQuery('#lawyer_slide_section .lawyer .lawyer_area .img_area.mobile img').eq(i).attr('src', blur_src);
					}

					target.attr('src', hover_src).css('width', '');


					jQuery('#lawyer_slide_section .lawyer .lawyer_area .intro_area [class*=_intro]').removeClass('on');
					jQuery('#lawyer_slide_section .lawyer .lawyer_area .intro_area [class*=_intro]').eq(current_slide_index).addClass(' on');
					//jQuery('#lawyer_slide_section .lawyer .lawyer_area .intro_area [class*=_intro]').css('display', 'none');
					//jQuery('#lawyer_slide_section .lawyer .lawyer_area .intro_area [class*=_intro]').eq(current_slide_index).fadeIn();
					
					jQuery('#lawyer_slide_section .lawyer .lawyer_area .intro_area [class*=_slogan]').removeClass('on');
					jQuery('#lawyer_slide_section .lawyer .lawyer_area .intro_area [class*=_slogan]').eq(current_slide_index).addClass(' on');
				});
				//mobile_lawyer_slide_setting();
			}else{
				if( jQuery('body').hasClass('mobile') ){
					jQuery('body').removeClass('mobile');
				}
				jQuery('#lawyer_slide_section .lawyer .lawyer_area .intro_area [class*=_intro]').css('display', 'none');
				
				lawyer_hover('<?php echo $lawyer_arr[0]?>');
				//start_progress();
			}
		});
	</script>


	<!-- section3 -->
	<section id="section3">
		<div class="title">
			<div class="sub_title">
				무죄·무혐의·감형
			</div>
			<div class="main_title">
				<!--<span class="blue"><span class="count_number one"><?php echo $success_case_count?></span>건</span>의 -->당신의 사건입니다, 성공사례
				
				<a class="more_btn" href="/업무사례" title="성공 사례 더보기">
					<img src="/img/main_traffic_new/btn_more_w.png">
				</a>
			</div>
			
			<div class="hash_tags">
				<?php
				$hash_tag = array(
								'음주운전',
								'음주측정거부',
								'음주뺑소니',
								'교통사고'
							);
				for($i=0; $i<count($hash_tag); $i++){?>
					<a class="hash_tag" href="/업무사례/?mod=list&keyword=<?php echo $hash_tag[$i]?>" title="<?php echo $hash_tag[$i]?> 사례 보기">#<?php echo $hash_tag[$i]?></a>
				<?php }?>
			</div>
		</div>
		
		<div class="success_area">
			<div class="row_1">
				<div class="swiper-container" id="main_keycase">
					<div class="swiper-wrapper">
						<?php
						$select = "*";
						$select .= ", `option_2`.`option_value` AS `main_lawyer`";
						$select .= ", `option_3`.`option_value` AS `result`";
						
						$from = "`{$wpdb->prefix}kboard_board_content`";
						$from .= " LEFT JOIN `{$wpdb->prefix}kboard_board_option` AS `option_1` ON `{$wpdb->prefix}kboard_board_content`.`uid`=`option_1`.`content_uid`";
						$from .= " LEFT JOIN `{$wpdb->prefix}kboard_board_option` AS `option_2` ON `{$wpdb->prefix}kboard_board_content`.`uid`=`option_2`.`content_uid`";
						$from .= " LEFT JOIN `{$wpdb->prefix}kboard_board_option` AS `option_3` ON `{$wpdb->prefix}kboard_board_content`.`uid`=`option_3`.`content_uid`";
						
						$where = "`{$wpdb->prefix}kboard_board_content`.`board_id`='2'"; 
						$where .= " AND (`option_1`.`option_key`='main_keycase' AND `option_1`.`option_value`='true')";
						$where .= " AND (`option_2`.`option_key`='main_lawyer')";
						$where .= " AND (`option_3`.`option_key`='result')";
						$where .= " AND (`{$wpdb->prefix}kboard_board_content`.`notice`='' OR NOT `{$wpdb->prefix}kboard_board_content`.`notice`='') AND (`{$wpdb->prefix}kboard_board_content`.`status` IS NULL OR `{$wpdb->prefix}kboard_board_content`.`status`='' OR `{$wpdb->prefix}kboard_board_content`.`status`='pending_approval')";
						
						$main_keycases_sql = $wpdb->get_results("SELECT {$select} FROM {$from} WHERE {$where} ORDER BY `option_1`.`content_uid` DESC LIMIT 10", OBJECT);
						
						for($i=0; $i<count($main_keycases_sql); $i++){
							$content_uid = $main_keycases_sql[$i]->content_uid;
							$content_link = '/업무사례/?uid='.$content_uid.'&mod=document';
							
							$content_category = $main_keycases_sql[$i]->category1;
							$content_result = $main_keycases_sql[$i]->result;
							$content_title = $main_keycases_sql[$i]->title;
							$content_content = strip_tags($main_keycases_sql[$i]->content, '<br>');
							$content_thumbnail_url = $main_keycases_sql[$i]->thumbnail_file;
							$content_main_lawyer = $main_keycases_sql[$i]->main_lawyer;?>
							<div class="swiper-slide main_keycase_box">
								<a href="<?php echo $content_link?>" title="본문 보기">
									<div class="col_1">
										<div class="category">
											<?php echo $content_category?>
										</div>
										<div class="result pc">
											<span><?php echo $content_result?></span>
											<span class="play_icon">▶</span>
										</div>
										<div class="title">
											<?php echo $content_title?>
										</div>
										<div class="content">
											<?php echo $content_content?>
										</div>
									</div>
									
									<div class="col_2">
										<div class="result mobile">
											<span><?php echo $content_result?></span>
											<span class="play_icon">▶</span>
										</div>
										<img class="thumbnail" src="<?php echo $content_thumbnail_url?>">
										<?php
										switch($content_main_lawyer){
											case '김동우' : $main_keycase_lawyer_thumb_url = '/img/main_traffic_new/main_keycase_lawyer_thumb_kim.jpg'; break;
											case '박현식' : $main_keycase_lawyer_thumb_url = '/img/main_traffic_new/main_keycase_lawyer_thumb_park.jpg'; break;
											case '유선경' : $main_keycase_lawyer_thumb_url = '/img/main_traffic_new/main_keycase_lawyer_thumb_you.jpg'; break;
											case '신상민' : $main_keycase_lawyer_thumb_url = '/img/main_traffic_new/main_keycase_lawyer_thumb_shin.jpg'; break;
											case '조건명' : $main_keycase_lawyer_thumb_url = '/img/main_traffic_new/main_keycase_lawyer_thumb_joe.jpg'; break;
										}
										?>
										<div class="main_lawyer" data-test="<?php echo $content_main_lawyer?>" style="background: url(<?php echo $main_keycase_lawyer_thumb_url?>)">
										</div>
									</div>
								</a>
							</div>
						<?php }?>
					</div>
				</div>
				<div class="swiper-pagination" id="main_keycase"></div>
			</div>
			
			<!--<div class="row_2">
				<div class="hash_tag_area">
					<div class="title">
						가장 문의 많은 사례
					</div>
					<div class="hash_tags">
						<?php
						$hash_tag = array(
										'음주운전',
										'뺑소니',
										
										'교통사고',
										'도로교통법위반',
										'치상'
									);
						for($i=0; $i<count($hash_tag); $i++){?>
							<a class="hash_tag" href="/업무사례/?mod=list&keyword=<?php echo $hash_tag[$i]?>" title="<?php echo $hash_tag[$i]?> 사례 보기">#<?php echo $hash_tag[$i]?></a>
						<?php }?>
					</div>
					
					<div class="hard_code_area pc">
						<?php
						$hard_code_arr = array(
											0 => array('title' => '<span class="gold">음주운전 4회</span> 실형위기의 의뢰인', 'label_txt' => '벌금형 처분 사례 보기', 'link' => '/%EC%97%85%EB%AC%B4%EC%82%AC%EB%A1%80/?pageid=4&mod=document&keyword=%EC%8B%A4%ED%98%95&uid=2955'),
											1 => array('title' => '<span class="gold">음주측정거부</span> 음주운전 전과 의뢰인', 'label_txt' => '집행유예 처분 사례 보기', 'link' => '/%EC%97%85%EB%AC%B4%EC%82%AC%EB%A1%80/?pageid=1&mod=document&keyword=%EC%B8%A1%EC%A0%95%EA%B1%B0%EB%B6%80&uid=2997'),
											2 => array('title' => '<span class="gold">공무원</span> 혈중알코올농도 0.21% 징계위기 의뢰인', 'label_txt' => '벌금형 처분 사례 보기', 'link' => '/%EC%97%85%EB%AC%B4%EC%82%AC%EB%A1%80/?pageid=1&mod=document&keyword=%ED%98%88%EC%A4%91&uid=2988'),
											3 => array('title' => '<span class="gold">뺑소니</span> 특가법위반 처벌 앞둔 의뢰인', 'label_txt' => '구약식 처분 사례 보기', 'link' => '/%EC%97%85%EB%AC%B4%EC%82%AC%EB%A1%80/?pageid=1&mod=document&keyword=%EB%BA%91%EC%86%8C%EB%8B%88&uid=2996')
										);
						for($i=0; $i<count($hard_code_arr); $i++){?>
							<a href="<?php echo $hard_code_arr[$i]['link']?>" title="사례 보기">
								<div class="title">
									· <?php echo $hard_code_arr[$i]['title']?>
								</div>
								<div class="label">
									→　<?php echo $hard_code_arr[$i]['label_txt']?>
								</div>
							</a>
						<?php }?>
					</div>
				</div>
				
				<div class="latest_success_area">
					<div class="label">
						최신 성공 사례
					</div>
					
					<a class="more_btn" href="/업무사례" title="성공 사례 더보기">
						<img src="/img/main_traffic_new/btn_more.png">
					</a>
					
					<div class="swiper-container" id="latest_success">
						<div class="swiper-wrapper">
							<?php
							$select = "*";
							
							$from = "`{$wpdb->prefix}kboard_board_content`";
							
							$where = "`{$wpdb->prefix}kboard_board_content`.`board_id`='2'"; 
							$where .= " AND (`{$wpdb->prefix}kboard_board_content`.`notice`='' OR NOT `{$wpdb->prefix}kboard_board_content`.`notice`='') AND (`{$wpdb->prefix}kboard_board_content`.`status` IS NULL OR `{$wpdb->prefix}kboard_board_content`.`status`='' OR `{$wpdb->prefix}kboard_board_content`.`status`='pending_approval')";
							
							$latest_success_sql = $wpdb->get_results("SELECT {$select} FROM {$from} WHERE {$where} ORDER BY `{$wpdb->prefix}kboard_board_content`.`uid` DESC LIMIT 7", OBJECT);
							
							for($i=0; $i<count($latest_success_sql); $i++){
								$content_uid = $latest_success_sql[$i]->uid;
								$content_link = '/업무사례/?uid='.$content_uid.'&mod=document';
								
								$content_title = $latest_success_sql[$i]->title;
								$content_content = strip_tags($latest_success_sql[$i]->content, '<br>');
								$content_thumbnail_url = $latest_success_sql[$i]->thumbnail_file;?>
								<div class="swiper-slide main_keycase_box">
									<a href="<?php echo $content_link?>" title="본문 보기">
										<div class="title mobile">
											<?php echo $content_title?>
										</div>
										
										<div class="col_1">
											<div class="title pc">
												<?php echo $content_title?>
											</div>
											<div class="content">
												<?php echo $content_content?>
											</div>
											
											<img class="thumbnail mobile" src="<?php echo $content_thumbnail_url?>">
										</div>
										
										<div class="col_2 pc">
											<img class="thumbnail" src="<?php echo $content_thumbnail_url?>">
										</div>
									</a>
								</div>
							<?php }?>
						</div>
					</div>
					<div class="swiper-pagination" id="latest_success"></div>
				</div>
			</div>-->
		</div>
	</section>
	
	
	<script>
		var main_keycase_swiper = new Swiper('#main_keycase.swiper-container',  {
			slidesPerView: 1,
			spaceBetween: 30,
			//speed: 1000,
			pagination: {
					el: '#main_keycase.swiper-pagination',
					clickable : true,
				},
			observer: true,
			observeParents: true,
			preloadImages: true,
			loop: true,
			autoplay: {
				delay: 2000,
			},
			breakpoints : { // 반응형 설정이 가능 width값으로 조정
				600 : {
					slidesPerView : 2,
					autoplay: {
						delay: 4000,
					},
				},
			},
		});
		
		var latest_success_swiper = new Swiper('#latest_success.swiper-container',  {
			slidesPerView: 1,
			spaceBetween: 0,
			//speed: 1000,
			pagination: {
					el: '#latest_success.swiper-pagination',
					clickable : true,
				},
			pause_on_hover:"yes",
			observer: true,
			observeParents: true,
			preloadImages: true,
			loop: true,
			autoplay: {
				delay: 2000,
				//pauseOnMouseEnter: true,
			},
			breakpoints : { // 반응형 설정이 가능 width값으로 조정
				1024 : {
					spaceBetween: 30,
				},
			},
		});
		
	
		var count_number1 = $('.count_number.one')[0] ? $('.count_number.one')[0].innerHTML : '';
		
		var isVisible = false;

		$(window).on('scroll', function() {
			if (checkVisible($('#section3 .title')) && !isVisible) {
				$({ val : 0 }).animate({ val : count_number1 }, {
					duration: 2500,
					step: function() {
						var num = comma(Math.floor(this.val));
						$(".count_number.one").text(num);
					},
					complete: function() {
						var num = comma(Math.floor(this.val));
						$(".count_number.one").text(num);
					}
				});

				isVisible=true;
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
		
		//천 단위 콤마 붙여주기 위한 함수
		function comma(price) {
			return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
		}
	</script>
	
	<!-- 전문로펌 -->
	<section class="lawfirm", id="section0">
        <img class="pc" src="/img/main_traffic_new/strongpoint_pc.png">
		<img class="mobile" src="/img/main_traffic_new/strongpoint_m.jpg">
	</section>
	
	<!-- section4 -->
	<section id="section4">
		<div class="set">
			<div class="txt_area">
				<div class="title_1">
					꼭 기억하세요!<br>
					교통·음주 사건은, <b><span class="dot_txt">골</span><span class="dot_txt">든</span><span class="dot_txt">타</span><span class="dot_txt">임</span></b>이 <b>중요</b>합니다.
				</div>
				
				<div class="msg pc">
					에이앤랩은 형사법전문변호사, 서울중앙지검 검사출신 변호사, 서울경찰서 자문 변호사 등<br>
					의뢰인의 긴급사안 접수 시, 즉각 TF팀으로 대응전략을 세웁니다.
				</div>
				<div class="msg mobile">
					에이앤랩은 의뢰인의 긴급사안 접수 시,<br>
					형사법 전문변호사, 서울중앙지검 검사출신 변호사, 서울경찰서<br>
					자문 변호사 등으로 구성된 TF팀으로 대응 전략을 세웁니다.
				</div>
				
				<div class="speech_bubble">
					음주운전으로 금고형 이상 선고 시<br>
					<span class="big"><b>해고</b>/<b>면직</b>/<b>당연퇴직</b> 사유</span>
				</div>
				
				<div class="title_2">
					공무원, 교사, 회사원
					<div class="main_title">
						<b>징계위기 대응 전문 로펌</b>에 문의하세요.
					</div>
				</div>
				
				<div class="table">
					<div class="col pc">
						교통음주 전담 변호사<br>
						<b>긴급 TF팀 구성</b>
					</div>
					
					<div class="col separator pc">
						▶
					</div>
					
					<div class="col pc">
						유리한 양형사유 분석<br>
						<b>감형 전략 구상</b>
					</div>
					
					<div class="col separator pc">
						▶
					</div>
					
					<div class="col pc">
						벌금, 기소유예 등<br>
						<b>징계/처벌 문제해결</b>
					</div>
					
					<div class="col mobile">
						교통음주 전담 변호사 <b>긴급 TF팀 구성</b><br>
						▼<br>
						유리한 양형사유 분석 <b>감형 전략 구상</b><br>
						▼<br>
						벌금, 기소유예 등 <b>징계/처벌 문제해결</b>
					</div>
				</div>
			</div>
			
			<div class="cellphone">
				<img class="pc" src="/img/main_traffic_new/cellphone.png">
				<img class="mobile" src="/img/main_traffic_new/cellphone_mobile.png">
				<a class="blink" href="<?php echo $kakao?>" title="카카오톡 상담"></a>
			</div>
		</div>
		<!--<div class="certificate">
			<div class="title">
				"전문가의 도움, 이제 <span class="blue"><b>필수</b></span>입니다."
			</div>
			<?php
			$certificate_img_src = array(
							'/img/main_traffic_new/증명서/certificate_1.png',
							'/img/main_traffic_new/증명서/certificate_2.png',
							'/img/main_traffic_new/증명서/certificate_3.png',
							'/img/main_traffic_new/증명서/certificate_4.png',
							'/img/main_traffic_new/증명서/certificate_5.png',
							'/img/main_traffic_new/증명서/certificate_6.png',
							'/img/main_traffic_new/증명서/certificate_7.png',
							'/img/main_traffic_new/증명서/certificate_8.png',
							'/img/main_traffic_new/증명서/certificate_9.png',
							'/img/main_traffic_new/증명서/certificate_10.png',
							'/img/main_traffic_new/증명서/certificate_11.png',
							'/img/main_traffic_new/증명서/certificate_12.png'
						);
			if ( !wp_is_mobile() ) {
			?>
			<div class="swiper-container pc" id="certificate">
				<div class="swiper-wrapper">	
					<?php for($i=0; $i<30; $i++){?>
						<?php for($j=0; $j<count($certificate_img_src); $j++){?>
							<div class="swiper-slide">
								<div class="img-box">
									<img src="<?php echo $certificate_img_src[$j]?>">
								</div>
							</div>
						<?php }?>
					<?php }?>
				</div>
			</div>
			
			<div class="bg_area pc"></div>
			<?php }?>
			
			<img class="certificate_img mobile" src="/img/main_traffic_new/certificate_mobile.png">
		</div>-->
	</section>
	<!-- section6 -->
	<section id="section6">
		<div class="title">
			형사사건 로펌이 아닌,<br>
			<span class="main_title"><b><span class="blue">교통 · 음주특화 로펌</span></b>이 필요한 이유</span>
		</div>
		
		<div class="img_area">
			<div class="img_side pc"></div>
			
			<div class="img_1">
				<div class="title">
					교통/음주 <b>전담팀</b>
				</div>
				<div class="txt">
					· 형사법 전문 변호사<br>
					· 경찰서 자문위원 변호사<br>
					· 공무원/교사 면책 대응 TF팀
				</div>
			</div>
			
			<div class="img_2">
				<div class="title">
					분석센터 <b>협약</b>
				</div>
				<div class="txt">
					· CCTV, 블랙박스 영상 분석<br>
					· 알콜중독 검사기관 협력
				</div>
			</div>
			
			<div class="img_3">
				<div class="title">
					<b>형량예측</b> 시스템
				</div>
				<div class="txt">
					· 형사 판결문 통계 데이터 구축<br>
					· 형량 정보, 형량 선고 추세 분석<br>
					· 예측 결과로 맞춤 상담 진행
				</div>
				
				<div class="circle_area">
					<span class="circle_1">단, 8개 문항</span>
					<span class="circle_2">익명제출</span>
				</div>
				<div class="system_btn pc" onclick="survey_popup_open()">
					지금 바로 확인하기
				</div>
				<div class="system_btn mobile" onclick="survey_popup_open()">
					지금 바로<br>
					확인하기
				</div>
			</div>
			
			<div class="img_side pc"></div>
		</div>
	</section>
	
	
	<!-- section9 -->
	<section id="section9">
		<img class="procedure pc" src="/img/main_traffic_new/procedure_pc.png">
		<img class="procedure mobile" src="/img/main_traffic_new/procedure_m.png">
	</section>
	

	<!-- section5 -->
	<section id="section5">
		<?php
		$arrow_right_red = '<img src="/img/main_traffic_new/arrow_right_red.png">';
		$arrow_right_blue = '<img src="/img/main_traffic_new/arrow_right_blue.png">';
		?>
		<div class="title">
			에이앤랩 솔루션
		</div>
	
		<div class="drunk_area">
			<div class="item">
				<div class="label">
					음주운전
				</div>
				
				<div class="question_btn first" onclick="drunk_answer_img_open('음주운전처벌')">
					음주운전 처벌은 어떻게 되죠?
					<?php echo $arrow_right_red?>
				</div>
				<div class="question_btn second" onclick="drunk_answer_img_open('음주측정거부')">
					음주측정을 거부했습니다.
					<?php echo $arrow_right_red?>
				</div>
				<div class="question_btn third" onclick="drunk_answer_img_open('면허구제')">
					면허구제를 받을 수 있나요?
					<?php echo $arrow_right_red?>
				</div>
				<div class="question_btn fourth" onclick="drunk_answer_img_open('변호사선임')">
					변호사 선임이 필요할까요?
					<?php echo $arrow_right_red?>
				</div>
			</div>
		</div>
		
		<div class="accident_area">
			<div class="item">
				<div class="label">
					교통사고
				</div>
				
				<div class="question_btn first" onclick="accident_answer_img_open('뺑소니사고')">
					뺑소니 사고를 냈습니다.
					<?php echo $arrow_right_blue?>
				</div>
				<div class="question_btn second" onclick="accident_answer_img_open('사망상해')">
					사망, 상해사고를 일으켰어요.
					<?php echo $arrow_right_blue?>
				</div>
				<div class="question_btn third" onclick="accident_answer_img_open('음주뺑소니')">
					음주뺑소니를 저질렀어요.
					<?php echo $arrow_right_blue?>
				</div>
				<div class="question_btn fourth" onclick="accident_answer_img_open('변호사선임')">
					변호사 선임 시, 뭐가 달라지죠?
					<?php echo $arrow_right_blue?>
				</div>
			</div>
		</div>
	</section>
	
	
	<div class="drunk_answer_background" onclick="drunk_answer_img_close()">
		<div class="swiper-container" id="drunk_answer_img">
			<!--닫힘 버튼-->
			<div class="close_btn">
				<i class="xi-close" onclick="drunk_answer_img_close()"></i>
			</div>
			
			<div class="swiper-wrapper">
				<!--스크립트로 채워질 영역-->
			</div>
		</div>
		<div class="swiper-button-next" id="drunk_answer_img"></div>
		<div class="swiper-button-prev" id="drunk_answer_img"></div>
		<div class="swiper-pagination" id="drunk_answer_img"></div>
	</div>
	
	<div class="accident_answer_background" onclick="accident_answer_img_close()">
		<div class="swiper-container" id="accident_answer_img">
			<!--닫힘 버튼-->
			<div class="close_btn">
				<i class="xi-close" onclick="accident_answer_img_close()"></i>
			</div>
			
			<div class="swiper-wrapper">
				<!--스크립트로 채워질 영역-->
			</div>
		</div>
		<div class="swiper-button-next" id="accident_answer_img"></div>
		<div class="swiper-button-prev" id="accident_answer_img"></div>
		<div class="swiper-pagination" id="accident_answer_img"></div>
	</div>
	
	
	<script>
		// 음주운전 모달
		function drunk_answer_img_open(img_file_name){
			var swiper_slide_html = '';
			
			if(jQuery(window).outerWidth() < 1025){
				var img_file_count = 3;
				
				for(var i=1; i<=img_file_count; i++){
					swiper_slide_html += '<div class="swiper-slide"><img class="drunk_question_img" src="/img/main_traffic_new/음주/' + img_file_name + '' + i + '_mobile.png"></div>';
				}
			}else{
				var img_file_count = 1;
				
				for(var i=1; i<=img_file_count; i++){
					swiper_slide_html += '<div class="swiper-slide"><img class="drunk_question_img" src="/img/main_traffic_new/음주/' + img_file_name + '' + i + '.png"></div>';
				}
			}

			
			jQuery('.drunk_answer_background .swiper-wrapper')[0].innerHTML = swiper_slide_html;
			jQuery('.drunk_answer_background').fadeIn();
		}
		
		function drunk_answer_img_close(){
			jQuery('.drunk_answer_background').fadeOut();
			jQuery('.drunk_answer_background .swiper-pagination .swiper-pagination-bullet')[0].click();
		}
		
		var drunk_answer_img_Swiper = new Swiper('#drunk_answer_img.swiper-container',  {
			slidesPerView: 1,
			spaceBetween: 5,
			pagination: {
				el: '#drunk_answer_img.swiper-pagination',
					  clickable : true,
			},
			navigation: {
				nextEl: '#drunk_answer_img.swiper-button-next',
				prevEl: '#drunk_answer_img.swiper-button-prev',
			},
			observer: true,
			observeParents: true,
			preloadImages: true,
		});


		// 교통사고 모달
		function accident_answer_img_open(img_file_name){
			var swiper_slide_html = '';
			
			if(jQuery(window).outerWidth() < 1025){
				var img_file_count = 3;
				
				for(var i=1; i<=img_file_count; i++){
					swiper_slide_html += '<div class="swiper-slide"><img class="accident_question_img" src="/img/main_traffic_new/교통/' + img_file_name + '' + i + '_mobile.png"></div>';
				}
			}else{
				var img_file_count = 1;
				
				for(var i=1; i<=img_file_count; i++){
					swiper_slide_html += '<div class="swiper-slide"><img class="accident_question_img" src="/img/main_traffic_new/교통/' + img_file_name + '' + i + '.png"></div>';
				}
			}
			
			jQuery('.accident_answer_background .swiper-wrapper')[0].innerHTML = swiper_slide_html;
			jQuery('.accident_answer_background').fadeIn();
		}
		
		function accident_answer_img_close(){
			jQuery('.accident_answer_background').fadeOut();
			jQuery('.accident_answer_background .swiper-pagination .swiper-pagination-bullet')[0].click();
		}
		
		var accident_answer_img_Swiper = new Swiper('#accident_answer_img.swiper-container',  {
			slidesPerView: 1,
			spaceBetween: 5,
			pagination: {
				el: '#accident_answer_img.swiper-pagination',
					  clickable : true,
			},
			navigation: {
				nextEl: '#accident_answer_img.swiper-button-next',
				prevEl: '#accident_answer_img.swiper-button-prev',
			},
			observer: true,
			observeParents: true,
			preloadImages: true,
		});
	</script>
	
	
	<!-- section7 -->
	<section id="section7">
		<div class="title">
			<div class="sub_title">
				에이앤랩 의뢰인의
			</div>
			<div class="main_title">
				감사 후기
			</div>
		</div>
		
		<div class="img_area">
			<div class="swiper-container" id="latest_thanks">
				<div class="swiper-wrapper">
					<?php
					$option_name_arr = array(
						'major_lawyer',
						//'lawyer'
					);
					
					$select = "*";
					
					$from = "`{$wpdb->prefix}kboard_board_content`";
					
					$where = "`{$wpdb->prefix}kboard_board_content`.`board_id`='5'"; 
					$where .= " AND (`{$wpdb->prefix}kboard_board_content`.`notice`='' OR NOT `{$wpdb->prefix}kboard_board_content`.`notice`='') AND (`{$wpdb->prefix}kboard_board_content`.`status` IS NULL OR `{$wpdb->prefix}kboard_board_content`.`status`='' OR `{$wpdb->prefix}kboard_board_content`.`status`='pending_approval')";
					
					

					for($i=0; $i<count($option_name_arr); $i++){
						$option_name = $option_name_arr[$i];
						
						$select .= ", `{$option_name}`.`option_value` AS `{$option_name}`";
						$from .= " LEFT JOIN `{$wpdb->prefix}kboard_board_option` AS `{$option_name}` ON `{$wpdb->prefix}kboard_board_content`.`uid`=`{$option_name}`.`content_uid`";						
						$where .= " AND (`{$option_name}`.`option_key`='{$option_name}')";
					}
					
					
					$latest_thanks_sql = $wpdb->get_results("SELECT {$select} FROM {$from} WHERE {$where} ORDER BY `{$wpdb->prefix}kboard_board_content`.`uid` DESC LIMIT 7", OBJECT);

					for($i=0; $i<count($latest_thanks_sql); $i++){
						$content_uid = $latest_thanks_sql[$i]->uid;
						$content_link = '/고객후기/?uid='.$content_uid.'&mod=document';
						
						$content_title = $latest_thanks_sql[$i]->title;
						$content_content = strip_tags($latest_thanks_sql[$i]->content, '<br>');
						$content_thumbnail_url = $latest_thanks_sql[$i]->thumbnail_file;?>
						<div class="swiper-slide col" onclick="latest_modal('open', '<?php echo $content_uid?>')">
							<!--<a href="<?php echo $content_link?>" title="본문 보기">-->
								<img src="<?php echo $content_thumbnail_url?>">
				
								<div class="title">
									<?php echo $content_title?>
								</div>
								
								<div class="content">
									<?php echo $content_content?>
								</div>
							<!--</a>-->
						</div>
					<?php }?>
				</div>
			</div>
			<div class="swiper-button-next pc" id="latest_thanks"></div>
			<div class="swiper-button-prev pc" id="latest_thanks"></div>
			<!--<div class="swiper-pagination" id="latest_thanks"></div>-->
		</div>
		
		<?php for($i=0; $i<count($latest_thanks_sql); $i++){
				$content_uid = $latest_thanks_sql[$i]->uid;
				$content_link = '/고객후기/?uid='.$content_uid.'&mod=document';
				
				$content_title = $latest_thanks_sql[$i]->title;
				$content_content = strip_tags($latest_thanks_sql[$i]->content, '<br>');
				$content_thumbnail_url = $latest_thanks_sql[$i]->thumbnail_file;
				
				$content_major_lawyer = $latest_thanks_sql[$i]->major_lawyer;
				$content_lawyer = $latest_thanks_sql[$i]->lawyer;?>
				<!-- 모달창 기능 영역 -->
				<div class="latest_modal_bg_<?php echo $content_uid?>">
					<div class="latest_modal">
						<div class="left_top_txt pc">
							의뢰인 후기
						</div>
						
						<div class="close_btn" onclick="latest_modal('close', '<?php echo $content_uid?>')">
							<i class="xi-close-thin"></i>
						</div>
						
						<div class="modal_header">
							"<?php echo $content_title?>"
						</div>
						
						<div class="modal_body">
							<div class="col_1" style="background-image:url(<?php echo $content_thumbnail_url?>);">
							</div>
							
							<div class="col_2">
								<div class="content_area">
									<?php
									$content_txt = preg_replace("/<img[^>]+\>/i","",$content_content);
									$content_txt = preg_replace("/<p[^>]+\>/i","",$content_txt);
									echo $content_txt?>
								</div>
								
								<div class="lawyer_area">
									<?php
									$name = Array(
										0 => '유선경',
										1 => '신상민',
										2 => '김동우',
										3 => '박현식',
										4 => '조건명',
										5 => '정은지',
										6 => '임효정',
										7 => '김동완',
										8 => '박상룡',
										9 => '최근창',
										10 => '김현정',
										11 => '신성혁');
										
									$lawyer = Array(
										'0' => Array('name' => '유선경', 'url' => 'http://trustnlab.co.kr/wp-content/uploads/2021/06/유선경-300x300-1.png'),
										'1' => Array('name' => '신상민', 'url' => 'http://trustnlab.co.kr/wp-content/uploads/2021/05/신상민-1-300x300-1.png'),
										'2' => Array('name' => '김동우', 'url' => 'http://trustnlab.co.kr/wp-content/uploads/2021/06/김동우-300x300-1.png'),
										'3' => Array('name' => '박현식', 'url' => 'http://trustnlab.co.kr/wp-content/uploads/2021/06/박현식-300x300-1.png'),
										'4' => Array('name' => '조건명', 'url' => 'http://trustnlab.co.kr/wp-content/uploads/2021/06/조건명-300x300-1.png'),
										'5' => Array('name' => '정은지', 'url' => 'http://anlab.co.kr/bitnami/wordpress/wp-content/uploads/2021/09/5정은지.png'),
										'6' => Array('name' => '임효정', 'url' => 'http://anlab.co.kr/bitnami/wordpress/wp-content/uploads/2021/09/lim.png'),
										'7' => Array('name' => '김동완', 'url' => 'http://anlab.co.kr/bitnami/wordpress/wp-content/uploads/2021/09/kim2.png'),
										'8' => Array('name' => '박상룡', 'url' => 'http://anlab.co.kr/bitnami/wordpress/wp-content/uploads/2022/03/박상균.png'),
										'9' => Array('name' => '최근창', 'url' => 'http://anlab.co.kr/bitnami/wordpress/wp-content/uploads/2021/09/choi.png'),
										'10' => Array('name' => '김현정', 'url' => '/wp-content/uploads/2022/03/kimhj300.png'),
										'11' => Array('name' => '신성혁', 'url' => '/wp-content/uploads/2022/03/shinsh300.png')
										);
									?>
									<div class="pic-wrap">
										<?php if($content_major_lawyer){?>
											<?php for($k=0; $k<count($name);$k++){?>
												<?php if($content_major_lawyer == $name[$k]){?>
													<div class="pic">
														<div class="lawyerpic" style="background-image:url(<?php echo $lawyer[$k]['url']?>);"></div>
														<div class="lawyername"><?php echo $content_major_lawyer?></div>
													</div>
												<?php }?>
											<?php }?>
										<?php }?>
													
													
										<?php if(is_array($content_lawyer)){?>
											<?php for($k=0; $k<count($content_lawyer); $k++):?>
												<?php for($j=0; $j<count($name);$j++){?>
													<?php if($content_lawyer[$k] == $name[$j]){?>
														<div class="pic">
															<div class="lawyerpic" style="background-image:url(<?php echo $lawyer[$j]['url']?>);"></div>
															<div class="lawyername"><?php echo $content_lawyer[$k]?></div>
														</div>
													<?php }?>
												<?php }?>
											<?php endfor?>
										<?php }else{?>
											<?php for($k=0; $k<1; $k++):?>
												<?php for($j=0; $j<count($name);$j++){?>
													<?php if($content_lawyer == $name[$j]){?>
														<div class="pic">
															<div class="lawyerpic" style="background-image:url(<?php echo $lawyer[$j]['url']?>);"></div>
															<div class="lawyername"><?php echo $content_lawyer?></div>
														</div>
													<?php }?>
												<?php }?>
											<?php endfor?>
										<?php }?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		<?php }?>
	</section>
	
	<script>
		var latest_thanks_swiper = new Swiper('#latest_thanks.swiper-container',  {
			slidesPerView: 1.7,
			spaceBetween: 20,
			centeredSlides: true,
			/*
			pagination: {
					el: '#latest_thanks.swiper-pagination',
					clickable : true,
				},
			*/
			navigation: {
				nextEl: '#latest_thanks.swiper-button-next',
				prevEl: '#latest_thanks.swiper-button-prev',
			},
			observer: true,
			observeParents: true,
			preloadImages: true,
			loop: true,
			autoplay: {
				delay: 2000,
			},
			breakpoints : { // 반응형 설정이 가능 width값으로 조정
				600 : {
					slidesPerView : 3,
					spaceBetween: 40,
				},
			},
		});
		
		
		// 모달창
		function latest_modal(action, id){
			if(action == 'open'){
				jQuery('.latest_modal_bg_'+id).fadeIn();
				jQuery('section .container').css('z-index', 'unset');
			}else{
				jQuery('.latest_modal_bg_'+id).fadeOut();
				jQuery('section .container').css('z-index', '');
			}
		}
		
		jQuery('body').on('click', function(e){
			if( jQuery(event.target).attr('class') != '' ){
				if( jQuery(event.target).attr('class').indexOf('latest_modal_bg_') > -1 ){
					jQuery('[class^=latest_modal_bg_]').fadeOut();
					jQuery('section .container').css('z-index', '');
				}
			}
		});
	</script>
	
	
	
	
	
	
	<!-- section8 -->
	<!--<section id="section8">
		<div class="title">
			당신의 일상에 힘이되는, 프리미엄 법률서비스를 위해
			<div class="main_title">
				에이앤랩은 오늘도 최선을 다하겠습니다.
			</div>
		</div>
	</section>-->

	
	<!-- 수정사항(새로 생성), 미디어 섹션 ->
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
				preloadImages: true,
				loop: true,
				autoplay: {
					delay: 2000,
				},
			});
		</script>
    </section>
	<!-- 수정사항(새로 생성), 미디어 섹션 -->
	
	
	
    <section class="office">
        <div class="container">
            <div class="row section__desc fade-item">
				<div class="col-lg-6 mobile">
					<div class="location_btn seoul on" onclick="map_make('seoul')">서울본사</div>
					<div class="location_btn incheon" onclick="map_make('incheon')">인천</div>
					<div class="location_btn suwon" onclick="map_make('suwon')">수원</div>
					<div class="location_btn daegu" onclick="map_make('daegu')">대구</div>
					
                    <div class="info seoul">
						<div class="address_txt">
							<b>서울시 서초구 강남대로 337</b> (337빌딩 13층)
						</div>
						<div class="address_find">
							<span class="line_2">2호선</span> <span class="line_bundang">분당선</span> 강남역 <span class="number">5</span>번 출구 → 도보 3분
						</div>
                    </div>
					
					<div class="info incheon">
						<div class="address_txt">
							<b>인천 연수구 송도동 30-3</b> (송도 센트로드 A동 2807호)
						</div>
						<div class="address_find">
							<span class="line_1">인천1호선</span> 국제업무지구역<span class="number">1</span>번 출구 → 도보 3분
						</div>
                    </div>
					
					<div class="info suwon">
						<div class="address_txt">
							<b>경기 수원시 영통구 광교중앙로248번길 7-2</b> (원희캐슬법조타운 A동 602호)
						</div>
						<div class="address_find">
							<span class="line_bundang">신분당선</span> 상현역 <span class="number">3</span>번 출구 → 도보 10분
						</div>
                    </div>
					
					<div class="info daegu">
                        <div class="address_txt">
							<b>대구광역시 달서구 장산남로 21, 706호</b>
						</div>
						<div class="address_find">
							<span class="line_2">대구 2호선</span> 용산역 <span class="number">6</span>번 출구 → 도보 3분
						</div>
                    </div>
				</div>
				
				<div class="col_1">
                    <script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId=1tepevxu97"></script>
					<div id="map"></div>
					
					<style>
						#map {height:266px;}
						/*
						.location_btn {display: inline-block; font-size: 18px; background: #3b598b; position: absolute; padding: 5px 30px; top: -37px; right: 15px; cursor: pointer;}
						.location_btn.on {background: rgba(0,0,0,.5);}
						
						@media all and (max-width:430px){
							.location_btn {font-size:15px; top: -33px;}
						}
						
						@media all and (min-width:992px){
							#map {top: -37px;}
						}
						*/
					</style>
                </div>
				
                <div class="col_2">
					<div class="location_btn seoul pc on" onclick="map_make('seoul')">서울본사</div>
					<div class="location_btn incheon pc" onclick="map_make('incheon')">인천</div>
					<div class="location_btn suwon pc" onclick="map_make('suwon')">수원</div>
					<div class="location_btn daegu pc" onclick="map_make('daegu')">대구</div>
					
                    <div class="info seoul pc">
						<div class="address_txt">
							<b>서울시 서초구 강남대로 337</b> (337빌딩 13층)
						</div>
						<div class="address_find">
							<span class="line_2">2호선</span> <span class="line_bundang">신분당선</span> 강남역 <span class="number">5</span>번 출구 → 도보 3분
						</div>
                    </div>
					
					<div class="info incheon pc">
						<div class="address_txt">
							<b>인천 연수구 송도동 30-3</b> (송도 센트로드 A동 2807호)
						</div>
						<div class="address_find">
							<span class="line_1">인천1호선</span> 국제업무지구역<span class="number">1</span>번 출구 → 도보 3분
						</div>
                    </div>
					
					<div class="info suwon pc">
						<div class="address_txt">
							<b>경기 수원시 영통구 광교중앙로248번길 7-2</b> (원희캐슬법조타운 A동 602호)
						</div>
						<div class="address_find">
							<span class="line_bundang">신분당선</span> 상현역 <span class="number">3</span>번 출구 → 도보 10분
						</div>
                    </div>
					
					<div class="info daegu pc">
                        <div class="address_txt">
							<b>대구광역시 달서구 장산남로 21, 706호</b>
						</div>
						<div class="address_find">
							<span class="line_2">대구 2호선</span> 용산역 <span class="number">6</span>번 출구 → 도보 3분
						</div>
                    </div>
					
					<div class="tel_area">
						<div class="col_1">
							대표번호. <a class="big" href="tel:02-538-0337" title="대표번호 전화 걸기">02.538.0337</a>
						</div>
						
						<div class="col_2">
							긴급상담. <a class="big" href="tel:010-6626-0337" title="긴급상담 전화 걸기">010.6626.0337</a>
						</div>
					</div>
                </div>
            </div>
        </div>
		
		<script>
			function map_make(location){
				jQuery('.location_btn').removeClass(' on');
				
				if(!jQuery('.location_btn.'+location).hasClass('on')){
					jQuery('.location_btn.'+location).addClass(' on');
				}
				
				jQuery('.office .info').hide();
				jQuery('.office .info.'+location).fadeIn();
				
				
				jQuery('#map')[0].innerHTML = '';
				
				
				var HOME_PATH = window.HOME_PATH || '.';

				switch (location){
					case 'seoul' :		var cityhall = new naver.maps.LatLng(37.4930632,127.0294633); break;
					case 'incheon' :	var cityhall = new naver.maps.LatLng(37.398908,126.630267); break;
					case 'suwon' :		var cityhall = new naver.maps.LatLng(37.2912578,127.066885); break;
					case 'daegu' :		var cityhall = new naver.maps.LatLng(35.851707,128.5280119);/*35.851707,128.5258119*/ break;
				}
				
					var map = new naver.maps.Map('map', {
						center: cityhall.destinationPoint(0, 50),
						
						zoom: 16
					}),
					marker = new naver.maps.Marker({
						map: map,
						position: cityhall
					});

				if(location == 'seoul'){
					var contentString = [
							'<div class="iw_inner">',
							'   <h6>법무법인 에이앤랩</h6>',
							'   <p>서울시 서초구 강남대로 337 13층 </p>',
							' <div class="link"><a href="https://naver.me/xuI1R0X8" target="_blank">네이버 지도 보기</a></div>',
							'</div>'
						].join('');
				}
				if(location == 'incheon'){
					var contentString = [
							'<div class="iw_inner">',
							'   <h6>법무법인 에이앤랩</h6>',
							'   <p>인천 연수구 송도동 30-3 송도 센트로드 A동 2807호 </p>',
							' <div class="link"><a href="https://naver.me/FAQ5au5k" target="_blank">네이버 지도 보기</a></div>',
							'</div>'
						].join('');
				}
				if(location == 'suwon'){
					var contentString = [
							'<div class="iw_inner">',
							'   <h6>법무법인 에이앤랩</h6>',
							'   <p>경기 수원시 영통구 광교중앙로248번길 7-2 원희캐슬법조타운 A동 602호 </p>',
							' <div class="link"><a href="https://naver.me/5s92QWgB" target="_blank">네이버 지도 보기</a></div>',
							'</div>'
						].join('');
				}
				if(location == 'daegu'){
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
			
			jQuery(window).on('load', function(){
				map_make('seoul');
			});
		</script>
    </section>
</main>

<?php get_footer(); ?>
