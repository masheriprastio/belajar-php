<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <form action="login.php" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="login" value="Login"></td>
            </tr>
        </table>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include_once("connection.php");

        $username = $_POST['username'];
        $password = $_POST['password'];

        // Menggunakan prepared statements untuk menghindari SQL Injection
        $stmt = $koneksi->prepare("SELECT * FROM login_user WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $cek = $result->num_rows;

        if ($cek > 0) {
            echo "Login berhasil!";
        } else {
            echo "Username atau password salah!";
        }

        $stmt->close();
        $koneksi->close();
    }
    ?>
</body>
</html>
