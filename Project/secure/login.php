<?php
require '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    // Aman dengan Prepared Statement
    $stmt = $conn->prepare("SELECT username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verifikasi password yang di-hash dengan password yang dimasukkan
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
            exit;
        } else {
            echo "Invalid username or password!";
        }
    } else {
        echo "Invalid username or password!";
    }
}
?>

<?php 
    require '../template/header.php'
?>

<body class="bg-light">
    <div class="d-flex align-items-center justify-content-center vh-100 bg-white">
        <div class="container mx-auto w-50 border shadow rounded-5">
            <h2 class="text-center border-bottom p-4">Login Academic Room - Secure</h2>
            <div class="p-4 ">
                <form method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <p class="mt-3">Belum punya akun? <a href="register.php">Daftar</a></p>
            </div>
        </div>
    </div>
</body>
</html>
