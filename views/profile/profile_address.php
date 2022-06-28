<main>
    <div class="container flex" id="profile">
        <?php
        $address = $data['address'];
        require('profile_right.php');
        require('profile_address_left.php');
        ?>

    </div>
</main>

<script src="public/js/profile_address.js"></script>
<script src="public/js/ir-city-select.min.js"></script>