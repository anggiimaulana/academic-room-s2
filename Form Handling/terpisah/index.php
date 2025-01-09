<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Sederhana</title>
</head>
<body>
    <form method="POST" action="proses.php">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>