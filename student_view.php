
<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

include "connection.php";

// Mengambil data mahasiswa
$query = "SELECT * FROM student";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Data Mahasiswa</h2>

    <a href="student_add.php">Tambah Mahasiswa</a>
    <br><br>

    <table>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Kota Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Fakultas</th>
            <th>Jurusan</th>
            <th>IPK</th>
            <th>Aksi</th>
        </tr>

        <?php
        while ($data = mysqli_fetch_array($result)) {
        ?>

        <tr>
            <td><?php echo $data['nim']; ?></td>
            <td><?php echo $data['name']; ?></td>
            <td><?php echo $data['birth_city']; ?></td>
            <td><?php echo $data['birth_date']; ?></td>
            <td><?php echo $data['faculty']; ?></td>
            <td><?php echo $data['department']; ?></td>
            <td><?php echo $data['gpa']; ?></td>

            <td>
                <a class="action-edit" href="student_edit.php?nim=<?php echo $data['nim']; ?>">Edit</a>

                <a class="action-delete" href="student_delete.php?nim=<?php echo $data['nim']; ?>"
                   onclick="return confirm('Yakin ingin menghapus data ini?')">
                   Delete
                </a>
            </td>
        </tr>

        <?php } ?>

    </table>

</body>
</html>
