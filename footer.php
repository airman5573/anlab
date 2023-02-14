<?php 
$www = get_stylesheet_directory_uri();

?>    
<head>
<!--<link rel="stylesheet" type="text/css" href="http://anlab.co.kr/wp-content/themes/trustlab/style2.css">-->
</head>


<!-- 개인정보 수집 이용 동의서 모달 시작 -->
<div class="main_privacy_modal">
	<div class="main_privacy_title">
		법무법인 에이앤랩 개인정보 수집•이용 관련 동의서
	</div>
	<div class="main_privacy_content">
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
					<td>성명, 전화번호, 상담내용</td>
					<td>법률상담 및 관련 법률 서비스 제공, 고충 처리</td>
					<td>개인정보의 수집 및 이용목적 달성시까지(다만, 법령에 따라 보유ㆍ이용기간이 정해진 경우에는 그에 따름)</td>
				</tr>
			</tbody>
		</table>
		고객은 개인정보 수집 동의를 거부하실 수 있습니다. 다만 필수항목의 수집 및 이용을 거부하는 경우 법률상담 등 서비스 제공이 불가할 수 있습니다.
	</div>
	
	<span class="main_privacy_modal_close_btn" onclick="main_privacy_close();"></span>
</div>

<style>
	.main_privacy_btn,
	.main_privacy_modal_close_btn {cursor: pointer;}
	
	.main_privacy_modal {display:none; font-size: 14px; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999; width: 50%; max-width:620px; height: auto; padding: 20px; background: #eee; box-shadow: 0px 0px 9px 1px #a3a3a3;}
	.main_privacy_modal .main_privacy_title {font-size: 1.5em; font-weight: bold; text-align: center; margin-bottom: 20px;}
	
	.main_privacy_modal .main_privacy_content {line-height: 22px;}
	
	.main_privacy_modal table {font-size: .9em; margin: 15px 0;}
	.main_privacy_modal table td {border: 1px solid #858585;}
	.main_privacy_modal table thead td {padding-top: 5px; border-bottom-width: 0;}
	.main_privacy_modal table tbody td {padding: 10px;}
	
	.main_privacy_modal .main_privacy_modal_close_btn {position: absolute; top: 15px; right: 15px; cursor: pointer; width: 35px; height: 35px;}
	.main_privacy_modal .main_privacy_modal_close_btn:before {content: ""; display: inline-block; position: absolute; width: 1px; height: 35px; background-color: #000; left: 50%; transform: rotate(-45deg) translateX(-50%);}
	.main_privacy_modal .main_privacy_modal_close_btn:after {content: ""; display: inline-block; position: absolute; width: 1px; height: 35px; background-color: #000; left: 50%; transform: rotate(-135deg) translateX(-50%);}
	
	@media all and (max-width: 770px){
		.main_privacy_modal {width: 90%; max-width:unset;}
	}
	@media all and (max-width: 600px){
		.main_privacy_modal {top: unset; bottom: -90px;}
		.main_privacy_modal .main_privacy_title {margin-top: 30px;}
	}
</style>

<script>
	function main_privacy_open(){
		jQuery('.main_privacy_modal').fadeIn();
	}
	function main_privacy_close(){
		jQuery('.main_privacy_modal').fadeOut();
	}
</script>
<!-- 개인정보 수집 이용 동의서 모달 끝 -->


<footer>
	<div class="set">
		<div class="intro">
			<div class="link_area">
				<a href="#">개인정보처리방침</a>
				<a href="#">이용약관</a>
				<a href="/업무사례">사건별 성공사례</a>
			</div>
			
			<div class="title">
				24시 전문법률상담<br>
				<a class="tel" href="tel:02-538-0337" title="전화 걸기">02.538.0337</a>
			</div>
			
			<div class="txt pc">
				법무법인 에이앤랩 | 대표변호사 : 유선경 | 광고책임변호사 : 박현식, 조건명<br>
				서울시 서초구 강남대로 337 (337빌딩 10층, 13층)<br>
				사업자등록번호 : 856-87-02168<br>
				대표번호 : 02)538-0337 | Fax : 02)538-4876 | E-mail : help@anlab.co.kr<br>
				Coyright © 2021 A&Lab. All rights reserved.
			</div>
			<div class="txt mobile">
				<span class="highlight">법무법인 에이앤랩</span><br>
				대표변호사 : 유선경 | 광고책임변호사 : 박현식, 조건명<br>
				사업자등록번호 : 856-87-02168<br>
				서울시 서초구 강남대로 337 (337빌딩 10층, 13층)<br>
				대표번호 : 02)538-0337<br>
				Fax : 02)538-4876 | E-mail : help@anlab.co.kr<br>
				<br>
				Coyright © 2021 A&Lab. All rights reserved.
			</div>
		</div>
		
		<img class="footer_logo" src="/img/main_traffic_new/footer_logo.png">
	</div>
</footer>
<!--<div class="floating_cta">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="content">
                    <div class="phone">
                        <h6>이혼/상속 전문 상담 <strong>02.538.0340</strong></h6>
                    </div>
                    <div class="form_wrap">
                        <div class="form_title ">
                            <h6>
                                어떤 이야기라도 들려주세요.
                            </h6>
                        </div>
                        <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]') ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <ul class="nav">
                    <?php if( have_rows('floating_loop', 'options') ): ?>
                        <?php while( have_rows('floating_loop', 'options') ): the_row();?>
                        <li>
                            <a href="<?php the_sub_field('url'); ?>" target="<?php the_sub_field('target'); ?>" id="<?php the_sub_field('id')?>"> 
                                <div class="icon">
                                <img src="<?php the_sub_field('icon'); ?>">
                                </div>
                                
                                <div class="text"><?php the_sub_field('title'); ?></div>
                            </a>
                        </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="floating_cta_mobile">
    <ul class="nav">
        <?php if( have_rows('floating_loop_mobile', 'options') ): ?>
            <?php while( have_rows('floating_loop_mobile', 'options') ): the_row();?>
            <li>
                <a href="<?php the_sub_field('url'); ?>" target="<?php the_sub_field('target'); ?>" id="<?php the_sub_field('id')?>"> 
                    <div class="icon">
                    <img src="<?php the_sub_field('icon'); ?>">
                    </div>
                    
                    <div class="text"><?php the_sub_field('title'); ?></div>
                </a>
            </li>
            <?php endwhile; ?>
        <?php endif; ?>
    </ul>
</div>
</div>-->
<aside class="fill-background"></aside>
</div>
<?php wp_footer(); ?>

<body>

<!-- Smartlog -->
<script type="text/javascript">
var hpt_info={'_account':'UHPT-18271', '_server': 'a23'};
</script>
<script language="javascript" src="//cdn.smlog.co.kr/core/smart.js" charset="utf-8"></script>
<noscript><img src="//a23.smlog.co.kr/smart_bda.php?_account=18271" style="display:none;width:0;height:0;" border="0"/></noscript>

<!--네이버 애널리틱스 -->
<script type="text/javascript" src="//wcs.naver.net/wcslog.js"></script>
<script type="text/javascript">
if(!wcs_add) var wcs_add = {};
wcs_add["wa"] = "1804b6068a29190";
if(window.wcs) {
  wcs_do();
}
</script>

<!-- 공통 적용 스크립트 , 모든 페이지에 노출되도록 설치. 단 전환페이지 설정값보다 항상 하단에 위치해야함 --> 
<script type="text/javascript" src="//wcs.naver.net/wcslog.js"> </script> 
<script type="text/javascript"> 
if (!wcs_add) var wcs_add={};
wcs_add["wa"] = "s_41a2b1b1795b";
if (!_nasa) var _nasa={};
if(window.wcs){
wcs.inflow("xn--9d0bn3s04lntb77t3uc.com");
wcs_do(_nasa);
}
</script>


</body>
<script src="<?php echo $www ?>/vendors/jquery/jquery-3.5.1.min.js"></script>
<script src="<?php echo $www ?>/vendors/jquery/jquery.easing.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="<?php echo $www;?>/vendors/gsap/gsap.min.js"></script>
<script src="<?php echo $www;?>/vendors/gsap/ScrollTrigger.min.js"></script>
<script src="<?php echo $www;?>/vendors/gsap/ScrollToPlugin.min.js"></script>
<script src="<?php echo $www;?>/vendors/gsap/SplitText.min.js"></script>
<script src="<?php echo $www;?>/vendors/slick/slick.js"></script>
<script src="<?php echo $www;?>/js/main.js?v=072812"></script>
<script src="<?php echo $www;?>/js/script.js"></script>

</html>
