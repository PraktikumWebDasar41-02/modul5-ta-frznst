<?php
include("conn.php");
session_start();

$nim= $_SESSION['nim'];
$hasil=get($nim);
if(!isset($_SESSION['nim'])){
    header("location:s1.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php

    echo"<table>";
        echo"<tr><td>NIM</td> <td> :". $hasil['nim']."</td></tr>";
        echo"<tr><td>Nama </td><td> :".$hasil['nama']."</td></tr>";
        echo"<tr><td>Email</td><td> :". $hasil['email']."</td></tr>";
        echo"<tr><td>Tanggal Lahir :</td><td>". $hasil['tanggal']."</td></tr>";
        echo"<tr><td>Fakultas :</td><td>". $hasil['fakultas']."</td></tr>";
        echo"<tr><td>Prodi :</td><td>". $hasil['prodi']."</td></tr>";
        echo"<tr><td>Komentar :</td><td>". $hasil['komentar']."</td></tr>";
    echo"</table>";
  
    ?>
<form action="s1.php" method="post">
<input type="submit" name="logout" value="logout">
</form>

</body>
</html>