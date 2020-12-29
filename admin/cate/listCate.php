<?php
$router = new Router();
$result = $query->loadAllCategory();
?>


<table cellpadding="0" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>
            <a href="<?= $router->createURL("category", ["f" => "add"]) ?>">Add</a>
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
                <a href="<?= $router->createURL("category", ["f" => "edit", "id" => $row["id"]]) ?>">Edit</a>
                <a href="<?= $router->createURL("category", ["f" => "delete", "id" => $row["id"]]) ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>