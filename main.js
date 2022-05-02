$(function () {
    // フッター水しぶきアニメーション
    $("#footer").raindrops({
        color: "rgb(66, 1, 1)",
        waveLength: 50,
        frequency: 0.5,
        waveHeight: 200,
        rippleSpeed: 0.01,
        rippleSpeed: 0.1,
        density: 0.04,
    });

    // ハンバーガメニュー
    $(".hamburger").click(function () {
        $(this).toggleClass("active");

        if ($(this).hasClass("active")) {
            $(".sp-menu--nav").addClass("active");
        } else {
            $(".sp-menu--nav").removeClass("active");
        }
    });

    // I Love Coffee.のアニメーション
    $(window).on("load", function () {
        $(".main-text").addClass("appear");
    });

    // フェードイン
    $(window).scroll(function () {
        const windowHeight = $(window).height();
        const scroll = $(window).scrollTop();

        $(".fade").each(function () {
            const targetPosition = $(this).offset().top;
            if (scroll > targetPosition - windowHeight) {
                $(this).addClass("in");
            }
        });
    });

    // フードメニュースクロール
    $(".food-type").on("touchmove", function getPosition(event) {
        return event.originalEvent.touches[0].pageX;
    });


    // スマホ注文数量増減ボタン
    function spinnerControl(target) {
        $(target).each(function () {
            let el = $(this);
            let plus = $(".spinner-plus");
            let minus = $(".spinner-minus");

            // substract
            el.parent().on("click", ".spinner-minus", function () {
                if (el.val() > parseInt(el.attr("min"))) {
                    el.val(function (i, oldVal) {
                        return --oldVal;
                    });
                }
                // disabled
                if (el.val() == parseInt(el.attr("min"))) {
                    el.prev(minus).addClass("disabled");
                }
                if (el.val() < parseInt(el.attr("max"))) {
                    el.next(plus).removeClass("disabled");
                }
            });

            // increment
            el.parent().on("click", ".spinner-plus", function () {
                if (el.val() < parseInt(el.attr("max"))) {
                    el.val(function (i, oldVal) {
                        return ++oldVal;
                    });
                }
                // disabled
                if (el.val() > parseInt(el.attr("min"))) {
                    el.prev(minus).removeClass("disabled");
                }
                if (el.val() == parseInt(el.attr("max"))) {
                    el.next(plus).addClass("disabled");
                }
            });
        });
    }

    spinnerControl(".spinner01");
    spinnerControl(".spinner02");
    spinnerControl(".spinner03");
});
