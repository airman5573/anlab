<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$function_includes = array(
    '/pagination.php',

);

foreach($function_includes as $file){
    require_once get_template_directory() . '/inc' .$file;
}


register_nav_menus(
    array(
        'primary_menu'  => 'Primary Menu',
        'secondary_menu'    => 'Secondary Menu',
        'footer_menu'    => 'Footer Menu'
    )
);


add_action('parse_query', 'pmg_ex_sort_posts');

function pmg_ex_sort_posts($q)
{
    if(!$q->is_main_query() || is_admin())
        return;
    
    if(
        !is_post_type_archive('divorce') &&!is_tax('divorce_category') &&!is_tax('inheritance_category') &&!is_tax('guardian_category')
    ) return;

    $q->set('orderby', 'menu_order');
    $q->set('order', 'asc');
}

add_filter( 'get_the_archive_title', function ($title) {    
    if ( is_category() ) {    
            $title = single_cat_title( '', false );    
        } elseif ( is_tag() ) {    
            $title = single_tag_title( '', false );    
        } elseif ( is_author() ) {    
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;    
        } elseif ( is_tax() ) { //for custom post types
            $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
        } elseif (is_post_type_archive()) {
            $title = post_type_archive_title( '', false );
        }
    return $title;    
});


add_filter( 'nav_menu_link_attributes', 'wpse156165_menu_add_class', 10, 3 );

function wpse156165_menu_add_class( $atts, $item, $args ) {
    $class = 'primary-menu-link'; // or something based on $item
    $atts['class'] = $class;
    return $atts;
}

add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );  

add_action( 'after_setup_theme', function() {
    add_theme_support( 'responsive-embeds' );
} );


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

add_filter( 'excerpt_length', function($length) {
    return 20;
}, PHP_INT_MAX );


function mySearchFilter($articleQuery) {
    if( isset($_GET['search-type']) && $_GET['search-type']){
        $type = $_GET['search-type'];
    }
    if ($articleQuery->is_search && $type == 'member') {
        $articleQuery->set('post_type', 'member');
    };
    return $articleQuery;
};

add_filter('pre_get_posts','mySearchFilter');

add_filter('kboard_user_display', 'my_kboard_user_display', 10, 5);
function my_kboard_user_display($user_display, $user_id, $user_name, $plugins, $boardBuilder){
	$board = $boardBuilder->board;
	if($board->id == '1'){ // ?????? ????????? id??? ??????????????????.
		$userdata = get_userdata($user_id);
		if(!$user_id || !in_array('administrator', $userdata->roles)){
			$strlen = mb_strlen($user_name, 'utf-8');
			
			if($strlen > 3){
				$header_showlen = 2;
				$footer_showlen = $header_showlen+2;
			}
			else{
				$header_showlen = 1;
				$footer_showlen = $header_showlen+1;
			}
			
			$user_display = mb_substr($user_name, 0, $header_showlen, 'utf-8') . str_repeat('O', $header_showlen) . mb_substr($user_name, $footer_showlen, $strlen, 'utf-8');
		}
	}

	return $user_display;
}


/*?????? ????????? ?????? ???????????? ?????? ??????????????? ????????? ?????? ?????? ??????*/
add_filter('kboard_list_from', 'case_list_from', 10, 3);
function case_list_from($from, $board_id, $content_list){
	global $wpdb;
	$board_skin = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}kboard_board_setting WHERE uid='{$board_id}'", OBJECT);
	
	if($board_skin->uid=='2'){
		$target=$_GET['target'];
		$keyword=$_GET['keyword'];
		if($target == '' && $keyword){
			$from="`{$wpdb->prefix}kboard_board_content` LEFT JOIN `{$wpdb->prefix}kboard_board_option` ON `{$wpdb->prefix}kboard_board_content`.`uid`=`{$wpdb->prefix}kboard_board_option`.`content_uid`";
		}
	}
	
	//???????????? ?????? ????????? ??????????????? ????????? ??????
	if($board_skin->uid=='4' && strpos(get_permalink(),'/member/')){
		$from="`{$wpdb->prefix}kboard_board_content` LEFT JOIN `{$wpdb->prefix}kboard_board_option` ON `{$wpdb->prefix}kboard_board_content`.`uid`=`{$wpdb->prefix}kboard_board_option`.`content_uid`";
	}

	return $from;
}

add_filter('kboard_list_where', 'case_list_where', 10, 3);
function case_list_where($where, $board_id, $content_list){
	global $wpdb;
	$board_skin = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}kboard_board_setting WHERE uid='{$board_id}'", OBJECT);

	if($board_skin->uid=='2'){
		$target=$_GET['target'];
		$keyword=$_GET['keyword'];
		
		//?????? ?????????
		if($target == '' && $keyword){
			$title="(`{$wpdb->prefix}kboard_board_content`.`title` LIKE '%{$keyword}%')";
			$major_lawyer="(`{$wpdb->prefix}kboard_board_option`.`option_key`='major_lawyer' AND `{$wpdb->prefix}kboard_board_option`.`option_value` LIKE '%{$keyword}%')";
			$lawyer="(`{$wpdb->prefix}kboard_board_option`.`option_key`='lawyer' AND `{$wpdb->prefix}kboard_board_option`.`option_value` LIKE '%{$keyword}%')";
			$category="(`{$wpdb->prefix}kboard_board_option`.`option_key`='category' AND `{$wpdb->prefix}kboard_board_option`.`option_value` LIKE '%{$keyword}%')";
			$content="(`{$wpdb->prefix}kboard_board_content`.`content` LIKE '%{$keyword}%')";

			$where="`{$wpdb->prefix}kboard_board_content`.`board_id`='{$board_id}' AND ({$title} OR {$major_lawyer} OR {$lawyer} OR {$category} OR {$content}) AND `{$wpdb->prefix}kboard_board_content`.`notice`='' AND (`{$wpdb->prefix}kboard_board_content`.`status` IS NULL OR `{$wpdb->prefix}kboard_board_content`.`status`='' OR `{$wpdb->prefix}kboard_board_content`.`status`='pending_approval')";
		}
		
		//'?????????' ?????????
		if($target == 'kboard_option_lawyer' && $keyword){
			$major_lawyer="(`{$wpdb->prefix}kboard_board_option`.`option_key`='major_lawyer' AND `{$wpdb->prefix}kboard_board_option`.`option_value` LIKE '%{$keyword}%')";
			$lawyer="(`{$wpdb->prefix}kboard_board_option`.`option_key`='lawyer' AND `{$wpdb->prefix}kboard_board_option`.`option_value` LIKE '%{$keyword}%')";

			$where="`{$wpdb->prefix}kboard_board_content`.`board_id`='{$board_id}' AND ({$major_lawyer} OR {$lawyer}) AND `{$wpdb->prefix}kboard_board_content`.`notice`='' AND (`{$wpdb->prefix}kboard_board_content`.`status` IS NULL OR `{$wpdb->prefix}kboard_board_content`.`status`='' OR `{$wpdb->prefix}kboard_board_content`.`status`='pending_approval')";
		}
	}
	
	//???????????? ?????? ????????? ??????????????? ????????? ??????
	if($board_skin->uid=='4' && strpos(get_permalink(),'/member/')){
		if(strpos(get_permalink(), '%ec%9c%a0%ec%84%a0%ea%b2%bd') !== false){$name='?????????';}
		if(strpos(get_permalink(), '%eb%b0%95%ed%98%84%ec%8b%9d') !== false){$name='?????????';}
		if(strpos(get_permalink(), '%ec%a1%b0%ea%b1%b4%eb%aa%85') !== false){$name='?????????';}
		if(strpos(get_permalink(), '%ec%8b%a0%ec%83%81%eb%af%bc') !== false){$name='?????????';}
		if(strpos(get_permalink(), '%ea%b9%80%eb%8f%99%ec%9a%b0') !== false){$name='?????????';}
		if(strpos(get_permalink(), '%ec%a0%95%ec%9d%80%ec%a7%80') !== false){$name='?????????';}
		if(strpos(get_permalink(), '%eb%b0%95%ec%84%b1%ec%97%b0') !== false){$name='?????????';}
		if(strpos(get_permalink(), '%ed%97%88%ec%9d%80%ec%83%81') !== false){$name='?????????';}

		$where="`{$wpdb->prefix}kboard_board_content`.`board_id`='2' AND (`{$wpdb->prefix}kboard_board_option`.`option_key`='major_lawyer' AND `{$wpdb->prefix}kboard_board_option`.`option_value` LIKE '%{$name}%' OR `{$wpdb->prefix}kboard_board_option`.`option_key`='lawyer' AND `{$wpdb->prefix}kboard_board_option`.`option_value` LIKE '%{$name}%') AND `{$wpdb->prefix}kboard_board_content`.`notice`='' AND (`{$wpdb->prefix}kboard_board_content`.`status` IS NULL OR `{$wpdb->prefix}kboard_board_content`.`status`='' OR `{$wpdb->prefix}kboard_board_content`.`status`='pending_approval')";
		?>
		<style>
		.kboard-header, .kboard-pagination, .kboard-control{display:none;}
		.kboard-list.case-list{margin-top:0 !important;}

		@media screen and (max-width: 770px){
			#kboard-case-list .kboard-list tbody tr{width: 48%; margin-right:4% !important;}
		}
		@media screen and (max-width: 600px){
			#kboard-case-list {width:100%;}
			#kboard-case-list .kboard-list table td.kboard-list-title {padding:14px;}
			
			#kboard-case-list .kboard-list .case-list-title .case_category{font-size:14px;}
			#kboard-case-list .kboard-list .kboard-thumbnail-cut-strings{font-size:14px; height:60px;}
			#kboard-case-list .kboard-list tbody td.kboard-list-title .kboard-list-summary,
			#kboard-case-list .case-list .case-list-txt .case-list-date span {font-size:12px;}
			#kboard-case-list .kboard-list-lawyer span b, #kboard-case-latest .kboard-list-lawyer span b{font-size:14px;}
			
			#kboard-case-list .pic{width:31%;}
			#kboard-case-list .lawyerpic{width:44px; height:44px;}
		}
		@media screen and (max-width: 320px){
			#kboard-case-list .lawyerpic{width:34px; height:34px;}
			#kboard-case-list .mobile{font-size:11px !important;}
		}
		</style>
	<?php }
	
	
	//'??????'??? '????????????(??????????????? ver) ??????'??? '?????? ??????'??? ????????? ?????? ??? ?????? ????????? ??????(8????????? ???????????????)??? ????????? ??? ????????? ?????? ???????????? ???????????? ?????? ????????? ???????????? ?????? 1000????????? ???????????? ?????? ??????
	if($content_list->is_latest && $board_skin->uid=='7'){
		$content_list->rpp = 1000;
	}
	

	return $where;
}
/*?????? ????????? ?????? ???????????? ?????? ??????????????? ????????? ?????? ?????? ???*/

add_filter( 'aioseo_disable', 'aioseo_disable_term_output' );
function aioseo_disable_term_output( $disabled) {
	if ( kboard_uid() ) {
		return true;
	}
	return false;
}


// '?????? ??? ??? ??????'??? ?????????????????? ?????? ????????? ?????? ?????? ('????????????' ??????????????? ??????????????? ??????) - 22.11.02
add_shortcode('header_menu', 'header_menu');
function header_menu(){
	global $post;
	$post_id = $post->ID;
	
	// ???????????? ????????????
	$tel = '02-538-0337';
	$tel_txt = '02)<b>538-0337</b>';

	// ??????????????? ??????
	$kakao = '/gatepage_kakao.html';
	
	$fuction_name = $post_id == 7 ? 'goTop' : 'goURL';
	
	
	$modal_open = "consulting_modal('open')";
	?>
	
	<?php if($post_id != 7){// 7??? ?????? ???????????? post id ????>
	<style>
		.traffic_logo.mobile {background: rgb(0 0 0 / 90%);}
	</style>
	
	<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
	<?php }?>
	
	<!-- mobile ?????? -->
	<div class="office_bn mobile"><img src="/img/main_traffic_new/bn_office_mobile.jpg"></div>
	<a class="traffic_logo mobile"href="/"><img src="/img/main_traffic_new/traffic_logo_mobile.png"></a>

	<!-- pc ?????? -->
	<header>
		<div class="set">
			<a class="traffic_logo pc" href="/"><img src="/img/main_traffic_new/traffic_logo.png"></a>
			
			<nav class="nav_meun">
				<ul>
					<li class="menu_1" onclick="<?php echo $fuction_name?>('section0');" onselectstart="return false"><span>Why ????????????</span></li>
					<li class="menu_2" onclick="<?php echo $fuction_name?>('lawyer_slide_section');" onselectstart="return false"><span>????????? ??????</span></li>
					<li class="menu_3 pc" onclick="<?php echo $fuction_name?>('section5');" onselectstart="return false"><span>??????/?????? ?????????</span></li>
					<li class="menu_4" onclick="<?php echo $fuction_name?>('section3');" onselectstart="return false"><span>????????????</span></li>
					<li class="menu_3 mobile" onclick="<?php echo $fuction_name?>('section5');" onselectstart="return false"><span>??????/?????? ?????????</span></li>
				</ul>
			</nav>
			
			<div class="tel_area blue pc">
				<?php echo $tel_txt?>
			</div>
			
			<img class="blackbox_logo pc" src="/img/main_traffic_new/blackbox_logo_pc2_w2.png">
		</div>
		
		<img class="office_bn pc" src="/img/main_traffic_new/bn_office_pc.png">
	</header>


	
	<!--????????? ??????-->
	<div class="consulting_banner mobile">
		<img src="/img/main/phone_82x82.gif">
		<span class="consulting_banner_txt">
			[?????????] <span class="realtime_txt"></span> <span class="blink">?????? ?????? ??????</span>
		</span>
	</div>
	
	<script>
		function getRealtime(html_target){
			let target = jQuery(html_target);
			
			let now = new Date(), //??????
				month = now.getMonth()+1, //???
				date = now.getDate(), //???
				hr = now.getHours(), //??????
				min = now.getMinutes(); //???

			// ???????????? ?????? 23.02.06 ?????????
			const week = ['???', '???', '???', '???', '???', '???', '???'];
			let day = week[now.getDay()]; //??????
			// ???????????? ???
			
			switch(html_target){
				case '.realtime_txt.pc' : var echo_txt = `${month}??? ${date}???(${day})<br>${hr}??? ${min}???`; target[0].innerHTML = echo_txt; break;
				case '.realtime_txt' : var echo_txt = `${month}??? ${date}???(${day}) ${hr}??? ${min}???`; target.text(echo_txt); break;
			}
		}
		
		getRealtime('.realtime_txt'); //???????????? ?????? ??????
		setInterval(function() {getRealtime('.realtime_txt'); getRealtime('.realtime_txt.pc');}, 1000); //1??? ????????? ????????????
	</script>
	
	<!-- pc Quick -->
	<div class="quick_menu pc">
		<img src="/img/main_traffic_new/quick_01_pc.png">
		<a title="???????????? ??????" onclick="<?php echo $modal_open?>"><img src="/img/main_traffic_new/quick_02_pc.png"></a><!--<?php echo $fuction_name?>('consulting_container')-->
		<a title="???????????? ??????" href="<?php echo $kakao?>"><img src="/img/main_traffic_new/quick_03_pc.png"></a>
		<a class="consulting_banner pc" title="???????????? ??????" href="/gatepage_call.html">
			<img class="consulting_banner_img" src="/img/main/phone_82x82.gif">
			<span class="consulting_banner_txt">
				<span class="realtime_txt pc"></span>
				<span class="blink">?????? ?????? ??????</span>
			</span>
			<span class="tel_num">
				02.<br>
				538.0337
			</span>
		</a>
		<!--<a title="???????????? ??????" href="/gatepage_call.html"><img src="/img/main_traffic_new/quick_04_pc.png"></a>-->
		<a title="24??? ????????????" href="/gatepage_call2.html"><img src="/img/main_traffic_new/quick_05_pc.png"></a>
		<a title="TOP" onclick="<?php echo $fuction_name?>('section1')"><img src="/img/main_traffic_new/quick_06_pc.png"></a>
	</div>
	<!-- mobile Quick -->
	<img class="blackbox_logo mobile" src="/img/main_traffic_new/blackbox_logo_mobile.png">
		
	<div class="quick_menu mobile">
		<a class="btn_1" title="???????????? ??????" onclick="<?php echo $modal_open?>"><img src="/img/main_traffic_new/quick_1_mobile.png"></a><!--<?php echo $fuction_name?>('consulting_container')-->
		<a class="btn_2" title="???????????? ??????" href="<?php echo $kakao?>"><img src="/img/main_traffic_new/quick_2_mobile.png"></a>
		<a class="btn_3" title="???????????? ??????" href="/gatepage_call.html"><img src="/img/main_traffic_new/quick_3_mobile.png"></a>
		<a class="btn_4" title="24??? ????????????" href="/gatepage_call2.html"><img src="/img/main_traffic_new/quick_4_mobile.png"></a>
		<a class="btn_top" title="TOP" onclick="<?php echo $fuction_name?>('section1')"><i class="xi-arrow-up"></i></a>
	</div>
	
	
	<!-- consulting_modal -->
	<style>
		.consulting_modal_bg {display: none; width: 100%; height: 100vh; background: rgb(26 26 26 / 60%); position: fixed; top: 0; left: 0; z-index: 999;}
		.consulting_modal_bg .consulting_modal .consulting_container {/*background: #fff;*/ position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);}
		.consulting_modal_bg .consulting_modal .consulting_container .close_btn {position: absolute; top: 20px; right: 20px; cursor: pointer; z-index: 2;}
		.consulting_modal_bg .consulting_modal .consulting_container .close_btn i.xi-close {font-size: 24px; width: 40px; height: 40px; color: #e5e5e5; background: rgb(14 14 14 / 60%); border: 1px solid; padding: 7px; border-radius: 50%;}
	</style>
	
	<div class="consulting_modal_bg">
		<div class="consulting_modal">
			<div class="consulting_container">
				<div class="close_btn">
					<i class="xi-close" onclick="consulting_modal('close')"></i>
				</div>
				
				<div class="col">
					<div class="container_title">
						<div class="main_title">
							<span class="navy"><b>????????????</b></span>??? ???????????????????
						</div>
						<div class="sub_title pc">
							????????? ?????? ???????????????,<br>
							?????????????????? ????????? ???????????????.
						</div>
						<div class="sub_title mobile">
							????????? ?????? ???????????????, ?????????????????? ????????? ???????????????.
						</div>
					</div>
					<div class="tag_area">
						<span class="tag">#24??????</span>
						<span class="tag">#??????/??????</span>
						<span class="tag">#15???/30???</span>
						<span class="tag">#????????????</span>
					</div>
				</div>
				
				<div class="consulting_application">
					<div class="application">
						<div class="element">
							<div class="input_set">
								<div class="radio_area">
									<?php
									$category_val = array(
														'????????????',
														'??????????????????',
														'????????????',
														'?????????',
														'????????????',
														'??????'
													);
													
									for($i=0; $i<count($category_val); $i++){?>
										<label>
											<input id="modal_category_<?php echo $i?>" type="radio" name="modal_category" value="<?php echo $category_val[$i]?>"<?php if($i == 0){?> checked<?php }?>>
											<label for="modal_category_<?php echo $i?>" data-label="<?php echo $category_val[$i]?>"></label>
										</label>
										<?php if($i == 2){?><br><?php }?>
									<?php }?>
								</div>
								<div class="input_area">
									<input id="modal_name" name="modal_name" type="text" placeholder="??????">
									<input id="modal_tel" name="modal_tel" type="text" placeholder="?????????">
									<input id="current_url" name="current_url" type="hidden">
								</div>
							</div>
							
							<span class="apply" onclick="modal_submit();" onselectstart="return false">
								<span class="pc">
									????????????<br>
									????????????
								</span>
								<span class="mobile">
									???????????? ????????????
								</span>
							</span>
						</div>
						
						<div class="agree_area">
							<label for="agree"><input id="modal_agree" name="modal_agree" type="checkbox" value="1"> ???????????????????????? ??????</label> <span class="main_privacy_btn" onclick="main_privacy_open();">[????????????]</span><br>
						</div>
					</div>
					
					<!--<a class="kakao_btn pc" href="<?php echo $kakao?>">
						<img src="/img/icon/icon_kakao_32x30.png"><br>
						????????????<br>
						????????????
					</a>-->
				</div>
			</div>
		</div>
	</div>
	
	<script>
		function consulting_modal(action){
			if(action == 'open'){
				jQuery('.consulting_modal_bg').fadeIn();
			}else{
				jQuery('.consulting_modal_bg').fadeOut();
			}
		}
		
		function modal_submit() {
			if($('#modal_name').val() == ''){
				alert('????????? ???????????????');
				$('#modal_name')[0].focus();
				return;
			}
			if($('#modal_tel').val() == ''){
				alert('???????????? ???????????????');
				$('#modal_tel')[0].focus();
				return;
			}
			if($('#modal_category').val() == ''){
				alert('??????????????? ???????????????');
				$('#modal_category')[0].focus();
				return;
			}
			if($('#modal_agree')[0].checked != true){
				alert('?????? ?????? ????????? ??????????????????????????? ?????? ??? ?????? ???????????????.');
				$('#modal_agree')[0].focus();
				return;
			}

			
			var param = {
				"mode" : 'consulting',
				"name" : $('#modal_name').val(),
				"tel" : $('#modal_tel').val(),
				"category" : $('[name=modal_category]:checked').val(),
				"url" : $('#current_url').val(),
				"agree" : $('#modal_agree').val()
			};

			$.ajax({
				type: "POST",
				url: "/app/mail.php",
				timeout: 0,
				data: param,
				cache: false,
				dataType: "text",
				error: function(xhr, textStatus, errorThrown) {  alert("????????? ??????????????????."); },
				success: function (data){
					if(data.indexOf('??????') != -1){
						console.log("?????? ??????")
						//NAVER SCRIPT
						if (typeof(wcs) != "undefined") {
						if (!wcs_add) var wcs_add={};
						wcs_add["wa"] = "s_41a2b1b1795b";
						var _nasa={};
						_nasa["cnv"] = wcs.cnv("4","1");
						wcs_do(_nasa);
						}
						alert($('#modal_name').val() + '?????? ?????? ????????? ?????????????????????.');
						window.location.reload();
					} else {
						alert(data);
						console.log(param)
					}
				}
			});
		}
		
	
		function goTop(id){
			if(id == 'section1'){
				var offset = jQuery('html, body').offset();
			}else{
				var offset = jQuery("#" + id).offset();
			}
			
			if($(window).width() < 1025){
				offset.top = offset.top - (jQuery('.office_bn.mobile').outerHeight() + jQuery('.traffic_logo.mobile').outerHeight());
			}else{
				offset.top = offset.top - jQuery('header').outerHeight();
				
				if(jQuery('#wpadminbar')[0]){
					offset.top = offset.top - jQuery('#wpadminbar').outerHeight();
				}
			}
			jQuery('html, body').animate({scrollTop: offset.top}, 1500);
		}
		
		function goURL(id){
			if(id == 'section1'){
				var offset = jQuery('html, body').offset();
				
				if(jQuery('#wpadminbar')[0]){
					offset.top = offset.top - jQuery('#wpadminbar').outerHeight();
				}
				
				jQuery('html, body').animate({scrollTop: offset.top}, 1500);
				
				return;
			}else{
				location.href = location.origin + '/#' + id;
			}
		}
		
	
		function admin_header_css_app(){
			if(jQuery(window).outerWidth() > 1024 && jQuery('#wpadminbar')[0] && jQuery('header')[0]){
				if(jQuery('header').css('top') != '32px'){
					jQuery('header').css('top', '32px');
				}else{
					jQuery('header').css('top', '');
				}
				
				if(jQuery('.quick_menu.pc')[0] && jQuery('.quick_menu.pc').css('top') != '132px'){
					var current_top = parseInt(jQuery('.quick_menu.pc').css('top').replace('px', ''));
					jQuery('.quick_menu.pc').css('top', (current_top + 32) + 'px');
				}
			}else{
				jQuery('header').css('top', '');
			}
		}
		
		jQuery(window).on('load', function(){
			admin_header_css_app();
		});
		
		jQuery(window).on('resize', function(){
			admin_header_css_app();
		});
		
		
		
		jQuery(window).on('scroll',function(){
			var scrolltop = jQuery(window).scrollTop(); // ?????? ????????? ??????
			
			// ????????? ???, ????????? ???????????? ???????????????.
			if(jQuery(window).width() > 1024){
				if(scrolltop > 10){
					jQuery('header').css('background', 'rgb(0 0 0 / 90%)');
				}else{
					jQuery('header').css('background', '');
				}
			}else{
				if(scrolltop > 10){
					jQuery('.traffic_logo.mobile').css('background', 'rgb(0 0 0 / 90%)');
				}else{
					jQuery('.traffic_logo.mobile').css('background', '');
				}
			}
		});
	</script>
<?php
}
