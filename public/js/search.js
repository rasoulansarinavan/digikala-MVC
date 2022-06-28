$(document).ready(function () {
    $('.selected').click(function () {
       $(this).parents('.dropdown').find('ul').toggleClass('active');
       $(this).parents('.dropdown').toggleClass('rotate');
    })
    $('.dropdown > ul >.item > #inputBox').click(function () {
        $('.dropdown >ul').removeClass('active');
        var txt = $(this).text();
        $(this).parents('.dropdown').find('.selected').text(txt);
    })
    $('#inputBox').on("keyup",function () {
        var value=$(this).val().toLowerCase();
        $('.dropdown > ul> .item').filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value)>-1);
        })
    })
    $( function() {
        $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 500,
            values: [ 75, 300 ],
            slide: function( event, ui ) {
                $( "#amount" ).val( "تومان" + ui.values[ 0 ] + " - تومان" + ui.values[ 1 ] );
            }
        });
        $( "#amount" ).val( "تومان" + $( "#slider-range" ).slider( "values", 0 ) +
            " - تومان" + $( "#slider-range" ).slider( "values", 1 ) );
    } );
})