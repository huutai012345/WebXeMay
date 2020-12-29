<?php

$cates;

$username = "";
$idUser = "";
$check = false;

if (isset($_GET["p"]) && isset($_GET["id"])) {
    $cates = $query->getCate($_GET["id"]);
    $check = true;
} else {
    $cates = $query->loadAllCategory();
}

?>

<?php
foreach ($cates as $cate) {
    if ($check) {
        $products = $query->loadAllProductByCategory($cate["id"]);
    } else {
        $products = $query->loadProductByCategory($cate["id"], 6);
    }

?>
    <featured-products>
        <div class="title">
            <div class="name"><?= $cate["name"] ?></div>
            <a href="index.php?p=category&id=<?= $cate["id"] ?>">View All</a>
        </div>
        <div class="container">
            <ul>
                <?php
                foreach ($products as $product) {
                ?>
                    <li>
                        <img src="./resource/img/<?= $product["img"] ?>" alt="" />
                        <div class="content">
                            <div>
                                <a href=""><?= $product["name"] ?></a>
                                <p><?= $product["price"] ?> VND</p>
                            </div>
                            <div>
                                <a href="detail.php?id=<?= $product["id"] ?>" class="btn">Buy</a>
                            </div>
                        </div>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </featured-products>
<?php
}
?>