<div class="profileLeft" id="personalInfo">
    <div class="header flex">
                <span>
                    اطلاعات شخصی
                </span>
    </div>
    <form action="profile/personalInfo" method="post">
        <div class="box flex">
            <div class="personalInfo">
                <div class="item">
                    <label for="family">نام و نام خانوادگی</label>
                    <input type="text" id="family" name="family" value="<?= $user['name'] ?>">
                </div>
            </div>
            <div class="personalInfo">
                <div class="item">
                    <label for="code_melli">کد ملی</label>
                    <input type="text" id="code_melli" name="code_melli" value="<?= $user['code_melli'] ?>">
                </div>
            </div>
            <div class="personalInfo">
                <div class="item">
                    <label for="mobile">شماره تلفن همراه</label>
                    <input type="text" id="mobile" name="mobile" value="<?= $user['mobile'] ?>">
                </div>
            </div>
            <div class="personalInfo">
                <div class="item">
                    <label for="email">پست الکترونیک</label>
                    <input type="text" id="email" name="email" value="<?= $user['email'] ?>">
                </div>
            </div>
            <div class="personalInfo">
                <div class="item">
                    <label for="job">شغل</label>
                    <input type="text" id="job" name="job" value="<?= $user['job'] ?>">
                </div>
            </div>
            <div class="personalInfo">
                <div class="item">
                    <label for="bank_card">شماره کارت بانکی (جهت عودن وجه)</label>
                    <input type="text" id="bank_card" name="bank_card" value="<?= $user['bank_card'] ?>">
                </div>
            </div>
            <div class="personalInfo">
                <div class="item">
                    <label for="birthdate">تاریخ تولد</label>
                    <input type="text" id="birthdate" name="birthdate" autocomplete="none"
                           value="<?= $user['birthday_date'] ?>">
                </div>
            </div>
            <div class="personalInfo">
                <div class="item">
                    <label for="oldPassword">رمز عبور قبلی</label>
                    <input type="password" id="oldPassword" name="oldPassword" value="<?= $user['password'] ?>">
                    <label for="newPassword">رمز عبور جدید</label>
                    <input type="password" id="newPassword" name="newPassword" value="">
                    <label for="repeat_newPassword">تکرار رمز عبور جدید </label>
                    <input type="password" id="repeat_newPassword" name="repeat_newPassword"
                           value="">
                </div>
            </div>
        </div>
        <div class="submitForm">
            <button>ثبت تغییرات</button>
        </div>
    </form>
</div>