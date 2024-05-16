<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Judul</title>
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
        include_once('connection.php');
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Cek koneksi
        if ($koneksi->connect_error) {
            die("Koneksi gagal: " . $koneksi->connect_error);
        }

        // Menggunakan prepared statements
        $stmt = $koneksi->prepare("SELECT * FROM login_user WHERE username = ? AND password = ?");
        if ($stmt) {
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $result = $stmt->get_result();
            $cek = $result->num_rows;

            if ($cek > 0) {
                header("Location: index.php");
                exit; // Menghentikan eksekusi setelah redirection
            } else {
                echo "Password atau Username Salah";
            }
            $stmt->close();
        } else {
            echo "Error: " . $koneksi->error;
        }
        $koneksi->close();
    }
    ?>
</body>
</html>
