<?php
echo "<div class='container'>";
echo "<h1 class='text-center member-header'>Activate CommentS</h1>";

$comid = isset($_GET['comid']) && is_numeric($_GET['comid']) ? intval($_GET['comid']) : 0;
$fun = new Func();
$check = $fun->checkItem('c_id', 'comments', $comid);

if ($check > 0) {
    $mana = new Manage_Users;
    $stmt = $mana->activate($comid, 'comments', 'status', 'c_id');
} else {
    $error = '<div class="alert alert-danger">This Comment Dosen\'t Exist.</div>';
    $fun = new Func();
    $fun->redirectToHome($error, 3, 'comments.php?do=Manage');
}
echo "</div>";
