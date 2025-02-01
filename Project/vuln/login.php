<?php
    require '../db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Tidak aman karena data langsung diintegrasikan ke query SQL
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            session_start();
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
            exit;
        } else {
            echo "Invalid username or password!";
        }
    }
?>

<?php
    require '../template/header.php'
?>

<body>
    <div class="d-flex align-items-center justify-content-center vh-100 bg-white">
        <div class="container mx-auto w-50 border shadow rounded-5">
            <h2 class="text-center border-bottom p-4">Login Academic Room - Vulnerable</h2>
            <div class="p-4">
                <form method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <p class="mt-3">Don't have an account? <a href="register.php">Register</a></p>
            </div>
        </div>
    </div>
</body>
</html>
