<?php
$router = new Router();
$result = $query->loadAllProduct();
?>

<table cellpadding="0" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Amount</th>
        <th>Category</th>
        <th>Img</th>
        <th>
            <a href="<?= $router->createURL("product", ["f" => "add"]) ?>">Add</a>
        </th>
    </tr>

    <?php
    foreach ($result as $row) {
    ?>

        <tr>
            <td>
                <?= $row["id"] ?>
            </td>
            <td>
                <?= $row["name"] ?>
            </td>
            <td>
                <?= $row["description"] ?>
            </td>
            <td>
                <?= $row["price"] ?>
            </td>
            <td>
                <?= $row["amount"] ?>
            </td>
            <td>
                <?= $row["img"] ?>
            </td>
            <td>
                <?= ($query->getCate($row["idCate"]))[0]["name"] ?>
            </td>
            <td>
                <a href="<?= $router->createURL("product", ["f" => "edit", "id" => $row["id"]]) ?>">Edit</a>
                <a href="<?= $router->createURL("product", ["f" => "delete", "id" => $row["id"]]) ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>