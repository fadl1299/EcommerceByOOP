<?php
$fun = new Func();
$count = $fun->checkItem("Status", "items", 0);
if ($count > 0) {

    $get = new Manage_Items();

    $stmt2 =  $get->pending();

    $rows =  $stmt2->fetchAll();
?>
    <div class="container">
        <h1 class="text-center member-header">Manage Penging Items</h1>
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
                $get->pending_table($rows);
                ?>
            </table>
        </div>
        <div class="manage">
            <a href="items.php?do=Add" class="btn btn-primary add-btn mb-5"> Add New Item</a>
        </div>
    <?php
} else { ?>

        <div class="container mt-5">
            <div class="alert alert-danger"> There Is No Pendings Items.</div>
        </div>
    <?php
}
