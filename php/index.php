<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Exercise</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container text-center p-5">
        <div class="d-grid gap-2 col-6 mx-auto">
            <?php
            $dir = './';

            if (is_dir($dir)) {
                if ($dh = opendir($dir)) {
                    while (($file = readdir($dh)) !== false) {
                        if ($file != 'index.php' && $file != 'nav.php' && $file != '.' && $file != '..') {
                            echo "<a href='$file'><button type='button' class='btn mb-2 mb-md-0 btn-primary'><i class='fa-solid fa-folder pr-2'></i><span>  $file</span></button></a>";

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
</body>

</html>