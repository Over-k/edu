<?php
$pageTitle = 'Tutorial - PHP';

// Start output buffering
ob_start();
?>
<?php
$courses = [
    ['name' => 'course 1', 'instructor' => 'Instructor 1', 'level' => 2, 'number' => 10, 'available' => true],
    ['name' => 'course 2', 'instructor' => 'Instructor 2', 'level' => 3, 'number' => 20, 'available' => true],
    ['name' => 'course 3', 'instructor' => 'Instructor 3', 'level' => 4, 'number' => 30, 'available' => false],
    ['name' => 'course 4', 'instructor' => 'Instructor 4', 'level' => 5, 'number' => 40, 'available' => true],
    ['name' => 'course 5', 'instructor' => 'Instructor 5', 'level' => 6, 'number' => 50, 'available' => false],
    ['name' => 'course 6', 'instructor' => 'Instructor 6', 'level' => 7, 'number' => 60, 'available' => true],
    ['name' => 'course 7', 'instructor' => 'Instructor 7', 'level' => 8, 'number' => 70, 'available' => false],
    ['name' => 'course 8', 'instructor' => 'Instructor 8', 'level' => 9, 'number' => 80, 'available' => false],
    ['name' => 'course 9', 'instructor' => 'Instructor 9', 'level' => 10, 'number' => 90, 'available' => true],
    ['name' => 'course 10', 'instructor' => 'Instructor 10', 'level' => 11, 'number' => 100, 'available' => false]
];
?>
<h1>List of Courses</h1>
<ul>
    <?php foreach ($courses as $coure): ?>
        <li>
            <strong>Nome : </strong> <?php echo $coure['name']; ?>,
            <strong>Instructor : </strong> <?php echo $coure['instructor']; ?>,
            <strong>Level : </strong> <?php echo $coure['level']; ?>,
            <strong>Number : </strong> <?php echo $coure['number']; ?>,
            <?php if ($coure['available']): ?>
                <strong style="color:green">Course is available</strong>
            <?php else: ?>
                <strong style="color:red">Course is not available</strong>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>
<?php
// End output buffering and capture the output
$bodyContent = ob_get_clean();

// Include the base template with the captured content
include 'base.php';
?>