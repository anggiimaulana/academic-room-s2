<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login_vulnerable.php"); // Redirect if not logged in
    exit;
}

require 'db.php';
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

<?php require 'template/header.php'; ?>

<body>
    <div class="container py-3">
        <h1>Welcome, <?php echo htmlspecialchars($username); ?> </h1>
        <p>You are logged in as: <?php echo htmlspecialchars($_SESSION['email']); ?></p>
        <a href="vuln/logout.php">Logout</a>
    </div>
</body>
</html>
