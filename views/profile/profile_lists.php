<main>
    <div class="container flex" id="profile">
        <?php
        $favorites = $data['favorites'];
        require('profile_right.php');
        require('profile_lists_left.php'); ?>

    </div>
</main>
<script src="public/js/profile_lists.js"></script>