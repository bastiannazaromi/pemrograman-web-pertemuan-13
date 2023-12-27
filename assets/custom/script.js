$(document).ready(function() {
    $('#to-top').fadeOut();

   
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('#to-top').fadeIn();

            // $('#to-top').removeClass("d-none");
        } else {
            // $('#to-top').addClass("d-none");

            $('#to-top').fadeOut();
        }
    });

    $('#to-top').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 800);
        
        return false;
    });

    $('.page-scroll').on('click', function(e) {
        e.preventDefault();

        var tujuan = $(this).attr('href');
        var elemenTujuan = $(tujuan);

        $('html').animate({
            scrollTop: elemenTujuan.offset().top
        }, 1000);
    });
});