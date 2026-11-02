<?php
include "connection.php";

$nim = $_GET['nim'];
$query = "DELETE FROM student WHERE nim = '$nim'";

if (mysqli_query($connection, $query)) {
    header("Location: student_view.php");
    exit();
} else {
    echo "Data gagal dihapus!";
}
?>