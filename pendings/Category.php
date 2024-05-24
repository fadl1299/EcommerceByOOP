<?php
$fun = new Func();
$count = $fun->checkItem("Reg_status", "categories", 0);
if ($count > 0) {
    $get = new Manage_Users();

    $stmt2 =  $get->pending('categories', '*', 'Reg_status = 0');

    $rows =  $stmt2->fetchAll();
?>
    <div class="container">
        <h1 class="text-center member-header">Manage Pending Category</h1>
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
                $get->pending_table($rows);
                ?>
            </table>
        </div>
        <div class="manage">
            <a href="categories.php?do=Add" class="btn btn-primary add-btn mb-5"> Add New Category</a>
        </div>
    </div>
<?php
} else { ?>

    <div class="container mt-5">
        <div class="alert alert-danger"> There Is No Pendings Category.</div>
    </div>
<?php
}
