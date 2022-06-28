<article>
    <h2 class="h2">مشخصات فنی
        <span>
                                Samsung Galaxy A52s 5G SM-A528B/DS Dual SIM 256GB And 8GB Ram Mobile Phone
                            </span>
    </h2>
    <?php
    $features = $data['features'];
    foreach ($features as $parent) {

        ?>
        <section>
            <h3 class="title"><?= $parent['title'] ?></h3>
            <ul>
                <?php
                $child = $parent['children'];
                foreach ($child as $item) {
                    ?>
                    <li class="flex">
                        <div class="params">
                            <?= $item ['title'] ?>
                        </div>
                        <div class="value">
                            <?php
                            if ($item['value'] == '') {
                                echo '---';
                            } else {
                               echo $item['value'];
                            }
                            ?>
                        </div>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </section>
        <?php
    }
    ?>

</article>

