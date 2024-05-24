<?php
$get = new Manage_Users;

$sort = $get->sort();

$get_data = new Manage_Comments;

$data = $get_data->get_data($sort)


?>
<div class="container">
    <h1 class="text-center member-header">Manage Comments</h1>
    <div class="table-responsive mt-5">
        <table class="main-table text-center table table-bordered">
            <tr>
                <td>Comment</td>
                <td>Item Name</td>
                <td>User Name</td>
                <td>Date</td>
                <td>Control</td>
            </tr>
            <?php
            $get = new Manage_Comments;
            $get->table($data);
            ?>
        </table>
    </div>
    <div class="manage">
        <a href="comments.php?do=Add" class="btn btn-primary add-btn mb-5"> Add New Comment</a>
        <div class="ordering">
            <a href="?sort=ASC" class="asc"> Asc</a>
            <a href="?sort=DESC" class="desc"> Desc</a>
        </div>
    </div>
</div>