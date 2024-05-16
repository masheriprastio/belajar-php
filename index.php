<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <h2>CRUD Management User</h2>
</head>
<body>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Password</th>
        </tr>
        <?php
        include_once("connection.php");
        $no = 1;
        $data = mysqli_query($koneksi, "Select * from login_user");
        while($tampil_data = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $tampil_data['username'];?></td>
                <td><?php echo $tampil_data['password'];?></td>
            </tr>
            <?php
        }
        ?>
    </table>
    
</body>
</html>