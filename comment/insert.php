<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo  "<div class='container'>";
    echo "<h1 class='text-center member-header'>Insert Comment</h1>";
    $comment = $_POST['comment'];
    $item = $_POST['item'];
    $user = $_POST['user'];

    $fun = new Func();
    $check = $fun->checkItem("Comment", "comments", $comment);

    if ($check === 1) {
        echo '<div class="alert alert-danger">Sorry This Comment Exist. </div>';
    } else {
        $mana = new Manage_Comments;
        $mana->errors($comment, $item, $user);

        if (empty($mana->errors($comment, $item, $user))) {
            $mana->add($comment, $item, $user);
        }
    }
} else {
    $error = '<div class="alert alert-danger">You Can\'t Browse This Page Directly. </div>';
    $fun->redirectToHome($error, 3, 'index.php');
}
echo "</div>";
