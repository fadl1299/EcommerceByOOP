<?php
echo "<div class='container'>";
echo "<h1 class='text-center member-header'>Activate Category</h1>";

$cateid = isset($_GET['cateid']) && is_numeric($_GET['cateid']) ? intval($_GET['cateid']) : 0;

$functi = new func();
$check = $functi->checkitem('ID', 'categories', $cateid);

if ($check > 0) {
    $mana = new Manage_Users;
    $stmt = $mana->activate($cateid, 'categories', 'Reg_status', 'ID');
} else {
    $error = '<div class="alert alert-danger">This User Dosen\'t Exist.</div>';
    $fun = new func();
    $fun->redirectToHome($error, 3, 'categories.php?do=Manage');
}
echo "</div>";

?>
