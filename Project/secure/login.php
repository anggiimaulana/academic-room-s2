<?php
require '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    // Aman dengan Prepared Statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verifikasi password yang di-hash dengan password yang dimasukkan
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['email'] = $email;
            header("Location: ../dashboard.php");
            exit;
        } else {
            echo "Invalid email or password!";
        }
    } else {
        echo "Invalid email or password!";
    }
}
?>

<?php 
    require '../template/header.php'
?>

<body>
    <div class="container my-3">
        <h3 class="text-center mb-3">Login Academic Room - Secure</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" >
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <p class="mt-3">Don't have an account? <a href="register.php">Register</a></p>
    </div>
</body>
</html>
