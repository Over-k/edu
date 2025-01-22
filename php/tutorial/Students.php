<?php
$pageTitle = 'Tutorial - PHP';

// Start output buffering
ob_start();
?>
<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

$students = [
  [
    'first_name' => 'Ahmed',
    'last_name' => 'Mohamed',
    'note' => 12
  ],
  [
    'first_name' => 'Ali',
    'last_name' => 'Hassan',
    'note' => 6
  ],
  [
    'first_name' => 'Ali',
    'last_name' => 'Ali',
    'note' => 7
  ],
  [
    'first_name' => 'Omar',
    'last_name' => 'Abdullah',
    'note' => 15
  ],
  [
    'first_name' => 'Farouk',
    'last_name' => 'Ali',
    'note' => 9
  ],
  [
    'first_name' => 'Ahmed',
    'last_name' => 'Hassan',
    'note' => 14
  ],
  [
    'first_name' => 'Ahmed',
    'last_name' => 'Ali',
    'note' => 18
  ],
];

if (!isset($_SESSION['data'])) {
  $_SESSION['data'] = [
    'students' => $students,
    'sort_by' => 'first_name',
    'sort_order' => 'asc',
    'colored' => false,
    'limit' => 30,
    'page' => 1
  ];
}
$students = $_SESSION['data']['students'];
if (isset($_GET['refresh'])) {
  session_unset();
  session_destroy();
  header('Location: Students.php');
  exit;
}
if (isset($_GET['colored'])) {
  $colored = $_GET['colored'];
  $_SESSION['data']['colored'] = !$colored;
}
if (isset($_GET['limit'])) {
  $limit = $_GET['limit'];
  $_SESSION['data']['limit'] = $limit;
}
if (isset($_GET['page'])) {
  $page = $_GET['page'];
  $_SESSION['data']['page'] = $page;
}
$limit = $_SESSION['data']['limit'];
$page = $_SESSION['data']['page'];
$pages = 0;
$total_students = count($students);
$pages = ceil($total_students / $limit);
$offset = ($page - 1) * $limit;
$paginated_students = array_slice($students, $offset, $limit);

function searchStudents(array $students, string $searchValue, int $searchBy): array
{
  $results = [];

  foreach ($students as $student) {
    switch ($searchBy) {
      case 1:
        if (stripos($student['first_name'], $searchValue) !== false) {
          $results[] = $student;
        }
        break;
      case 2:
        if (stripos($student['last_name'], $searchValue) !== false) {
          $results[] = $student;
        }
        break;
      case 3:
        if ($student['note'] == $searchValue) {
          $results[] = $student;
        }
        break;
    }
  }

  return $results;
}

if (isset($_POST['SearchValue'], $_POST['searchBy'])) {
  $SearchValue = $_POST['SearchValue'];
  $searchBy = $_POST['searchBy'];
  $students = searchStudents($students, $SearchValue, $searchBy);
  $paginated_students = array_slice($students, $offset, $limit);
} elseif (isset($_POST['editStudent']) || isset($_GET['delete']) || isset($_POST['addStudent'])) {
  if (isset($_GET['delete'])) {
    unset($students[$_GET['delete']]);
  } elseif (isset($_POST['editStudent'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $note = $_POST['note'];
    $id = $_POST['id'];
    $students[$id]['first_name'] = $first_name;
    $students[$id]['last_name'] = $last_name;
    $students[$id]['note'] = $note;
  } elseif (isset($_POST['addStudent'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $note = $_POST['note'];
    $new_student = array(
      'first_name' => $first_name,
      'last_name' => $last_name,
      'note' => $note
    );
    if (!empty($first_name) || !empty($last_name) || !empty($note)) {
      $students[] = $new_student;
    }
  }
  $_SESSION['data']['students'] = $students;
  header('Location: Students.php');
} elseif (isset($_GET['sort_by']) || isset($_GET['sort_order'])) {
  $sort_by = $_SESSION['data']['sort_by'];
  $sort_order = $_SESSION['data']['sort_order'];
  if (in_array($_GET['sort_by'], ['first_name', 'last_name', 'note']) || in_array($_GET['sort_order'], ['asc', 'desc'])) {
    $_SESSION['data']['sort_by'] = $_GET['sort_by'];
    $_SESSION['data']['sort_order'] = $_GET['sort_order'];
    $sort_by = $_SESSION['data']['sort_by'];
    $sort_order = $_SESSION['data']['sort_order'];
  }
  usort($students, function ($a, $b) use ($sort_by, $sort_order) {
    if ($sort_by == 'first_name' || $sort_by == 'last_name') {
      return $sort_order == 'asc' ? strcmp($a[$sort_by], $b[$sort_by]) : strcmp($b[$sort_by], $a[$sort_by]);
    } elseif ($sort_by == 'note') {
      return $sort_order == 'asc' ? $a['note'] - $b['note'] : $b['note'] - $a['note'];
    }
  });
  $_SESSION['data']['sort_order'] = $sort_order == 'asc' ? 'desc' : 'asc';
  $_SESSION['data']['students'] = $students;
}
?>

<div class="container p-5">
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Student</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post">
            <div class="mb-3">
              <label for="first_name" class="form-label">First Name</label>
              <input type="text" class="form-control" id="first_name" name="first_name" aria-describedby="name"
                required>
            </div>
            <div class="mb-3">
              <label for="last_name" class="form-label">Last Name</label>
              <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
            <div class="mb-3">
              <label for="note" class="form-label">Note</label>
              <input type="number" class="form-control" id="note" name="note" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="addStudent" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <form method="post">
    <div class="btn-group" role="group" aria-label="Basic example">
      <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
          class="fa-solid fa-plus"></i></button>
      <a class="link-underline link-underline-opacity-0 link-light btn btn-dark"
        href="Students.php?colored=<?php echo $_SESSION['data']['colored']; ?>" class="text-light" role="button"><i
          class="fa-solid fa-palette"></i>
      </a>
      <a class="btn btn-dark link-underline link-underline-opacity-0 link-light" href="Students.php?refresh=true"
        role="button"><i class="fa-solid fa-arrows-rotate"></i>
      </a>
  </form>
</div>
<form method="post" class="row row-cols-lg-auto g-3 align-items-center justify-content-md-end">
  <div class="col-12">
    <div class="input-group">
      <input type="text" class="form-control" id="inlineFormInputGroupSearch" name="SearchValue" placeholder="Search">
    </div>
  </div>

  <div class="col-12">
    <label class="visually-hidden" for="inlineFormSelectPref">Search by</label>
    <select class="form-select" id="inlineFormSelectPref" name="searchBy">
      <option value="1" selected>First Name</option>
      <option value="2">Last Name</option>
      <option value="3">Note</option>
    </select>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-dark">Submit</button>
  </div>
</form>

<table class="table p-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col"><a class="link-underline link-underline-opacity-0"
          href="?sort_by=first_name&sort_order=<?php echo ($_SESSION['data']['sort_order']); ?>">First
          Name</a>
      </th>
      <th scope="col"><a class="link-underline link-underline-opacity-0"
          href="?sort_by=last_name&sort_order=<?php echo ($_SESSION['data']['sort_order']); ?>">Last
          Name</a>
      </th>
      <th scope="col"><a class="link-underline link-underline-opacity-0"
          href="?sort_by=note&sort_order=<?php echo ($_SESSION['data']['sort_order']); ?>">Note</a>
      </th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($paginated_students as $index => $student) { ?>
      <tr class="table-<?php if ($_SESSION['data']['colored'])
        echo ($student['note'] < 10 ? 'danger' : 'success'); ?>">
        <th scope="row">
          <?php echo ($index + 1); ?>
        </th>
        <td>
          <?php echo htmlspecialchars($student['first_name']); ?>
        </td>
        <td>
          <?php echo htmlspecialchars($student['last_name']); ?>
        </td>
        <td>
          <?php echo htmlspecialchars($student['note']); ?>
        </td>
        <td>
          <div class="btn-group gap-2">

            <button type="button" class="dropdown-item" data-bs-toggle="modal"
              data-bs-target="#editModal<?php echo htmlspecialchars($index); ?>"><i
                class="fa-solid fa-pen-to-square"></i></button>
            <a type="button" role="button"
              class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
              href="?delete=<?php echo $index; ?>"><i class="fa-solid fa-trash"></i></a>
          </div>

          <div class="modal" tabindex="-1" id="editModal<?php echo htmlspecialchars($index); ?>">
            <form action="" method="post">
              <div class="modal-dialog modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="crud" value="edit">
                    <input type="hidden" name="id" aria-label="id" class="form-control"
                      value="<?php echo htmlspecialchars($index); ?>">

                    <div class="mb-3 row">
                      <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
                      <div class="col-sm-10">
                        <input type="text" name="first_name" aria-label="First name" class="form-control"
                          value="<?php echo htmlspecialchars($student['first_name']); ?>">
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
                      <div class="col-sm-10">
                        <input type="text" name="last_name" aria-label="Last name" class="form-control"
                          value="<?php echo htmlspecialchars($student['last_name']); ?>">
                      </div>
                    </div>

                    <div class=" mb-3 row">
                      <label for="note" class="col-sm-2 col-form-label">Note</label>
                      <div class="col-sm-10">
                        <input type="number" name="note" aria-label="note" class="form-control"
                          value="<?php echo htmlspecialchars($student['note']); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="editStudent" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<div class="row">
  <div class="col-md-4">

    <div class="btn-group">
      <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Show by
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="?limit=5">5</a></li>
        <li><a class="dropdown-item" href="?limit=10">10</a></li>
        <li><a class="dropdown-item" href="?limit=20">20</a></li>
        <li><a class="dropdown-item" href="?limit=30">30</a></li>
      </ul>
    </div>
  </div>
  <nav aria-label="Page navigation example" class="col-md-4 offset-md-4">
    <ul class="pagination justify-content-end">
      <li class="page-item <?php echo $page == 1 ? 'disabled' : 'active' ?>">
        <a class="page-link" href="<?php echo $page == 1 ? '' : '?page=' . ($page - 1); ?>">Previous</a>
      </li>
      <?php for ($i = 1; $i <= $pages; $i++) { ?>
        <li class="page-item <?php echo $page == $i ? 'active' : '' ?>">
          <a class="page-link" href="?page=<?php echo $i; ?>">
            <?php echo $i; ?>
          </a>
        </li>
      <?php } ?>
      <li class="page-item <?php echo $page == $pages ? 'disabled' : 'active' ?>">
        <a class="page-link" href="<?php echo $page == $pages ? '' : '?page=' . ($page + 1); ?>">Next</a>
      </li>
    </ul>
  </nav>
</div>
</div>
<?php
// End output buffering and capture the output
$bodyContent = ob_get_clean();

// Include the base template with the captured content
include 'base.php';
?>