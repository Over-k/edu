<?php
$pageTitle = 'Tutorial - PHP';

// Start output buffering
ob_start();
?>
<?php


function is_validStudent(array $students): array
{
    $validStudents = [];
    foreach ($students as $student) {
        if ($student['note'] >= 10) {
            $validStudents[] = $student;
        }
    }
    return $validStudents;
}
function is_not_validStudent(array $students): array
{
    $not_validStudents = [];
    foreach ($students as $student) {
        if ($student['note'] <= 10) {
            $not_validStudents[] = $student;
        }
    }
    return $not_validStudents;
}
function calculate_age($birth_date): int
{
    $birth_date = DateTime::createFromFormat('d/m/Y', $birth_date);
    return $birth_date->diff(new DateTime())->y;
}
$_valid = false;
if (isset($_GET['validStudents'])) {
    $_valid = true;
}
if (isset($_GET['notValidStudents'])) {
    $valid = false;
}
$students = [
    [
        'first_name' => 'Ahmed',
        'last_name' => 'Mohamed',
        'note' => 12,
        'birth_date' => '16/02/2000',
        'is_valid' => true
    ],
    [
        'first_name' => 'Ali',
        'last_name' => 'Hassan',
        'note' => 6,
        'birth_date' => '16/02/2006',
        'is_valid' => false
    ],
    [
        'first_name' => 'Ali',
        'last_name' => 'Ali',
        'note' => 7,
        'birth_date' => '16/02/2020',
        'is_valid' => false
    ],
    [
        'first_name' => 'Omar',
        'last_name' => 'Abdullah',
        'note' => 15,
        'birth_date' => '16/02/2009',
        'is_valid' => true
    ],
    [
        'first_name' => 'Farouk',
        'last_name' => 'Ali',
        'note' => 9,
        'birth_date' => '16/02/2002',
        'is_valid' => false
    ],
    [
        'first_name' => 'Ahmed',
        'last_name' => 'Hassan',
        'note' => 14,
        'birth_date' => '16/02/2001',
        'is_valid' => true
    ]
];
$results = $_valid ? is_validStudent($students) : is_not_validStudent($students);
?>

<div class="container">
    <h2 class="mb-4 pt-4">My Table Title</h2>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Full Name
                </th>
                <th scope="col">Age
                </th>
                <th scope="col">Note
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $index => $student) { ?>
                <tr class="table-<?php if ($_SESSION['data']['colored'])
                    echo ($student['note'] < 10 ? 'danger' : 'success'); ?>">
                    <th>
                        <?php echo ($index + 1); ?>
                    </th>
                    <td>
                        <?php echo htmlspecialchars($student['first_name']); ?>
                        <?php echo htmlspecialchars($student['last_name']); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars(calculate_age($student['birth_date'])); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($student['note']); ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="alert alert-<?php echo $_valid ? 'success' : 'danger'; ?>" role="alert">
        <?php echo $_valid ? 'Valid Students' : 'Not Valid Students'; ?> Go to <a class="alert-link"
            href="functions.php?<?php echo $_valid ? 'notValidStudents' : 'validStudents'; ?>"><?php echo $_valid ? 'Not Valid' : 'Valid'; ?></a>.
    </div>

</div>
<?php
// End output buffering and capture the output
$bodyContent = ob_get_clean();

// Include the base template with the captured content
include 'base.php';
?>