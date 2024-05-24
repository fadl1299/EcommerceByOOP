<?php
echo  "<div class='container'>";
echo  "<h1 class='text-center member-header'>Activate Item</h1>";

$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;
$fun = new Func();
$check = $fun->checkItem('Cat_ID', 'items', $itemid);

if ($check > 0) {
    $mana = new Manage_Users;
    $stmt = $mana->activate($itemid, 'items', 'Status', 'Cat_ID');
} else {
    $error = '<div class="alert alert-danger">This Item Dosen\'t Exist.</div>';
    $fun = new Func();
    $fun->redirectToHome($error, 3, 'items.php?do=Manage');
}
echo "</div>";
