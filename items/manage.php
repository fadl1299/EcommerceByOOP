<?php
$get = new Manage_Users;

$sort = $get->sort();

$get_data = new Manage_Items;

$data =  $get_data->get_data($sort)
?>

<div class="container">
    <h1 class="text-center member-header">Manage Items</h1>
    <div class="table-responsive mt-5">
        <table class="main-table text-center table table-bordered">
            <tr>
                <td>Image</td>
                <td>Name</td>
                <td>Price</td>
                <td>User Name</td>
                <td>Category</td>
                <td>Date</td>
                <td>Control</td>
            </tr>
            <?php
            $get = new Manage_Items;
            $get->table($data);
            ?>
        </table>
    </div>
    <div class="manage">
        <a href="items.php?do=Add" class="btn btn-primary add-btn mb-5"> Add New Item</a>
        <div class="ordering">
            <a href="?sort=ASC" class="asc"> Asc</a>
            <a href="?sort=DESC" class="desc"> Desc</a>
        </div>
    </div>
</div>