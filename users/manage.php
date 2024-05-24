<?php
$get = new Manage_Users();

$sort = $get->sort();

$data = $get->get_data('*', 'users', 'GroupID != 1', 'UserID', $sort);

?>

<div class="container">
    <h1 class="text-center member-header">Manage Users</h1>
    <div class="table-responsive mt-5">
        <table class="main-table text-center table table-bordered">
            <tr>
                <td>Image</td>
                <td>Username</td>
                <td>Email</td>
                <td>Full Name</td>
                <td>Date</td>
                <td>Control</td>
            </tr>
            <?php
            $get = new Manage_Users();
            $get->table($data);
            ?>
        </table>
    </div>
    <div class="manage">
        <a href="users.php?do=Add" class="btn btn-primary add-btn mb-5"> Add New User</a>
        <div class="ordering">
            <a href="?sort=ASC" class="asc"> Asc</a>
            <a href="?sort=DESC" class="desc"> Desc</a>
        </div>
    </div>
</div>