<?php
require '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);  // Meng-hash password

    // Aman dengan Prepared Statement dan password yang di-hash
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);
    $stmt->execute();

    echo "<div class='alert alert-success' role='alert'><p>User terdaftar dengan password ter hashing! <a href='login.php'>Login</a></p></div>";
}
?>

<?php
    require '../template/header.php'
?>

<body>
    <div class="d-flex align-items-center justify-content-center vh-100 bg-white">
        <div class="container mx-auto w-50 border shadow rounded-5">
            <h2 class="text-center border-bottom p-4">Register Academic Room - Secure</h2>
            <div class="p-4">
                <form method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Username</label>
                        <input type="text" class="form-control" id="name" name="username" placeholder="Masukan Username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" >
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
                <p class="mt-3">Sudah punya akun? <a href="login.php">Login</a></p>
            </div>
        </div>
    </div>
</body>
</html>
