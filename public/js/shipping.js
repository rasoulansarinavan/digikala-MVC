$(document).ready(function () {
    /*=================  address  =========*/
    $('.addressItems .item ').on('click', function () {
        $('.addressItems .item').removeClass('active');
        $(this).find('input').prop('checked', true);
        $(this).addClass('active')

        var address_id = $('.addressItems .item input[type=radio]:checked').val();
        editAddress(address_id);
    })
    $('.addressItems li:first-child input').trigger('click');
    /*=================  delivery  =========*/
    $('.deliveryItems .item ').on('click', function () {
        $('.deliveryItems .item').removeClass('active');
        $(this).find('input').prop('checked', true);
        $(this).addClass('active')
    })
    $('.deliveryItems li:first-child input').trigger('click');

    /*============= open address modal when addAddress is click ======== */
    $('.addAddress,.fa-edit').on('click', function () {
        $('#addAddressModal').fadeIn();
        $('body').addClass('active');
        $('#form').trigger('reset');
    })

    //function of close modal if outside click
    var modal1 = document.getElementById('addAddressModal');
    window.addEventListener("click", OutSide);

    function OutSide(e) {
        if (e.target == modal1) {
            modal1.style.display = 'none';
            $('body').removeClass('active');
        }
    }


    //function of close modal if press ESC
    $(document).keydown(function (e) {
        if (e.keyCode === 27) {
            $('#addAddressModal').fadeOut()
            $('body').removeClass('active');
        }
    })

})