<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login_vulnerable.php"); // Redirect if not logged in
    exit;
}

require '../db.php';
$email = $_SESSION['email'];

// Mencegah SQL Injection dengan menggunakan Prepared Statement
$stmt = $conn->prepare("SELECT username FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $username = $user['username'];
} else {
    $username = "User not found";
}

$stmt->close();
?>

<?php require '../template/header.php'; ?>

<body>
    <nav class="navbar mx-auto navbar-expand-lg navbar-dark bg-primary shadow fixed-top py-3">
    <div class="container">
        <a class="navbar-brand fs-4 fw-bold" href="#">MyWebsite</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link fs-5 fw-semibold active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link fs-5 fw-semibold" href="#">About</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link fs-5 fw-semibold dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Services
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Web Design</a></li>
                <li><a class="dropdown-item" href="#">Development</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">More Services</a></li>
            </ul>
            </li>
        </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-light" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>

    <!-- Spasi agar konten tidak tertutup navbar -->
    <div style="margin-top: 80px;"></div>

    <div class="container py-4">
        <div class="card shadow p-4 rounded-4">
            <h1 class="fw-bold text-primary">Welcome, <?php echo htmlspecialchars($username); ?> 👋</h1>
            <p class="fs-5 text-muted">Anda login dengan email: <span class="fw-bold"><?php echo htmlspecialchars($_SESSION['email']); ?></span></p>
            <a href="logout.php" class="btn btn-danger mt-3 w-25 rounded-4">Logout</a>
        </div>
    </div>
</body>
</html>
