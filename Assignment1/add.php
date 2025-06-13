<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title> Add Student Record</title>
    <meta name="description" content="Add new student record using OOP PHP" />
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
<main class="container mt-5">
    <?php
    include_once('./class/crud.php');
    include_once('./class/validate.php');

    $crud = new crud();
    $valid = new validate();
    $msg = '';

    if (isset($_POST['Submit'])) {
        // sanitize inputs
        $name = $crud->escape_string($_POST['name']);
        $email = $crud->escape_string($_POST['email']);
        $course = $crud->escape_string($_POST['course']);
        $grade = $crud->escape_string($_POST['grade']);

        // check for empty fields
        $msg = $valid->checkEmpty($_POST, ['name', 'email', 'course', 'grade']);
        $checkEmail = $valid->validEmail($email);
        $checkGrade = $valid->validGrade($grade);

        if (!empty($msg)) {
            echo "<div class='alert alert-danger'>$msg</div>";
        } elseif (!$checkEmail) {
            echo "<div class='alert alert-danger'>Please enter a valid email.</div>";
        } elseif (!$checkGrade) {
            echo "<div class='alert alert-danger'>Please enter a valid numeric grade.</div>";
        } else {
            // Insert data into students table
            $result = $crud->execute("INSERT INTO students(name, email, course, grade) VALUES ('$name', '$email', '$course', '$grade')");
            if ($result) {
                echo "<div class='alert alert-success'>Student record has been added.</div>";
                echo "<a href='view.php' class='btn btn-primary'>View Records</a>";
            } else {
                echo "<div class='alert alert-danger'>Error inserting record. Please try again.</div>";
            }
        }
    }
    ?>

    <h2>Add New Student</h2>
    <form method="POST" action="" class="mt-4">
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                    placeholder="Enter full name"
                    required
            />
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter email address"
                    required
            />
        </div>
        <div class="mb-3">
            <label for="course" class="form-label">Course:</label>
            <input
                    type="text"
                    class="form-control"
                    id="course"
                    name="course"
                    placeholder="Enter course name"
                    required
            />
        </div>
        <div class="mb-3">
            <label for="grade" class="form-label">Grade:</label>
            <input
                    type="number"
                    class="form-control"
                    id="grade"
                    name="grade"
                    placeholder="Enter numeric grade"
                    required
                    min="0"
                    max="100"
            />
        </div>
        <button type="submit" name="Submit" class="btn btn-primary">Add Student</button>
        <button type="reset" class="btn btn-secondary ms-2">Reset</button>
    </form>
</main>
</body>
</html>

