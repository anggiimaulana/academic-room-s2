<?php
    require '../db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Tidak aman karena data langsung diintegrasikan ke query SQL
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        $conn->query($query);

        echo "<div class='alert alert-success' role='alert'><p>User terdaftar! <a href='login.php'>Login</a></p></div>";
    }
?>

<?php
    require '../template/header.php'
?>

<body>
    <div class="container my-3">
        <h3 class="text-center mb-3">Register Academic Room - Vulnerable</h3>
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
        <p class="mt-3">Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>
