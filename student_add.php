
<?php
include "connection.php";

if (isset($_POST['simpan'])) {

    $nim = $_POST['nim'];
    $name = $_POST['name'];
    $birth_city = $_POST['birth_city'];
    $birth_date = $_POST['birth_date'];
    $faculty = $_POST['faculty'];
    $department = $_POST['department'];
    $gpa = $_POST['gpa'];

    $query = "INSERT INTO student VALUES
    ('$nim', '$name', '$birth_city', '$birth_date',
    '$faculty', '$department', '$gpa')";

    if (mysqli_query($connection, $query)) {
        header("Location: student_view.php");
        exit;
    } else {
        echo "Data gagal disimpan!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Tambah Data Mahasiswa</h2>

    <form method="POST">

        NIM:<br>
        <input type="text" name="nim" required>
        <br><br>

        Nama:<br>
        <input type="text" name="name" required>
        <br><br>

        Kota Lahir:<br>
        <input type="text" name="birth_city" required>
        <br><br>

        Tanggal Lahir:<br>
        <input type="date" name="birth_date" required>
        <br><br>

        Fakultas:<br>
        <input type="text" name="faculty" required>
        <br><br>

        Jurusan:<br>
        <input type="text" name="department" required>
        <br><br>

        IPK:<br>
        <input type="number" name="gpa" step="0.01" min="0" max="4" required>
        <br><br>

        <button type="submit" name="simpan">Simpan</button>
        <a href="student_view.php">Kembali</a>

    </form>

</body>
</html>
