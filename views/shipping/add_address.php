<form id="form">
    <div id="addAddressModal">
        <div class="content">
            <div class="header">
                جزییات آدرس
            </div>
            <div class="row flex">
                <label>
                    نام
                    <input type="text" name="name">
                </label>
                <label>
                    نام خانوادگی
                    <input type="text" name="family">
                </label>
                <label>
                    شماره موبایل
                    <input type="text" name="mobile">
                </label>
            </div>
            <div class="row">
                <div class="ir-select flex">
                    <label>
                        استان
                        <select class="ir-province" name="province"></select>
                    </label>
                    <label>
                        شهر
                        <select class="ir-city" name="city"></select>
                    </label>
                </div>
            </div>
            <div class="row">
                <label>
                    نشانی پستی
                    <textarea name="address"></textarea>
                </label>
            </div>
            <div class="row flex">
                <label>
                    پلاک
                    <input type="text" name="pelak">
                </label>
                <label>
                    واحد
                    <input type="text" name="vahed">
                </label>
                <label>
                    کد پستی
                    <input type="text" name="post_code">
                </label>
            </div>
            <div class="sendForm">
                <a onclick="addAddress()">تایید و ثبت آدرس</a>
            </div>
        </div>
    </div>
</form>
<script src="public/js/ir-city-select.min.js"></script>
<script>

    var edit_address_id = '';

    function addAddress() {
        var url = 'shipping/addAddress/' + edit_address_id + '';
        var data = $('#form').serializeArray();
        $.post(url, data, function (msg) {
            console.log(msg);
            location.reload();
        });
    }
</script>

