<?php
$fun = new Func();
$count = $fun->checkItem("status", "comments", 0);
if ($count > 0) {
    $get = new Manage_Comments();
    $rows =  $get->get_pending_data();
?>
    <div class="container">
        <h1 class="text-center member-header">Manage Penging Comments</h1>
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
                $get->pending_table($rows);
                ?>
            </table>
        </div>
        <div class="manage">
            <a href="comments.php?do=Add" class="btn btn-primary add-btn mb-5"> Add New Comment</a>
        </div>
    <?php
} else { ?>
        <div class="container mt-5">
            <div class="alert alert-danger"> There Is No Pendings Comments.</div>
        </div>
    <?php
}
