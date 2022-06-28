$(document).ready(function () {

    var showMore = $('#product article .description .productFeatures .showMore span');
    var ul = $('#product article .description .productFeatures ul');

    showMore.click(function () {

        if (ul.hasClass('active')) {
            showMore.text('+ نمایش بیشتر')
        } else {
            showMore.text('- نمایش کمتر')
        }

        ul.toggleClass('active');
    })

    //function of show modal if .feedBack click
    $('.feedBack').click(function () {
        $('#modalBox').fadeIn();
        $('body').addClass('active');

    })

    //function of close modal if .closeModal click
    $('.closeModal').click(function () {
        $('.modalBox').fadeOut();
        $('body').removeClass('active');

    })

    //function of close modal if press ESC
    $(document).keydown(function (e) {
        if (e.keyCode === 27) {
            $('.modalBox').fadeOut()
            $('body').removeClass('active');
        }
    })

    //function of close modal if outside click
    var modal1 = document.getElementById('modalBox');
    var modal2 = document.getElementById('bestPrice');
    var modal3 = document.getElementById('imageGallery');
    window.addEventListener("click", OutSide);

    function OutSide(e) {
        if (e.target == modal1 || e.target == modal2 || e.target == modal3) {
            modal1.style.display = 'none';
            modal2.style.display = 'none';
            modal3.style.display = 'none';
            $('body').removeClass('active');
        }
    }

//city dropdown
    $('#bestPrice .dropdown .selected').click(function () {

        $('.dropdown > ul').toggleClass('active');
        $('.dropdown').toggleClass('rotate')

    })
    $('.dropdown > ul >li').click(function () {
        $('.dropdown >ul').removeClass('active');
        var txt = $(this).text();
        $('.dropdown .selected').text(txt)
    });


//function of fade in if yes click
    $('#product article .details .bestPrice .yes').click(function () {
        $('#bestPrice').fadeIn();
        $('body').addClass('active');
    });
    $('.showGallery').click(function () {
        $('#imageGallery').fadeIn();
        $('body').addClass('active');
    });


    //function of change onlineShop to shop if (#bestPrice input:checked[type="checkbox"]) click
    $('#bestPrice input:checked[type="checkbox"]').click(function () {
        if (!$('#bestPrice input:checked[type="checkbox"]').is(':checked')) {
            $('#bestPrice .onlineShop').fadeOut(0);
            $('#bestPrice .shop').fadeIn(0);
        } else {
            $('#bestPrice .onlineShop').fadeIn(0);
            $('#bestPrice .shop').fadeOut(0);
        }

    });

    //zoom image plugin
    $('#zoomImage').elevateZoom({
        'zoomWindowOffetx': -900,
        'zoomWindowOffety': -50,
        'zoomWindowWidth': 500,
        'zoomWindowHeight': 500,
        'easing': true,
        'easingDuration': 500,
        'lensFadeIn': true,
        'lensFadeOut': true,
        'zoomWindowFadeIn': true,
        'borderSize': 1,
        'borderColour': '#888',

    });


//function of change border color if (#imageGallery .left > ul > li) click


    var thumbnail = $('.showGallery');

    thumbnail.click(function () {

        var litag = $('#imageGallery .left > ul > li');
        litag.removeClass('active');
        $(this).toggleClass('active');

        var index = $(this).index();
        litag.eq(index).addClass('active');

        var newSrc = $(this).find('img').attr('data-image-1280');
        $('#imageGallery .contain .right').find('img').attr('src', newSrc);
    });

//inner zoom plugin
    $('#ex1').zoom();
})






