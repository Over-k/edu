<?php
$pageTitle = 'Tutorial - PHP';
ob_start();
?>

----------------------
| just for duplicate |
----------------------

<?php
$bodyContent = ob_get_clean();
include 'base.php';
?>