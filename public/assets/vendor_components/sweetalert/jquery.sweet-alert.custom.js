!function ($) {
    "use strict";

    var SweetAlert = function () {
    };

    //examples 
    SweetAlert.prototype.init = function () {

        //Basic
        $('.sa-basic').click(function () {
            swal("Here's a message!");
        });

        //A title with a text under
        $('.sa-title').click(function () {
            swal("Here's a message!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.")
        });

        //Success Message
        $('.sa-success').click(function () {
            swal("Good job!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.", "success")
        });

        //Warning Message
        $('.sa-warning').click(function () {
            swal({
                title: "مطمئن هستید؟",
                text: "با حذف این دسته تمام زیر دسته های ان حذف میشود!!!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "بلی",
                closeOnConfirm: false
            }, function () {
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
            });
        });

        //Parameter
        $('.sa-params').click(function () {
            var parent = $(this).parents('tr');
            var id = $(this).attr('data-id');


            swal({
                title: "مطمئن هستید؟",
                text: "با حذف این دسته تمام زیر دسته های ان حذف میشود!!!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "بلی",
                cancelButtonText: "خیر",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    removeAjax(id);
                    parent.fadeOut();
                    swal("حذف شد", "Your imaginary file has been deleted.", "success");
                } else {
                    swal("عملیات لغو شد", "Your imaginary file is safe :)", "error");
                }
            });
        });

        //Custom Image
        $('.sa-image').click(function () {
            swal({
                title: "Govinda!",
                text: "Recently joined twitter",
                imageUrl: "../../../images/avatar.png"
            });
        });

        //Auto Close Timer
        $('.sa-close').click(function () {
            swal({
                title: "Auto close alert!",
                text: "I will close in 2 seconds.",
                timer: 2000,
                showConfirmButton: false
            });
        });


    },
        //init
        $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
}(window.jQuery),

//initializing 
    function ($) {
        "use strict";
        $.SweetAlert.init()
    }(window.jQuery);