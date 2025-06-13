<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CRUD in OOP PHP | View Students</title>
    <meta name="description" content="View student records using OOP PHP" />
    <meta name="robots" content="noindex, nofollow" />
    <!--  CSS -->
    <link rel="stylesheet" href="./css/style.css" />
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap"
        rel="stylesheet"
    />
</head>
<body>
<header>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"
            ><img src="./images/Books.jpeg" alt="header logo" style="height:40px;"
                /></a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Add Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">View Students</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="container mt-4">
    <h2 class="mb-4">Student Records</h2>
    <?php
    include_once './class/crud.php';
    $crud = new crud();

    $query = "SELECT * FROM students ORDER BY id DESC";
    $students = $crud->getData($query);

    if ($students && count($students) > 0) {
        echo '<table class="table table-striped table-hover">';
        echo '<thead class="table-primary">';
        echo '<tr>';
        echo '<th scope="col">ID</th>';
        echo '<th scope="col">Name</th>';
        echo '<th scope="col">Email</th>';
        echo '<th scope="col">Course</th>';
        echo '<th scope="col">Grade</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($students as $student) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($student['id']) . '</td>';
            echo '<td>' . htmlspecialchars($student['name']) . '</td>';
            echo '<td>' . htmlspecialchars($student['email']) . '</td>';
            echo '<td>' . htmlspecialchars($student['course']) . '</td>';
            echo '<td>' . htmlspecialchars($student['grade']) . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<p>No student records found.</p>';
    }
    ?>
</div>
</body>
</html>
