/*  pageslide  */
$(".open").pageslide();

/*-------------
ページスクロール
-----------*/

$(function() {
    var pageTop = $('#page-top');
    pageTop.hide();
    //スクロールが400に達したら表示
    $(window).scroll(function () {
        if($(this).scrollTop() > 400) {
            pageTop.fadeIn();
        } else {
            pageTop.fadeOut();
        }
    });
    //スクロールしてトップ
        pageTop.click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
        });
  });
