

// 약관 modal
$(function(){
  $(".use__btn").on("click", function () {
    $(".modal1, .footer__modal--layer").show().stop()
      .animate({
        opacity: 1
      }, 300);
  })


// 변호사 팝업
  $(".lawyer__btn").on("click", function () {
    $(".lawyer__modal, .footer__modal--layer").show().stop()
      .animate({
        opacity: 1
      }, 300);
  })

  //뻐른상담
  $(".quick__btn").on("click", function () {
    $(".quick__modal, .footer__modal--layer").show().stop()
      .animate({
        opacity: 1
      }, 300);
  })
  function quick_send(frm){
    if(frm.agree.checked == false){
      alert("개인정보 수집 및 이용에 동의해주세요.");
      return false;
    }
  }

  // 개인정보처리방침 modal
  $(".privacy__btn, .quick-counsel .top__btn, .quick-counsel02 .top__btn").on("click", function () {
    $(".modal2, .footer__modal--layer").show().stop()
      .animate({
        opacity: 1
      }, 300);
  })

  // modal close
  $(".modal_close_btn, .footer__modal--layer").on("click", function () {
    $(".footer__modal, .footer__modal--layer").stop().animate({
      opacity: 0
    }, 300, function () {
      $(this).hide();
    })
  })
})


// 퀵메뉴 toggle
$(function(){
  $(".quick__toggle").on("click", function () {
    $(this).toggleClass("on");

    if ($(this).hasClass("on")) {

      $(".quick__top").css({"margin-top":"-23px"})
      $(".quick__menu").hide();

    } else {

      $(".quick__top").css({"margin-top":"0"})
      $(".quick__menu").show();

    }
  })

})

//fixmenu scroll event


//페이지 맨 위로 보내기
function goPageTop(){
  $("html, body").stop().animate({scrollTop:0}, 1200);
}




//tab 메뉴
/*$(function(){
  var onlineTarget = $('.sub-tab li'),
      onCon = $('.sub-con .divorce');

  onlineTarget.click(function(e){
    e.preventDefault(); // *행동초기화
    var target = $(this); // *현재 click된 botton의 순번을 알수있음
    var index = target.index();
      $(this).addClass('on').siblings().removeClass('on');
      $('.divorce').eq(index).css({"display":"block"}).siblings('.divorce').hide();
  });
});
*/


$(function(){
  var faqTarget = $('.faq ul li a'),
    answer = $('.faq .answer');

  faqTarget.click(function(){
    
    $(this).toggleClass('on').parent().siblings().find('a').removeClass('on');
    answer.stop().slideUp();
    $('.faq ul li a.on').next('.answer').stop().slideToggle();
  });
});



