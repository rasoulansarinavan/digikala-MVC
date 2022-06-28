<main>
    <div class="container flex" id="profile">
        <?php
        $user = $data['user'];
        $order = $data['order'];
        $favorites=$data['favorites'];


        require('profile_right.php');
        require('profile_Left.php');
        ?>
    </div>
</main>
<script src="public/js/profile.js"></script>

