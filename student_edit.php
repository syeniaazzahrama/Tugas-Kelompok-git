<?php
include "connection.php";

$nim = $_GET['nim'];
$query = "SELECT * FROM student WHERE nim = '$nim'";
$result = mysqli_query($connection, $query);
$data = mysqli_fetch_array($result);

if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $birth_city = $_POST['birth_city'];
    $birth_date = $_POST['birth_date'];
    $faculty = $_POST['faculty'];
    $department = $_POST['department'];
    $gpa = $_POST['gpa'];

    $query_update = "UPDATE student SET name='$name', birth_city='$birth_city', birth_date='$birth_date', faculty='$faculty', department='$department', gpa='$gpa' WHERE nim='$nim'";
    
    if (mysqli_query($connection, $query_update)) {
        header("Location: student_view.php");
        exit();
    } else {
        echo "Data gagal diubah!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Data Mahasiswa</h2>
    <form method="POST">
        NIM:<br>
        <input type="text" name="nim" value="<?php echo $data['nim']; ?>" readonly><br><br>
        Nama:<br>
        <input type="text" name="name" value="<?php echo $data['name']; ?>" required><br><br>
        Kota Lahir:<br>
        <input type="text" name="birth_city" value="<?php echo $data['birth_city']; ?>" required><br><br>
        Tanggal Lahir:<br>
        <input type="date" name="birth_date" value="<?php echo $data['birth_date']; ?>" required><br><br>
        Fakultas:<br>
        <input type="text" name="faculty" value="<?php echo $data['faculty']; ?>" required><br><br>
        Jurusan:<br>
        <input type="text" name="department" value="<?php echo $data['department']; ?>" required><br><br>
        IPK:<br>
        <input type="number" name="gpa" step="0.01" min="0" max="4" value="<?php echo $data['gpa']; ?>" required><br><br>
        <button type="submit" name="simpan">Simpan Perubahan</button>
        <a href="student_view.php">Kembali</a>
    </form>
</body>
</html>