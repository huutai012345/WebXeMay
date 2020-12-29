<?php
$router = new Router();
$result = $query->loadAllUser();
?>

<table cellpadding="0" cellspacing="0">

    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Email</th>
        <th>Role</th>
        <th>
            <a href="<?= $router->createURL("user", ["f" => "add"]) ?>">Add</a>
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
                <?= $row["first_name"] ?>
            </td>
            <td>
                <?= $row["last_name"] ?>
            </td>
            <td>
                <?= $row["phone"] ?>
            </td>
            <td>
                <?= $row["address"] ?>
            </td>
            <td>
                <?= $row["email"] ?>
            </td>
            <td>
                <?= $row["role"] ?>
            </td>
            <td>
                <a href="<?= $router->createURL("user", ["f" => "edit", "id" => $row["id"]]) ?>">Edit</a>
                <a href="<?= $router->createURL("user", ["f" => "delete", "id" => $row["id"]]) ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>

</table>