<?php
$pageTitle = 'Tutorial - PHP';

// Start output buffering
ob_start();
?>
<?php
$playlist = [
    ['name' => 'Hajib', 'streams' => 1200],
    ['name' => 'Toto', 'streams' => 5000],
    ['name' => 'Draganove', 'streams' => 4360],
    ['name' => 'Naslghiwane', 'streams' => 6600],
];
function getTotalStreams(array $list)
{
    $total = 0;
    for ($i = 0; $i < count($list); $i++) {
        $total += $list[$i]['streams'];
    }
    return $total;
}

function getAverageStreams(array $playlist)
{
    return getTotalStreams($playlist) / count($playlist);

}
?>
<div class="container text-center p-5">
    <div class="d-grid gap-2 col-6 mx-auto">
        <h1>Playlist</h1>
        <ul class="list-group">
            <li
                class="list-group-item d-flex justify-content-between align-items-center list-group-item-primary text-center">
                <strong>
                    Songs
                </strong>
            </li>
            <?php foreach ($playlist as $song): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong><?php echo $song['name']; ?></strong>
                    <span class="badge text-bg-primary rounded-pill"><?php echo $song['streams']; ?></span>
                </li>
            <?php endforeach; ?>
            <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-success">
                <strong>Total :</strong>
                <span class="badge text-bg-success rounded-pill"><?php echo getTotalStreams($playlist); ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-success">
                <strong>Average :</strong>
                <span class="badge text-bg-success rounded-pill"><?php echo getAverageStreams($playlist); ?></span>
            </li>

        </ul>
    </div>
</div>
<?php
// End output buffering and capture the output
$bodyContent = ob_get_clean();

// Include the base template with the captured content
include 'base.php';
?>