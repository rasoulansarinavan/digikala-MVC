<?php

?>

<div class="box">
                    <span class="headLine">
                    اطلاعات شخصی
                </span>
    <div class="personalInfo">
        <div class="flex">
            <div class="item">
                <p>
                    نام و نام خانوادگی:
                    <span>
                                        <?= $user['name'] ?>
                                    </span>
                </p>
            </div>
            <div class="item">
                <p>
                    پست الکترونیک :
                    <span>
<?= $user['email'] ?>
                                    </span>
                </p>
            </div>
        </div>
        <div class="flex">
            <div class="item">
                <p>
                    شماره تلفن همراه:
                    <span>
                                        <?= $user['mobile'] ?>
                                    </span>
                </p>
            </div>
            <div class="item">
                <p>
                    کد ملی:
                    <span>
                                        <?= $user['code_melli'] ?>
                                    </span>
                </p>
            </div>
        </div>
        <div class="flex">
            <div class="item">
                <p>
                    دریافت خبرنامه:
                    <span>
                                        خیر
                                    </span>
                </p>
            </div>
            <div class="item">
                <p>
                    روش بازگشت وجه:
                    <span>
                                        <?= $user['bank_card'] ?>
                                    </span>
                </p>
            </div>
        </div>
        <div class="action">
            <a href="profile/personalInfo">
                ویرایش اطلاعات شخصی
            </a>
        </div>
    </div>
</div>