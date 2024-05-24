<?php
echo "<div class='container'>";
echo "<h1 class='text-center member-header'>Delete category</h1>";

$cateid = isset($_GET['cateid']) && is_numeric($_GET['cateid']) ? intval($_GET['cateid']) : 0;


$function = new Func();
$check = $function->checkItem('ID', 'categories', $cateid);

if ($check > 0) {
    $delet_Manage = new Manage_Users;
    $stmt = $delet_Manage->delete($cateid, 'categories', 'ID', ':cate');
} else {
    $error = '<div class="alert alert-danger">This User Dosen\'t Exist.</div>';
    $function = new Func();
    $function->redirectToHome($error, 3, 'categories.php?do=Manage');
}
echo "</div>";
