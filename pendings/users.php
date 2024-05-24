<?php
$fun = new Func();
$count = $fun->checkItem("RegStatus", "users", 0);
if ($count > 0) {
    $mana_User = new Manage_Users();

    $stmt2 =  $mana_User->pending('users', '*', 'GroupID != 1', 'RegStatus = 0');

    $rows =  $stmt2->fetchAll();
?>
    <div class="container">
        <h1 class="text-center member-header">Manage Pending Users</h1>
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
                $mana_User = new Manage_Users();
                $mana_User->pending_table($rows);
                ?>
            </table>
        </div>
        <div class="manage">
            <a href="users.php?do=Add" class="btn btn-primary add-btn mb-5"> Add New Users</a>
        </div>
    </div>

<?php
} else { ?>

    <div class="container mt-5">
        <div class="alert alert-danger"> There Is No Pendings Users.</div>
    </div>
<?php
}
