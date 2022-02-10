// 下部アニメーション
$(function() {
    $('#footer').raindrops({
        color:'rgb(66, 1, 1)',
        waveLength: 50,
        frequency: 0.5,
        waveHeight: 200,
        rippleSpeed: 0.01,
        rippleSpeed: 0.1, 
        density: 0.04
    });
});

// ハンバーガメニュー
$(function () {
  $('.hamburger').click(function () {
    $(this).toggleClass('active');

    if ($(this).hasClass('active')) {
      $('.sp-menu--list').addClass('active');
    } else {
      $('.sp-menu--list').removeClass('active');
    }
  });
});

$(function () {
  $('.main_menu li').mouseenter(function () {
    $(this).siblings().find('ul').hide();
    $(this).children().slideDown(200);
  });
  $('html').click(function () {
    $('.pc-menu--main_menu .pc-menu--sub_menu').slideUp(200);
  });
});
$(function () {
  $('.title').on('click', function () {
    $(this).next().slideToggle(200);
  });
});
$(function () {
  $('.item').on('inview', function () {
    $(this).addClass('show');
  });
});

$(function() {
  $(window).on('load',function() {
    $('.main-text').addClass('appear');
  });
});
