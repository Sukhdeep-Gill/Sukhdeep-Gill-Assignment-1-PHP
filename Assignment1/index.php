<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Student Records | Home</title>
    <meta name="description" content="Student records home page" />
    <meta name="robots" content="noindex, nofollow" />
    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css" />
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto&display=swap" rel="stylesheet" />
</head>
<body>
<header>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="./images/Books.jpeg" alt="Student Records Logo" height="30" />
                Student Records
            </a>
        </div>
    </nav>
</header>

<main class="container text-center my-5">
    <h1>Welcome to Student Records</h1>
    <p>Please select an option below:</p>
    <div class="d-flex justify-content-center gap-3">
        <a href="add.php" class="btn btn-primary btn-lg">Add Student</a>
        <a href="view.php" class="btn btn-secondary btn-lg">View Records</a>
    </div>
</main>

<footer class="text-center py-3 mt-5 border-top">
    &copy; <?php echo date('Y'); ?> Student Records
</footer>
</body>
</html>
