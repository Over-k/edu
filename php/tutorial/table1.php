<?php
$pageTitle = 'Tutorial - PHP';

// Start output buffering
ob_start();
?>
<div class="container p-2">
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary p-2 m-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add New Course
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Course</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="courseName" class="form-label">Course Name</label>
              <input type="text" class="form-control" id="name" aria-describedby="name">
            </div>
            <div class="mb-3">
              <label for="instructor" class="form-label">Instructor</label>
              <input type="text" class="form-control" id="instructor">
            </div>
            <div class="mb-3">
              <label for="level" class="form-label">Level</label>
              <input type="number" class="form-control" id="level">
            </div>
            <div class="mb-3">
              <label for="number" class="form-label">Number</label>
              <input type="number" class="form-control" id="number">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  $courses = [
    ['name' => 'course 1', 'instructor' => 'Instructor 1', 'level' => 2, 'number' => 10],
    ['name' => 'course 2', 'instructor' => 'Instructor 2', 'level' => 3, 'number' => 20],
    ['name' => 'course 3', 'instructor' => 'Instructor 3', 'level' => 4, 'number' => 30],
    ['name' => 'course 4', 'instructor' => 'Instructor 4', 'level' => 5, 'number' => 40],
    ['name' => 'course 5', 'instructor' => 'Instructor 5', 'level' => 6, 'number' => 50],
    ['name' => 'course 6', 'instructor' => 'Instructor 6', 'level' => 7, 'number' => 60],
    ['name' => 'course 7', 'instructor' => 'Instructor 7', 'level' => 8, 'number' => 70],
    ['name' => 'course 8', 'instructor' => 'Instructor 8', 'level' => 9, 'number' => 80],
    ['name' => 'course 9', 'instructor' => 'Instructor 9', 'level' => 10, 'number' => 90],
    ['name' => 'course 10', 'instructor' => 'Instructor 10', 'level' => 11, 'number' => 100]
  ];

  echo '<table class="table table-dark table-striped">';
  echo '<tr><th>Name</th><th>Instructor</th><th>Level</th><th>Number</th></tr>';

  for ($i = 0; $i < count($courses); $i++) {

    $class = '';
    $level = $courses[$i]['level'];

    if ($level < 5) {
      $class = 'table-danger'; // Less than 5
    } elseif ($level >= 5 && $level <= 7) {
      $class = 'table-warning'; // Between 5 and 7
    } else {
      $class = 'table-success'; // More than 7
    }

    echo '<tr class="' . $class . '">';
    echo '<td>' . htmlspecialchars($courses[$i]['name']) . '</td>';
    echo '<td>' . htmlspecialchars($courses[$i]['instructor']) . '</td>';
    echo '<td>' . htmlspecialchars($courses[$i]['level']) . '</td>';
    echo '<td>' . htmlspecialchars($courses[$i]['number']) . '</td>';
    echo '</tr>';
  }

  // End the HTML table
  echo '</table>';
  ?>
</div>
<?php
// End output buffering and capture the output
$bodyContent = ob_get_clean();

// Include the base template with the captured content
include 'base.php';
?>