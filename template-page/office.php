<?php
/**
 * Template Name: Office
 * Template Post Type: post, page
 */
$www = get_stylesheet_directory_uri();
get_header(); 
?>
<?php get_template_part( 'template-parts/page-title' ); ?>


<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<main >
    <section class="office">
        <div class="container">
        <div class="row section__desc  fade-item">
                <div class="col-lg-6">
                    <div class="info">
                        <h3 class="sm mt-0">법무법인 에이앤랩</h3>
                        <ul>
                            <li>
                                <span class="key">주소</span>
                                <span class="value">서울시 서초구 강남대로 337, 10층, 13층</span>
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
                                <span class="value">anlab@anlab.co.kr</span>
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
                </div>
                <div class="col-lg-6">
    
                    <script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId=1tepevxu97"></script>
					<div id="map" style="width:100%;height:380px;"></div>
					<script>
                        var HOME_PATH = window.HOME_PATH || '.';
                        var cityhall = new naver.maps.LatLng(37.4930632,127.0294633),
                            map = new naver.maps.Map('map', {
                                center: cityhall.destinationPoint(0, 50),
                                
                                zoom: 16
                            }),
                            marker = new naver.maps.Marker({
                                map: map,
                                position: cityhall
                            });

                        var contentString = [
                                '<div class="iw_inner">',
                                '   <h6>법무법인 에이앤랩</h6>',
                                '   <p>서울시 서초구 강남대로 337 10층, 13층 </p>',
                                ' <div class="link"><a href="http://naver.me/xuI1R0X8" target="_blank">네이버 지도 보기</a></div>',
                                '</div>'
                            ].join('');

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
					</script>	
                </div>
            </div>


        </div>
    </section>
</main>
<?php endwhile; ?>
<?php else : ?>
no post
<?php endif; ?>
<?php get_footer(); ?>
