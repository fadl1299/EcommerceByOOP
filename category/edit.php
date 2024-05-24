<?php
    $cateid = isset($_GET['cateid']) && is_numeric($_GET['cateid']) ? intval($_GET['cateid']) : 0;

    $get = new Manage_Cate;

    $edit = $get->edit($cateid);
    $row = $edit->fetch();
    $count = $edit->rowCount();

    if ($count > 0) {
    ?>
    <div class="container">
        <h1 class="text-center member-header">Edit Category</h1>
        <form class="edit" action="?do=Update" method="POST" enctype="multipart/form-data">
            <img src="layout/images/<?php echo $row['image'] ?>" alt="">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Image</span>
                <input value="<?php echo $row['image'] ?>" type="file" class="form-control" name="image" required="required">
            </div>
            <input type="hidden" name="cateid" value="<?php echo $cateid ?>">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Name</span>
                <input value="<?php echo $row['Name'] ?>" type="text" class="form-control" name="name" placeholder="Name" aria-label="Name" aria-describedby="addon-wrapping" autocomplete='off' required="required">
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Description</span>
                <input type="text" class="password form-control" value="<?php echo $row['Description'] ?>" name="desc" placeholder="Description" aria-label="Description" aria-describedby="addon-wrapping" autocomplete="off" required="required">
            </div>
            <div class="input-group flex-nowrap">
                <input class="btn btn-primary save" type="submit" value="Edit Category" />
            </div>
        </form>
    </div>
<?php
    } else {
        $error = '<div class="alert alert-danger">This Id Not Found.</div>';
        $fun = new Func();
        $fun->redirectToHome($error, 3, 'categories.php?do=Manage');
    }
?>