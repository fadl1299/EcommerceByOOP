<?php

echo  "<div class='container'>";
echo  "<h1 class='text-center member-header'>Activate User</h1>";

$userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
$fun = new Func();
$check = $fun->checkItem('user_id', 'users', $userid);

if ($check > 0) {
    $mana = new Manage_Users();
    $stmt = $mana->activate($userid, 'users', 'Reg_status', 'user_id');
} else {
    $error = '<div class="alert alert-danger">This User Dosen\'t Exist.</div>';
    $fun = new Func();
    $fun->redirectToHome($error, 3, 'users.php?do=Manage');
}
echo "</div>";
