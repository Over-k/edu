<?php
$pageTitle = 'Tutorial - PHP';

// Start output buffering
ob_start();
?>
<div class="d-grid gap-2 col-6 mx-auto">
    <?php
    $dir = './';

    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
                if (!in_array($file, ['.', '..', 'index.php', 'base.php'])) {
                    echo "<a href='$file'><button type='button' class='btn mb-2 mb-md-0 btn-primary'><i class='fa-solid fa-file pr-2'></i><span>  $file</span></button></a>";
                }
            }
            closedir($dh);
        } else {
            echo "Could not open directory.";
        }
    } else {
        echo "$dir is not a valid directory.";
    }
    ?>
</div>
</div>
<?php
// End output buffering and capture the output
$bodyContent = ob_get_clean();

// Include the base template with the captured content
include 'base.php';
?>