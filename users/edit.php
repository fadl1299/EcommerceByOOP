<?php
$get = new Manage_Users();
$userid = isset($_GET["userid"]) && is_numeric($_GET["userid"]) ? intval($_GET["userid"]) : 0;

$edit = $get->edit($userid);
$row = $edit->fetch();
$count = $edit->rowCount();

if ($count > 0) {
?>


    <div class="container">
        <h1 class="text-center member-header">Edit User</h1>
        <form class="edit" action="?do=Update" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="userid" value="<?php echo $userid ?>">
            <img src="layout/images/<?php echo $row['image'] ?>" alt="">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Image</span>
                <input value="<?php echo $row['image'] ?>" type="file" class="form-control" name="image" required="required">
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Username</span>
                <input value="<?php echo $row['Username'] ?>" type="text" class="form-control" name="username" placeholder="Username" autocomplete='off' required="required">
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Password</span>
                <input value="<?php echo $row['Password'] ?>" type="hidden" name="oldpassword">
                <input type="password" class="password form-control" name="newpassword" placeholder="password" autocomplete="new-password">
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Email</span>
                <input value="<?php echo $row['Email'] ?>" type=" text" class="form-control" name="email" placeholder="email" required="required">
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Job</span>
                <input value="<?php echo $row['job'] ?>" type=" text" class="form-control" name="job" placeholder="User Job" required="required">
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Full Name</span>
                <input value="<?php echo $row['Full_name'] ?>" type=" text" class="form-control" name="full" placeholder="full name" required="required">
            </div>

            <div class="input-group flex-nowrap">
                <input class="btn btn-primary save" type="submit" value="Edit User" />
            </div>
        </form>
    </div>
<?php
} else {
    $error = '<div class="alert alert-danger">This Id Not Found.</div>';
    $fun = new Func();
    $fun->redirectToHome($error, 3, 'users.php?do=Manage');
}
