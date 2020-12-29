<?php
$cates = $query->loadAllCategory();
?>

<ul>
  <li><a href="index.php">All</a></li>
  <?php
  foreach ($cates as $cate) {
    $products = $query->loadAllProductByCategory($cate["id"]);
  ?>
    <li>
      <a href="index.php?p=category&id=<?= $cate["id"] ?>"> <?= $cate["name"] ?></a>
      <ul class="sub">
        <?php
        foreach ($products as $product) {
        ?>
          <li><a href="detail.php?id=<?= $product["id"] ?>"><?= $product["name"] ?></a></li>
        <?php
        }
        ?>
      </ul>
    </li>
  <?php
  }
  ?>
</ul>