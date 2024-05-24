<?php
$get = new Manage_Comments;
$comid = isset($_GET['comid']) && is_numeric($_GET['comid']) ? intval($_GET['comid']) : 0;

$edit = $get->edit($comid);
$row = $edit->fetch();
$count = $edit->rowCount();

if ($count > 0) {

?>
    <div class="container">
        <h1 class="text-center member-header">Edit Comment</h1>
        <form class="edit" action="?do=Update" method="POST">
            <input type="hidden" name="comid" value="<?php echo $comid ?>">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Comment</span>
                <input value="<?php echo $row['Comment'] ?>" type="text" class="form-control" name="comment" placeholder="Comment" aria-label="Comment" aria-describedby="addon-wrapping" autocomplete='off' required="required">
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Item</span>
                <select id="test" name="item">
                    <option value="0"> </option>
                    <?php
                    $get = new Manage_Comments;
                    $get->select_choosen_table($row, 'c_id', 'item_id', 'items', 'Name')
                    ?>
                </select>
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">User</span>
                <select id="test" name="user">
                    <option value="0"> </option>
                    <?php
                    $get = new Manage_Comments;
                    $get->select_choosen_table($row, 'user_id', 'UserID', 'users', 'Username')

                    ?>
                </select>
            </div>
            <div class="input-group flex-nowrap">
                <input class="btn btn-primary save" type="submit" value="Save" />
            </div>
        </form>
    </div>
<?php
} else {
    $error = '<div class="alert alert-danger">This Id No\'t Found.</div>';
    $fun = new Func();
    $fun->redirectToHome($error, 3, 'comments.php?do=Manage');
}
