<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "<div class='container'>";
    echo "<h1 class='text-center member-header'>Update Comment</h1>";
    // get variabules from form
    $id = $_POST['comid'];
    $comment = $_POST['comment'];
    $item = $_POST['item'];
    $user = $_POST['user'];

    $manage = new Manage_Comments();

    if (empty($manage->errors($comment, $item, $user))) {
        $mana = new Manage_Users();
        $check = $mana->check_user_exist('comments', 'Comment', 'c_id', $user, $id);
        if ($check === 1) {
            $error = '<div class="alert alert-danger">Sorry This Comment Is Exist. </div>';
            $fun = new Func();
            $fun->redirectToHome($error, 3, 'comments.php?do=Manage');
        } else {
            $manage = new Manage_Comments();
            $stmt = $manage->update($comment, $item, $user, $id);
        }
    }
} else {

    $error = '<div class="alert alert-danger">You Can\'t Browse This Page Directly. </div>';
    $fun = new Func();
    $fun->redirectToHome($error, 3, 'comments.php?do=Manage');
}
echo "<div>";
