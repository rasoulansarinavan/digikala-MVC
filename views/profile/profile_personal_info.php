<main>
    <div class="container flex" id="profile">
        <?php
        $user = $data['user'];
//        print_r($user);
        require('profile_right.php');
        require('profile_personal_info_left.php');
        ?>

    </div>
</main>

<script src="public/js/profile_personal_info.js"></script>
