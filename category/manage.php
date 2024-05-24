<?php
$get = new Manage_Users;

$sort = $get->sort();

$get_data = new Manage_Cate;

$data = $get_data->get_data_cat($sort);
?>
<div class="container">
    <h1 class="text-center member-header">Manage Categories</h1>
    <div class="table-responsive mt-5">
        <table class="main-table text-center table table-bordered">
            <tr>
                <td>Image</td>
                <td>Name</td>
                <td>Description</td>
                <td>Date</td>
                <td>Control</td>
            </tr>
            <?php
            $get = new Manage_Cate;
            $get->tables($data);
            ?>
        </table>
    </div>
    <div class="manage">
        <a href="categories.php?do=Add" class="btn btn-primary add-btn mb-5"> Add New Category</a>
        <div class="ordering">
            <a href="?sort=ASC" class="asc"> Asc</a>
            <a href="?sort=DESC" class="desc"> Desc</a>
        </div>
    </div>
</div>
